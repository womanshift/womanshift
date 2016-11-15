FROM richarvey/nginx-php-fpm:php7

WORKDIR /opt/womanshift

ARG FUEL_ENV
ARG WOMANSHIFT_DEFAULT_MYSQL_URL
ARG WOMANSHIFT_DEFAULT_MYSQL_PASSWORD
ARG AWS_SECRET_KEY
ARG AWS_KEY

ENV FUEL_ENV $FUEL_ENV
ENV WOMANSHIFT_DEFAULT_MYSQL_URL $WOMANSHIFT_DEFAULT_MYSQL_URL
ENV WOMANSHIFT_DEFAULT_MYSQL_PASSWORD $WOMANSHIFT_DEFAULT_MYSQL_PASSWORD
ENV AWS_SECRET_KEY $AWS_SECRET_KEY
ENV AWS_KEY $AWS_KEY

COPY conf/default.conf /etc/nginx/sites-available/default.conf

COPY . /opt/womanshift

RUN chmod 777 /opt/womanshift/fuel/app/logs
RUN chmod 777 /opt/womanshift/fuel/app/tmp

RUN curl -sS https://getcomposer.org/installer | /usr/bin/php7
RUN /usr/bin/php7 composer.phar self-update
RUN /usr/bin/php7 composer.phar update

EXPOSE 80
