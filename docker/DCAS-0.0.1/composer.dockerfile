FROM composer:2.0

LABEL hostname=composer.dcas-l8.local

ENV COMPOSERGROUP=laravel
ENV COMPOSERUSER=laravel

RUN adduser -g ${COMPOSERGROUP} -s /bin/sh -D ${COMPOSERUSER}
