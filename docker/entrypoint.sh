#!/bin/sh
set -e

# Siapkan struktur direktori storage bila belum ada (volume kosong pada boot pertama).
mkdir -p \
    storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    storage/app/public

# Sesuaikan kepemilikan agar konsisten dengan user runtime www-data.
chown -R www-data:www-data storage bootstrap/cache || true

# Siapkan file SQLite default bila koneksi menunjuk sqlite (dev).
if [ -z "${DB_CONNECTION:-}" ] || [ "${DB_CONNECTION}" = "sqlite" ]; then
    [ -f database/database.sqlite ] || touch database/database.sqlite
fi

# Migrasi idempotent untuk sqlite maupun MySQL (service DB Dokploy).
# Retry singkat agar tidak balapan dengan readiness service DB, tanpa memblokir boot.
for i in 1 2 3 4 5; do
    if php artisan migrate --force --no-interaction >/dev/null 2>&1; then
        break
    fi
    echo "[bayarkilat] migrasi gagal (percobaan ${i}/5), coba lagi dalam 2 detik..."
    sleep 2
done

# Buat symlink storage publik (aman dijalankan berulang kali).
if [ -f artisan ]; then
    php artisan storage:link --no-interaction >/dev/null 2>&1 || true
fi

# Cache config & view memakai env runtime (APP_KEY dari env_file).
# route:cache tidak digunakan karena ada closure route di routes/web.php.
if [ -f artisan ]; then
    php artisan config:cache --no-interaction >/dev/null 2>&1 || true
    php artisan view:cache --no-interaction >/dev/null 2>&1 || true
fi

# Peringatan ramah bila APP_KEY belum diisi.
if [ -z "${APP_KEY:-}" ]; then
    echo "[bayarkilat] Peringatan: APP_KEY kosong. Jalankan 'php artisan key:generate' dan set di .env.staging sebelum mengakses fitur enkripsi/session." >&2
fi

exec "$@"