FROM centos:7

RUN yum update -y
RUN curl -s https://repos.fedorapeople.org/repos/jkaluza/httpd24/epel-httpd24.repo > /etc/yum.repos.d/epel-httpd24.repo
RUN yum install httpd24-httpd
RUN yum install -y epel-release
RUN rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum install -y --enablerepo=epel,remi-php70 php php-devel php-mbstring php-pdo php-gd php-fpm
RUN yum install -y nginx

COPY . /opt/ 

COPY ./docker/nginx.conf /etc/nginx/

RUN systemctl start nginx
RUN systemctl enable nginx

RUN systemctl start php-fpm
RUN systemctl enable php-fpm
