FROM debian:jessie


RUN deb http://packages.dotdeb.org jessie all \
    && apt-key add dotdeb.gpg
    && apt-get update -y \
    && apt-get upgrade -y \
    && apt-get install -y php php-devel php-fpm nginx

COPY . /opt/ 
COPY ./docker/nginx.conf /etc/nginx/
