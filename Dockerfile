FROM php:7.4-cli

RUN apt-get update -y && \
    apt-get upgrade -y && \
    apt-get install -y libmcrypt-dev git zip unzip libzip-dev
RUN docker-php-ext-configure zip

RUN pecl install redis-5.1.1 && \
    pecl install xdebug-2.8.1 && \
    docker-php-ext-enable redis xdebug

COPY . /usr/src/queue

WORKDIR /usr/src/queue

# Get Composer!
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer
RUN php /usr/bin/composer install