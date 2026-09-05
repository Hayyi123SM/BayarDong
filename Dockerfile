# syntax=docker/dockerfile:1

# =============================================================
# Stage 1: Build frontend (Vite + Tailwind + Alpine)
# =============================================================
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci --ignore-scripts

COPY . .

RUN npm run build

# =============================================================
# Stage 2: Runtime — FrankenPHP resmi (mode worker/Octane)
# =============================================================
# Image resmi dunglas/frankenphp: biner FrankenPHP jadi, bukan diunduh manual.
# Aplikasi dijalankan sebagai long-running process (Octane) — diboot sekali,
# request dilayani in-memory. Perubahan kode berlaku saat container dibuat ulang.
FROM dunglas/frankenphp:1-php8.4 AS runtime

# Ekstensi sesuai kebutuhan app. SQLite untuk dev; MySQL (pdo_mysql) sebagai
# DB staging/produksi (service MySQL dari Dokploy). pcntl wajib untuk Octane.
# Dipisah per-RUN agar tiap langkah ter-cache dan build dapat dilanjutkan
# dari langkah terakhir yang sukses bila daemon terputus di tengah jalan.
RUN install-php-extensions mbstring fileinfo pdo_sqlite zip
RUN install-php-extensions pdo_mysql
RUN install-php-extensions opcache pcntl

# Aktifkan konfigurasi PHP produksi (opcache aktif, error_reporting sesuai prod)
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

# Salin manifest dependensi lebih dulu agar cache lapisan composer bisa dipakai ulang
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Salin kode aplikasi (public/build dikecualikan di .dockerignore, salin dari stage frontend)
COPY . .
COPY --from=frontend /app/public/build public/build

# Generate autoloader + package discovery.
# Cache config/view DIJALANKAN di runtime (entrypoint) karena butuh env
# (APP_KEY dari env_file) — bukan saat build. route:cache tidak dipakai
# karena ada closure route di routes/web.php.
RUN composer install --no-dev --no-scripts --prefer-dist \
    && php artisan package:discover --no-interaction

# Entrypoint untuk menyiapkan direktori storage saat container berjalan
COPY docker/entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

# Oktane + FrankenPHP melayani HTTP di port 8000 (staging di belakang proxy/Traefik).
# --workers=2: kompromi aman; publikasi via OCTANE_HTTPS di env bila di balik HTTPS.
EXPOSE 8000

ENTRYPOINT ["docker-entrypoint"]
CMD ["php", "artisan", "octane:frankenphp", "--host=0.0.0.0", "--port=8000", "--workers=2", "--max-requests=500"]