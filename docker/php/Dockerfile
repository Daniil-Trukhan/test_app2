FROM php:7.3.11-fpm-stretch

# MYSQL
RUN apt update && apt install -y git wget imagemagick apt-transport-https lsb-release;
RUN wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg;
RUN sh -c 'echo "deb https://packages.sury.org/php/ stretch main" > /etc/apt/sources.list.d/php.list';
RUN apt update;
RUN apt install -y libmcrypt-dev mysql-client;
RUN docker-php-ext-install pdo_mysql;

# GD
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd

# XDEBUG
RUN apt-get update && apt-get install -y libpq-dev unzip \
    && pecl install xdebug-2.7.2 \
    && docker-php-ext-enable xdebug

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
COPY php.ini /usr/local/etc/php/php.ini
#ZIP
RUN apt-get update && apt-get install -y libzip-dev zlib1g-dev \
    && docker-php-ext-install zip

# BCMATH
RUN docker-php-ext-install bcmath

# SOAP
RUN apt-get install -y libxml2-dev && docker-php-ext-install soap

# INTL
RUN docker-php-ext-install intl

# SSL
RUN apt-get install -y openssl
#RUN docker-php-ext-install ssl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/bin --filename=composer --quiet

ENV COMPOSER_ALLOW_SUPERUSER 1

WORKDIR /var/www/app