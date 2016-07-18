FROM debian:jessie

RUN apt-get update -y
RUN apt-get upgrade -y
RUN apt-get install -y php php-devel php-fpm
RUN apt-get install -y nginx

COPY . /opt/ 
COPY ./docker/nginx.conf /etc/nginx/
