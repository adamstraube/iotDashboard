FROM alpine:3.9

ENV REDIS_HOST redis

RUN apk add --no-cache \
    curl

ADD https://dl.bintray.com/php-alpine/key/php-alpine.rsa.pub /etc/apk/keys/php-alpine.rsa.pub
RUN apk --update add ca-certificates
RUN echo "@php https://dl.bintray.com/php-alpine/v3.9/php-7.3" >> /etc/apk/repositories

RUN apk add --update --no-cache \
    php7@php \
    php7-bcmath@php \
    php7-ctype@php \
    php7-curl@php \
    php7-dom@php \
    php7-iconv@php \
    php7-mbstring@php \
    php7-json@php \
    php7-phpdbg@php \
    php7-pdo@php \
    php7-pdo_mysql@php \
    php7-pdo_sqlite@php \
    php7-phar@php \
    php7-session@php \
    php7-soap@php \
    php7-xml@php \
    php7-zlib@php \
    php7-fpm@php \
    php7-zip@php

# XDEBUG
RUN apk add --update --no-cache php7-xdebug@php \
    bash
EXPOSE 9000

RUN ln -s /usr/bin/php7 /usr/bin/php && ln -s /usr/bin/phpdbg7 /usr/bin/phpdbg

RUN addgroup -S www-data \
  && adduser -S www-data -G www-data -u 1000

ADD ./docker/phpfpm/overrides.conf /etc/php7/php-fpm.d/zzz-overrides.conf

WORKDIR /var/www

COPY ./docker/phpfpm/start.sh /usr/bin/start.sh
RUN chmod +x /usr/bin/start.sh

COPY ./docker/phpfpm/start_schema.sh /usr/bin/start_schema.sh
RUN chmod +x /usr/bin/start_schema.sh

CMD [ "/usr/bin/start.sh" ]