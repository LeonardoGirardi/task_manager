FROM php:8.5-apache

# Dependências do PostgreSQL + PHP
RUN apt-get update && apt-get install -y \
    libpq-dev \
    postgresql-client \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Apache rewrite (para futuras rotas)
RUN a2enmod rewrite

# Permitir .htaccess (caso use futuramente)
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

WORKDIR /var/www/html

CMD ["apache2-foreground"]