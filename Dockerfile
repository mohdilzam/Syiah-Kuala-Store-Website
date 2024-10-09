# menggunakan image dasar
FROM php:8.0-apache

# Salin semua file ke dalam image
COPY . /var/www/html/

# Atur hak akses untuk direktori yang diperlukan
RUN chmod -R 755 /var/www/html && \
    chown -R www-data:www-data /var/www/html

# Mengaktifkan mod_rewrite
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html
