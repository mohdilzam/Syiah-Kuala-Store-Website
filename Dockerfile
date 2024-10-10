FROM php:8.2.4

# Meng-install dependensi PHP menggunakan Composer
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libicu-dev \
    unzip \
    && docker-php-ext-install zip \
    && docker-php-ext-install intl \
    && docker-php-ext-install pdo pdo_mysql mbstring xml \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Menyalin kode aplikasi ke dalam image
COPY . /var/www/html
WORKDIR /var/www/html

# Jalankan composer install
RUN composer install --no-dev --optimize-autoloader

# Menambahkan user yang lebih aman
RUN useradd -ms /bin/bash appuser
USER appuser
