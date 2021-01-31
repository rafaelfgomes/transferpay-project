FROM php:7.4.14-fpm-alpine

ARG APIHTTPPORT
ARG APIHTTPSPORT
ARG APIKEY
ARG APINAME
ARG APIURL
ARG APPENV
ARG DBNAME
ARG DBPASS
ARG DBPORT
ARG DBUSER
ARG TIMEZONE

ENV API_HTTP_PORT=${APIHTTPPORT}
ENV API_HTTPS_PORT=${APIHTTPSPORT}
ENV API_KEY=${APIKEY}
ENV API_NAME=${APINAME}
ENV API_URL=${APIURL}
ENV APP_ENV=${APPENV}
ENV DB_NAME=${DBNAME}
ENV DB_PASS=${DBPASS}
ENV DB_PORT=${DBPORT}
ENV DB_USER=${DBUSER}
ENV TIMEZONE=${TIMEZONE}

RUN echo "date.timezone=$TIMEZONE" > $PHP_INI_DIR/conf.d/date_timezone.ini

RUN apk --update add --virtual build-dependencies build-base openssl-dev autoconf

RUN pecl install mongodb openssl
RUN echo "extension=mongodb.so" > $PHP_INI_DIR/conf.d/mongodb.ini

RUN apk del build-dependencies build-base openssl-dev autoconf && rm -rf /var/cache/apk/*

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer

COPY ./api .

EXPOSE 9000

CMD [ "sh", "-c", "chmod +x config.sh && ./config.sh" ]