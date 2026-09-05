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

# Siapkan database SQLite default + jalankan migrasi (idempotent).
if [ -z "${DB_CONNECTION:-}" ] || [ "${DB_CONNECTION}" = "sqlite" ]; then
    [ -f database/database.sqlite ] || touch database/database.sqlite
    php artisan migrate --force --no-interaction >/dev/null 2>&1 || true
fi

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