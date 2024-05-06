FROM alpine:3.19

LABEL maintainer="Ernesto Liberio <ernesto.liberio@gmail.com>" \
    description="Contenedor para Laravel"

ENV TZ=America/Guayaquil
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apk update && apk upgrade
RUN apk add --no-cache php83  \
    apache2 \
    apache2-utils \
    curl wget \
    tzdata \
    php83-cli \
    php83-ctype \
    php83-curl \
    php83-dom \
    php83-exif \
    php83-fileinfo \
    php83-fpm \
    php83-gd \
    php83-iconv \
    php83-intl \
    php83-mbstring \
    php83-apache2 \
    php83-mysqli \
    php83-opcache \
    php83-openssl \
    php83-pecl-imagick \
    php83-pecl-redis \
    php83-pecl-apcu \
    php83-phar \
    php83-session \
    php83-simplexml \
    php83-soap \
    php83-xml \
    php83-xmlreader \
    php83-zip \
    php83-zlib \
    php83-pdo \
    php83-xmlwriter \
    php83-bcmath \
    php83-tokenizer \
    php83-pdo_mysql \
    php83-bz2 \
    php83-json \
    php83-ldap \
    php83-ftp \
    php83-redis \
    php83-mongodb \
    php83-pdo_dblib \
    php83-sodium \
    php83-pcntl \
    php83-posix \
    freetds-dev \
    unixodbc \
    supervisor\
    curl \
    tzdata \
    htop \
    dcron \
    openssl \
    libxrender \
    fontconfig \
    ttf-liberation \
    xfontsel \
    freetype

RUN ln -s /usr/bin/php83 /usr/bin/php

# Installing composer
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN rm -rf composer-setup.php

#Installing npm
RUN apk add nodejs npm

#Installing supervisor
RUN apk add supervisor \
    && rm -rf /var/cache/apk/*

RUN mkdir /etc/supervisor.d


COPY entrypoint.sh /entrypoint.sh

WORKDIR /var/www/html
EXPOSE 80
EXPOSE 8080

RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]
