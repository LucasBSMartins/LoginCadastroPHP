FROM php:apache
# Instala a extensão MySQLi
RUN docker-php-ext-install mysqli