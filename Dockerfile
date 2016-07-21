FROM richarvey/nginx-php-fpm:php7

RUN rm -rf /var/www/html
COPY . /opt/womanshift/
RUN ln -s /opt/womanshift/public /var/www/html 

EXPOSE 80
