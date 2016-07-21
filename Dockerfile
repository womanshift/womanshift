FROM php:7.0.8-fpm

RUN apt-get update -y \
  && apt-get upgrade -y \
  && apt-get install -y nginx

COPY ./docker/nginx.conf /etc/nginx/
COPY . /opt/womanshift/

EXPOSE 80
