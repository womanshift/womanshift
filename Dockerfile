FROM richarvey/nginx-php-fpm:php7

COPY . /opt/womanshift

COPY conf/default.conf /etc/nginx/sites-available/default.conf

ENV FUEL_ENV production

EXPOSE 80
