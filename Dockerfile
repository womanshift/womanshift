FROM php:7.0.8-fpm

ENV NGINX_VERSION 1.10.1-1~jessie

RUN apt-get update -y \
  && apt-get upgrade -y \
  && apt-get install -y nginx

COPY ./docker/nginx.conf /etc/nginx/

COPY . /opt/womanshift/
WORKDIR /opt/womanshift/

EXPOSE 80

CMD ["echo", "Running!"]
