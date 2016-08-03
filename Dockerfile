FROM richarvey/nginx-php-fpm:php7

ENV FUEL_ENV production

COPY . /opt/womanshift

COPY conf/default.conf /etc/nginx/sites-available/default.conf

RUN chmod 777 /opt/womanshift/fuel/app/logs
RUN chmod 777 /opt/womanshift/fuel/app/tmp

EXPOSE 80
