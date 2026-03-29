FROM php:8.2-fpm

RUN apt-get update && apt-get install -y git unzip curl \
    && docker-php-ext-install sockets

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./
RUN composer install --no-interaction --prefer-dist

COPY ./www ./www

CMD ["php-fpm"]

