# Menggunakan image PHP resmi dengan Apache
FROM php:8.2-apache

# Menginstal ekstensi mysqli
RUN docker-php-ext-install mysqli

# Install Composer ke dalam container
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Menetapkan ServerName untuk menghilangkan peringatan
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

# Menetapkan direktori kerja di dalam container
WORKDIR /var/www/html

# Menyalin semua file dari project lokal ke dalam container
COPY . /var/www/html

# Pastikan hak akses direktori benar sebelum menjalankan Composer
RUN chown -R www-data:www-data /var/www/html

# Menjalankan Composer install untuk mengunduh semua dependensi Laravel
RUN composer install --optimize-autoloader --no-dev --no-scripts --no-progress --prefer-dist

# Menyalin direktori 'public' jika perlu, tapi pastikan project Laravel disalin lengkap
COPY ./public /var/www/html

# Mengatur hak akses folder jika diperlukan
RUN chown -R www-data:www-data /var/www/html

# Pastikan Apache menggunakan file index.php sebagai DirectoryIndex utama
RUN echo 'DirectoryIndex index.php' > /etc/apache2/mods-enabled/dir.conf

# Membuka port 80 untuk akses HTTP
EXPOSE 80

# Menjalankan Apache server di dalam container
CMD ["apache2-foreground"]