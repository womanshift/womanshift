FROM richarvey/nginx-php-fpm:php7

COPY . /opt/womanshift

COPY conf/default.conf /etc/nginx/sites-available/default.conf

RUN chmod 777 /opt/womanshift/fuel/app/logs
RUN chmod 777 /opt/womanshift/fuel/app/tmp

ENV FUEL_ENV production

EXPOSE 80
