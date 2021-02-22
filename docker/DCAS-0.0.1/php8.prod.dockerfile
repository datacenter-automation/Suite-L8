FROM php:8.0-fpm-alpine

ENV PHPGROUP=laravel
ENV PHPUSER=laravel

RUN adduser -s /bin/sh -g ${PHPGROUP} -D ${PHPUSER}

RUN sed -i "s/user = www-data/user = ${PHPUSER}/g" /usr/local/etc/php-fpm.d/www.conf
RUN sed -i "s/group = www-data/group = ${PHPGROUP}/g" /usr/local/etc/php-fpm.d/www.conf

RUN mkdir -p /var/www/html/public

WORKDIR /var/www/html

RUN apk add --no-cache zip libzip-dev libpng-dev g++ make autoconf libxslt-dev tidyhtml-dev net-snmp-dev aspell-dev freetds-dev openldap-dev gettext-dev imap-dev openssh sudo make shadow libmcrypt-dev gmp-dev openssl curl freetype libpng libjpeg-turbo freetype-dev libjpeg-turbo-dev libwebp-dev libzip-dev bzip2-dev bash pngquant jpegoptim zip icu-dev libxml2-dev dcron wget rsync ca-certificates oniguruma-dev
RUN docker-php-ext-configure zip

ENV MEMCACHED_DEPS zlib-dev libmemcached-dev cyrus-sasl-dev git

RUN set -xe \
    && apk add --no-cache libmemcached-libs zlib \
    && apk add --no-cache \
        --virtual .memcached-deps \
        $MEMCACHED_DEPS \
    && git clone https://github.com/php-memcached-dev/php-memcached /usr/src/php/ext/memcached \
    && docker-php-ext-configure /usr/src/php/ext/memcached \
    && docker-php-ext-install /usr/src/php/ext/memcached \
    && rm -rf /usr/src/php/ext/memcached \
    && apk del .memcached-deps

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini \
&&  docker-php-ext-enable redis

RUN docker-php-ext-install pdo bcmath calendar exif gd imap ldap opcache pcntl pdo_mysql pspell snmp soap sockets tidy zip

ADD ./php8/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

CMD ["php-fpm", "-y", "/usr/local/etc/php-fpm.conf", "-R"]
