FROM php:7.4-fpm

ARG uid

WORKDIR /var/www/html

RUN apt-get update && apt-get install --quiet --yes --no-install-recommends \
  libzip-dev \
  unzip \
  && docker-php-ext-install zip pdo pdo_mysql \
  && pecl install -o -f redis-5.1.1 \
  && docker-php-ext-enable redis

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN groupadd --gid $uid appuser \
  && useradd --uid $uid -g appuser \
  -G www-data,root --shell /bin/bash \
  --create-home appuser

USER appuser