FROM centos:7

RUN yum update -y
RUN yum install -y epel-release
RUN rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum install -y --enablerepo=epel,remi-php70 php php-common php-devel php-mbstring php-mcrypt php-pdo php-gd php-pear php-fpm php-xml php-gmp php-cli php-mysql
RUN yum install -y nginx

COPY . /opt/ 

COPY ./docker/nginx.conf /etc/nginx/

RUN systemctl start nginx
RUN systemctl enable nginx

RUN systemctl start php-fpm
RUN systemctl enable php-fpm
