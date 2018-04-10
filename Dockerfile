FROM php:7.2.4-fpm
RUN apt-get update \
    && apt-get install -qq -y git libpq-dev zlib1g-dev zlib1g-dev libicu-dev g++ libfreetype6-dev libjpeg62-turbo-dev \

    #Install PDO MYSQL
    && docker-php-ext-install pdo pdo_mysql zip \

    #INSTALL PDO POSTGRESQL
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql \

    #Install INTL
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl \

    #Install PHP GD
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

WORKDIR ./public
