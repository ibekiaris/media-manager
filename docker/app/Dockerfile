FROM php:7.1-fpm

WORKDIR /code

# Install and enable XDebug
RUN pecl install xdebug-2.5.0 \
    && docker-php-ext-enable xdebug

ADD config/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini