FROM php:8.2-apache

# Production-friendly defaults
ENV APACHE_DOCUMENT_ROOT=/var/www/html \
    PHP_OPCACHE_ENABLE=1 \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS=0 \
    PHP_OPCACHE_REVALIDATE_FREQ=0 \
    PHP_OPCACHE_MEMORY_CONSUMPTION=192 \
    PHP_OPCACHE_INTERNED_STRINGS_BUFFER=16 \
    PHP_OPCACHE_MAX_ACCELERATED_FILES=20000

# Install system deps + PHP extensions used by this project (mysqli is required)
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
      libfreetype6-dev \
      libjpeg62-turbo-dev \
      libpng-dev \
      libzip-dev \
      unzip \
    ; \
    docker-php-ext-configure gd --with-freetype --with-jpeg; \
    docker-php-ext-install -j"$(nproc)" mysqli gd zip; \
    a2enmod rewrite headers; \
    rm -rf /var/lib/apt/lists/*

# Apache hardening-ish: avoid exposing versions (best-effort)
RUN set -eux; \
    { \
      echo "ServerTokens Prod"; \
      echo "ServerSignature Off"; \
    } > /etc/apache2/conf-available/security-hardening.conf; \
    a2enconf security-hardening

# PHP production ini overrides (opcache, errors)
RUN set -eux; \
    { \
      echo "display_errors=0"; \
      echo "log_errors=1"; \
      echo "error_reporting=E_ALL"; \
      echo "expose_php=0"; \
      echo "memory_limit=256M"; \
      echo "upload_max_filesize=32M"; \
      echo "post_max_size=32M"; \
      echo "max_execution_time=60"; \
      echo "date.timezone=UTC"; \
      echo ""; \
      echo "opcache.enable=${PHP_OPCACHE_ENABLE}"; \
      echo "opcache.validate_timestamps=${PHP_OPCACHE_VALIDATE_TIMESTAMPS}"; \
      echo "opcache.revalidate_freq=${PHP_OPCACHE_REVALIDATE_FREQ}"; \
      echo "opcache.memory_consumption=${PHP_OPCACHE_MEMORY_CONSUMPTION}"; \
      echo "opcache.interned_strings_buffer=${PHP_OPCACHE_INTERNED_STRINGS_BUFFER}"; \
      echo "opcache.max_accelerated_files=${PHP_OPCACHE_MAX_ACCELERATED_FILES}"; \
    } > /usr/local/etc/php/conf.d/zz-production.ini

WORKDIR /var/www/html

# Copy the app code
COPY . /var/www/html

# Ensure writable cache dirs for QR/temp outputs
RUN set -eux; \
    mkdir -p /var/www/html/temp /var/www/html/qr/cache; \
    chown -R www-data:www-data /var/www/html/temp /var/www/html/qr/cache; \
    chmod -R 775 /var/www/html/temp /var/www/html/qr/cache

EXPOSE 80
