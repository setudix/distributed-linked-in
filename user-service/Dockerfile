FROM php:8.2-fpm

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt-get update
RUN apt-get install -y openssl zip unzip git curl
RUN apt-get install -y libzip-dev libonig-dev libicu-dev
RUN apt-get install -y autoconf pkg-config libssl-dev

RUN addgroup --system --gid 1000 setu && \
    adduser --system --ingroup setu --uid 1000 --shell /bin/bash setu && \
    mkdir -p /usr/share/nginx/html && \
    chown -R setu:setu /usr/share/nginx/html


RUN pecl install mongodb-1.16.2 && \
    echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini

WORKDIR /usr/share/nginx/html/

RUN composer require mongodb/laravel-mongodb
RUN composer require league/flysystem-aws-s3-v3
RUN composer require protonemedia/laravel-splade

RUN pecl install redis && docker-php-ext-enable redis

