FROM dunglas/frankenphp:php8.3

ENV SERVER_NAME =":80"

WORKDIR /app

COPY . /app

RUN apt update && apt install zip libzip-dev -y && \
    docker-php-ext-install zip && \
    docker-php-ext-enable zip

COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer

RUN composer install