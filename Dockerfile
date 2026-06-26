FROM php:8.5-apache

# Dependências PostgreSQL
RUN apt-get update && apt-get install -y \
    libpq-dev \
    postgresql-client \
    && docker-php-ext-install pdo pdo_pgsql pgsql

# Apache rewrite
RUN a2enmod rewrite

# Permitir .htaccess corretamente
RUN cat <<EOF > /etc/apache2/conf-available/app.conf
<Directory /var/www/html>
    AllowOverride All
    Require all granted
</Directory>
EOF

WORKDIR /var/www/html

CMD ["apache2-foreground"]