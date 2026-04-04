FROM composer:2.7.7 as builder

COPY . /app

RUN composer install \
    --no-ansi \
    --no-autoloader \
    --no-interaction \
    --no-scripts \
    --prefer-dist

RUN composer dump-autoload --optimize --classmap-authoritative

FROM dunglas/frankenphp:php8.3

COPY --from=builder /app /app

ENV WEBSERVER_PORT=${WEBSERVER_PORT:-8003}

RUN apt-get update && apt-get install -y \
      libzip-dev \
      sqlite3 \
      libsqlite3-dev \
      libicu-dev \
      libpq-dev \
      && docker-php-ext-install zip pdo_mysql \
      pdo_pgsql \
      pdo_sqlite \
      pcntl \
      posix

WORKDIR /app

COPY docker/webserver/config/Caddyfile /etc/caddy/Caddyfile

COPY docker/webserver/startup/startup.sh /app/startup.sh

RUN chmod +x /app/startup.sh

EXPOSE ${WEBSERVER_PORT}


CMD ["/bin/bash", "-c", "/app/startup.sh --webserver-port=${WEBSERVER_PORT}"]
