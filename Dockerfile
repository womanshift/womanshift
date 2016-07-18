FROM centos:7

RUN yum update -y
RUN yum upgrade -y
RUN yum install -y php php-devel php-fpm
RUN yum install -y nginx

COPY . /opt/ 
COPY ./docker/nginx.conf /etc/nginx/
