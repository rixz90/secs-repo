FROM php:8.2.28-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    vim

ENV COMPOSER_ALLOW_SUPERUSER=1

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_mysql
WORKDIR /var/www

RUN pecl install -o -f xdebug-3.4.5 \ && docker-php-ext-enable xdebug


