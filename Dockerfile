FROM php:8.2-apache

# ===============================
# ENV
# ===============================
ENV APACHE_DOCUMENT_ROOT=/var/www/html \
    PHP_OPCACHE_ENABLE=1 \
    PHP_OPCACHE_VALIDATE_TIMESTAMPS=0 \
    PHP_OPCACHE_REVALIDATE_FREQ=0 \
    PHP_OPCACHE_MEMORY_CONSUMPTION=192 \
    PHP_OPCACHE_INTERNED_STRINGS_BUFFER=16 \
    PHP_OPCACHE_MAX_ACCELERATED_FILES=20000

# ===============================
# System deps + PHP extensions
# ===============================
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libzip-dev \
        unzip; \
    docker-php-ext-configure gd --with-freetype --with-jpeg; \
    docker-php-ext-install -j"$(nproc)" mysqli gd zip; \
    a2enmod rewrite headers; \
    rm -rf /var/lib/apt/lists/*

# ===============================
# Apache hardening + ServerName
# ===============================
RUN set -eux; \
    { \
      echo "ServerTokens Prod"; \
      echo "ServerSignature Off"; \
      echo "ServerName localhost"; \
    } > /etc/apache2/conf-available/security.conf; \
    a2enconf security

# ===============================
# PHP production ini
# ===============================
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

# ===============================
# App
# ===============================
WORKDIR /var/www/html
COPY . /var/www/html

# ===============================
# Writable directories (VERY IMPORTANT)
# ===============================
RUN set -eux; \
    mkdir -p \
        /var/www/html/temp/mpdf \
        /var/www/html/file/download \
        /var/www/html/vendor/mpdf/mpdf/tmp/mpdf \
        /var/www/html/qr/cache; \
    chown -R www-data:www-data \
        /var/www/html/temp \
        /var/www/html/file \
        /var/www/html/vendor/mpdf/mpdf/tmp \
        /var/www/html/qr; \
    chmod -R 775 \
        /var/www/html/temp \
        /var/www/html/file \
        /var/www/html/vendor/mpdf/mpdf/tmp \
        /var/www/html/qr

EXPOSE 80
