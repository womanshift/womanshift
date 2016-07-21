FROM richarvey/nginx-php-fpm:php7

COPY . /opt/womanshift/
COPY ./docker/nginx.conf /etc/nginx/

EXPOSE 8080
