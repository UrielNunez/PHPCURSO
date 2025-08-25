# Imagen oficial de PHP con Apache
FROM php:8.2-apache

# Habilitar extensiones necesarias (PDO para MySQL)
RUN docker-php-ext-install pdo pdo_mysql

# Copiar el código al directorio de Apache
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80