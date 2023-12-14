FROM php:8.3-fpm

WORKDIR /app/

RUN apt-get update -qq \
    && apt-get install -qy --no-install-recommends \
        curl \
        zip \
        unzip \
        wget \
        nano

# xdebug
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/
RUN install-php-extensions xdebug
ENV PHP_IDE_CONFIG 'serverName=leet_code'
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_host=docker.for.mac.localhost" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.client_port=9001" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.log=/var/log/xdebug.log" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini
RUN echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

COPY --from=composer:2.4 /usr/bin/composer /usr/bin/composer

COPY ./.bashrc_alias /usr/sbin/bashrc_alias
RUN chmod +x /usr/sbin/bashrc_alias
RUN /bin/bash -C "/usr/sbin/bashrc_alias"

# Add the Bash aliases
RUN cat /usr/sbin/bashrc_alias >> ~/.bashrc

COPY ./composer.json /app/
#COPY ./.env /v/src/

RUN composer install --prefer-dist --no-progress --no-interaction

RUN composer dump-autoload
