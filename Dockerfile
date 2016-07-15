# Building on top of Ubuntu 14.04. The best distro around.
FROM ubuntu:14.04

COPY ./womanshift /opt/
EXPOSE 8080

ENTRYPOINT ["/opt/womanshift"]
