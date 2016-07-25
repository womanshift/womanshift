FROM richarvey/nginx-php-fpm:php7

COPY . /opt/womanshift

COPY conf/default.conf /etc/nginx/sites-available/default.conf

RUN chmod 777 /opt/womanshift/fuel/app/logs
RUN chmod 777 /opt/womanshift/fuel/app/tmp

ENV FUEL_ENV production

ENV WOMANSHIFT_DEFAULT_MYSQL_URL ${WOMANSHIFT_DEFAULT_MYSQL_URL}
ENV WOMANSHIFT_DEFAULT_MYSQL_PASSWORD ${WOMANSHIFT_DEFAULT_MYSQL_PASSWORD}
ENV AWS_SECRET_KEY ${AWS_SECRET_KEY}
ENV AWS_KEY ${AWS_KEY}

EXPOSE 80
