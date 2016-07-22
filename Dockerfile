FROM richarvey/nginx-php-fpm:php7

COPY . /opt/womanshift
RUN unlink /etc/nginx/sites-enabled/default.conf
COPY ./conf/nginx.conf /etc/nginx/sites-available/default.conf
RUN ln -s /etc/nginx/sites-available/default.conf /etc/nginx/sites-enabled/default.conf

EXPOSE 80
