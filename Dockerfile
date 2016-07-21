FROM php:7.0.8-cli

ENV NGINX_VERSION 1.10.1-1~jessie

COPY ./docker/nginx.conf /etc/nginx/
COPY . /opt/womanshift/

EXPOSE 80
