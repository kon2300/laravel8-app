FROM php:8.0-fpm

RUN apt update \
    && apt install -y zlib1g-dev vim libzip-dev \
    && docker-php-ext-install zip pdo_mysql \
    && apt install -y git \
    && apt install -y unzip \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug
    
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN curl -SL https://deb.nodesource.com/setup_16.x | bash
RUN apt-get install -y nodejs && \
    npm install -g npm@latest

WORKDIR /var/www/html