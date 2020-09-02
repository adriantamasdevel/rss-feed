FROM mysql:latest as builder

# needed for intialization
ENV MYSQL_ROOT_PASSWORD=root
ENV MYSQL_DATABEASE: homestead
ENV MYSQL_USER: homestead
ENV MYSQL_PASSWORD: secret
ENV MYSQL_ROOT_PASSWORD: secret
ENV SERVICE_TAGS: dev
ENV SERVICE_NAME: mysql

ADD init/init.sql /docker-entrypoint-initdb.d/

# Need to change the datadir to something else that /var/lib/mysql because the parent docker file defines it as a volume.
# https://docs.docker.com/engine/reference/builder/#volume :
#       Changing the volume from within the Dockerfile: If any build steps change the data within the volume after
#       it has been declared, those changes will be discarded.
RUN ["/usr/local/bin/docker-entrypoint.sh", "mysqld", "--datadir", "/initialized-db"]

FROM mysql:latest

COPY --from=builder /initialized-db /var/lib/mysql