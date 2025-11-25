FROM php:8.2-apache

# Instalar extensões PHP
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Copiar código para o container
COPY src/ /var/www/html/

# Ajustar permissões
RUN chown -R www-data:www-data /var/www/html