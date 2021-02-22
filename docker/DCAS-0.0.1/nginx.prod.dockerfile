FROM nginx:stable-alpine

LABEL hostname=nginx.dcas-l8.local

ENV NGINXGROUP=laravel
ENV NGINXUSER=laravel

RUN mkdir -p /var/www/html/public

ADD ./nginx/default.prod.conf /etc/nginx/conf.d/
ADD ./nginx/default.pem /etc/nginx/certs/default.pem
ADD ./nginx/default-key.pem /etc/nginx/certs/default-key.pem

RUN sed -i "s/user www-data/user ${NGINXUSER}/g" /etc/nginx/nginx.conf

RUN adduser -g ${NGINXGROUP} -s /bin/sh -D ${NGINXUSER}
