# syntax=docker/dockerfile:1

# =============================================================
# Stage 1: Frontend build (Vite + Tailwind + Alpine)
# =============================================================
FROM node:22-alpine AS frontend

WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci --ignore-scripts

COPY . .

RUN npm run build

# =============================================================
# Stage 2: Runtime (FrankenPHP + Caddy)
# =============================================================
# Stage 2: Runtime (Debian — ekstensi terpasang via apt, lebih cepat/andal)
FROM dunglas/frankenphp:1-php8.4 AS runtime

# Ekstensi PHP yang dibutuhkan aplikasi (sqlite, mbstring, opcache).
# pcntl sengaja tidak dipasang — hanya diperlukan oleh Octane/worker mode.
RUN install-php-extensions \
    mbstring \
    fileinfo \
    pdo_sqlite \
    opcache \
    zip

# Aktifkan konfigurasi PHP produksi (opcache aktif, error_reporting sesuai prod)
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

# Salin manifest dependensi lebih dulu agar cache lapisan composer bisa dipakai ulang
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --prefer-dist

# Salin kode aplikasi
COPY . .

# Salin aset frontend hasil build
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

# Caddy melayani HTTP (tanpa TLS) di port 80 — staging di belakang proxy/tunnel
ENV SERVER_NAME=:80 \
    DOCUMENT_ROOT=/app/public

EXPOSE 80

ENTRYPOINT ["docker-entrypoint"]
CMD ["frankenphp", "run", "--config", "/etc/caddy/Caddyfile"]