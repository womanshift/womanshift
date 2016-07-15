FROM centos:7

ENV container docker

COPY ./docker/nginx.conf /etc/nginx/

RUN (cd /lib/systemd/system/sysinit.target.wants/; for i in *; do [ $i == systemd-tmpfiles-setup.service ] || rm -f $i; done); \
rm -f /lib/systemd/system/multi-user.target.wants/*;\
rm -f /etc/systemd/system/*.wants/*;\
rm -f /lib/systemd/system/local-fs.target.wants/*; \
rm -f /lib/systemd/system/sockets.target.wants/*udev*; \
rm -f /lib/systemd/system/sockets.target.wants/*initctl*; \
rm -f /lib/systemd/system/basic.target.wants/*;\
rm -f /lib/systemd/system/anaconda.target.wants/*;\
yum update -y; yum -y install epel-release openssh-clients openssh-server; yum install -y nginx;\
rpm -Uvh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm;\
yum install -y --enablerepo=epel,remi-php70 php php-common php-devel php-mbstring php-mcrypt php-opcache php-pdo php-gd php-pear php-fpm php-xml php-gmp php-cli php-my    sql;\
yum clean all;

COPY ./docker/nginx.conf /etc/nginx/

EXPOSE 80

RUN systemctl enable nginx.service php-fpm.service sshd.service;
