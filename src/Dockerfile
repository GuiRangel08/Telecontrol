FROM php:8.2-apache

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . .

RUN chmod -R 777 /var/www/html

COPY apache-vhost.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libtidy-dev \
    libzip-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg

RUN docker-php-ext-install -j$(nproc) \
    gd \
    pdo_pgsql \
    exif \
    tidy \
    zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-scripts --no-autoloader

RUN chmod -R 777 /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
