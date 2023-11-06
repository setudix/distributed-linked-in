FROM php:8.2-fpm


RUN apt-get update && apt-get install -y \
    openssl \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    libicu-dev \
    autoconf \
    pkg-config \
    libssl-dev


RUN addgroup --system --gid 1000 setu && \
    adduser --system --ingroup setu --uid 1000 --shell /bin/bash setu


WORKDIR /usr/share/nginx/html


COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer


RUN docker-php-ext-install zip mbstring intl


RUN pecl install mongodb-1.16.2 && \
    echo "extension=mongodb.so" >> /usr/local/etc/php/conf.d/mongodb.ini


RUN pecl install redis && \
    docker-php-ext-enable redis


# USER setu

# RUN composer require mongodb/laravel-mongodb
# RUN composer require league/flysystem-aws-s3-v3
# RUN composer require protonemedia/laravel-splade

# RUN composer update 