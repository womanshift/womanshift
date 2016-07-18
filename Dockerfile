FROM centos:7

RUN yum update -y
RUN rpm --import https://www.elrepo.org/RPM-GPG-KEY-elrepo.org 
RUN rpm -Uvh http://www.elrepo.org/elrepo-release-7.0-2.el7.elrepo.noarch.rpm
RUN sed -i -e "s/enabled=0/enabled=1/g" /etc/yum.repos.d/elrepo.repo
RUN yum update -y
RUN yum reinstall kernel-ml.x86_64 kernel-ml-devel.x86_64 kernel-ml-headers.x86_64 kernel-ml-tools.x86_64 kernel-ml-tools-libs.x86_64
RUN yum install -y epel-release
RUN rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm
RUN yum install -y --enablerepo=epel,remi-php70 php php-devel php-fpm
RUN yum install -y nginx

COPY . /opt/ 

COPY ./docker/nginx.conf /etc/nginx/

RUN systemctl start nginx
RUN systemctl enable nginx

RUN systemctl start php-fpm
RUN systemctl enable php-fpm
