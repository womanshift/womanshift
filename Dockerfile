FROM php:7.0.8-fpm

COPY . /opt/womanshift/
WORKDIR /opt/womanshift/

COPY ./docker/nginx.conf /etc/nginx/
