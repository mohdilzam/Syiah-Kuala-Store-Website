FROM php:8.2.4

# Meng-install dependensi PHP menggunakan Composer
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Menyalin kode aplikasi ke dalam image
COPY . /var/www/html
WORKDIR /var/www/html

# Jalankan composer install
RUN composer install --no-dev --optimize-autoloader
