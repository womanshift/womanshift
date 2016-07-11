FROM centos:7

RUN yum update -y
RUN rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum install -y --enablerepo=epel,remi-php70 php php-devel php-mbstring php-pdo php-gd php-pear php-fpm php-mcrypt php-mysql
RUN yum install -y nginx

COPY docker/nginx.conf /etc/nginx

RUN systemctl start nginx
RUN sudo systemctl enable nginx

RUN systemctl start php-fpm
RUN sudo systemctl enable php-fpm
