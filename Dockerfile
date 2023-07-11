# Gunakan image PHP sebagai base image
FROM yiisoftware/yii2-php:8.1-apache

RUN sed -i -e 's|/app/web|/app/public|g' /etc/apache2/sites-available/000-default.conf

# Tambahkan instruksi berikut untuk menginstal ekstensi mysqli yang diperlukan oleh CodeIgniter
RUN docker-php-ext-install mysqli