FROM richarvey/nginx-php-fpm:php7

COPY . /opt/womanshift

RUN cp /opt/womanshift/conf/default.conf /etc/nginx/sites-available/default.conf

EXPOSE 80

