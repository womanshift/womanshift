FROM richarvey/nginx-php-fpm:php7

COPY . /opt/womanshift

RUN cp /opt/womanshift/conf/default.conf /etc/nginx/sites-available/default.conf

ENV FUEL_ENV production
ENV S3_ACCESS_KEY AKIAIZES7BN3X6NLRHEA
ENV S3_SECRET_ACCESS_KEY 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
ENV S3_DEFAULT_REGION us-east-1
ENV S3_DEFAULT_BUCKET womanshift

EXPOSE 80
