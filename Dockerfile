# Menggunakan image PHP sebagai base image
FROM php:8.3-cli

# Set working directory di dalam container
WORKDIR /var/www/html

# Menyalin composer.lock dan composer.json untuk meng-install dependensi
COPY composer.lock composer.json ./

# Meng-install dependensi PHP menggunakan Composer
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-dev --optimize-autoloader

# Menyalin semua file aplikasi ke dalam container
COPY . .

# Menyediakan port yang akan digunakan (jika perlu)
EXPOSE 8000

# Perintah untuk menjalankan aplikasi Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]