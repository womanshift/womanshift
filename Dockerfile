FROM php:7.0.8-cli

RUN apt-get install -y nginx

COPY ./docker/nginx.conf /etc/nginx/
COPY . /opt/womanshift/

EXPOSE 80
