docker run --rm     -u "$(id -u):$(id -g)"     -v "$(pwd):/var/www/html"     -w /var/www/html     laravelsail/php83-composer:latest  composer install --no-ansi --no-autoloader --no-interaction --no-scripts --prefer-dist ; composer dump-autoload --optimize --classmap-authoritative



docker compose exec webserver php artisan test



# SIMPLE USER APPLICATION


## Technical specifications

This application has the following specifications: 

| Tool | Version |
| --- | --- |
| Docker | 24.0.7, |
| Docker Compose | 1.29.2 |
| PHP | 8.3.9 |
| WEBSERVER (FRANKENPHP) | 8.3.9 |
| Mariabd | 10.11.3 |
| Redis | 5.0.0 |
| Sqlite (Unit Tests) | 3.16.2 |
| Laravel Framework | 12.0.* |
| VueJS | 3.0.* |

The application is separated into the following containers

| Service | Image | Motivation
| --- | --- | --- |
| mysql | mariadb:10.11 | Main database |
| redis | redis:alpine | Event queue storage |
| webserver | frankenphp | Web Server |

## Requirements
    - Docker
    - Docker Daemon (Service)
    - Docker Compose

## Installation procedures
    Procedures for installing the application for local use

1- Download repository 
    - git clone https://github.com/brunocaramelo/simple-customer-maintenance.git
       
        we must copy env files with the command below:

        - cp docker/docker-compose-env/application.env.example docker/docker-compose-env/application.env
        - cp docker/docker-compose-env/database.env.example docker/docker-compose-env/database.env

2 - Check that the ports:

    - 83 (webserver) 
    
    - 33061(mysql) 

    - 6480(redis) 
     are busy.


3 - Enter the application's home directory and execute the following commands:
    
    1 - docker run --rm     -u "$(id -u):$(id -g)"     -v "$(pwd):/var/www/html"     -w /var/www/html     laravelsail/php83-composer:latest  composer install --no-ansi --no-autoloader --no-interaction --no-scripts --prefer-dist ; composer dump-autoload --optimize --classmap-authoritative
    
    2 - docker-compose up -d;

    3 - docker compose exec webserver php /app/artisan migrate;

    
## Post Installation

After installation, the access address is:

- http://localhost:83/api/documentation

![Bateria de testes](https://github.com/brunocaramelo/simple-customer-maintenance/docs/images/swagger-tool.png)

Swaager documentation and Testing

## Details

    - Vue 3

    - Laravel 11

    - Sanctum

    - SOLID

    - Unit Tests

    - Docker and docker-compose

## Unit Tests

   Run

    - docker compose exec webserver php artisan test;

![Bateria de testes](https://github.com/brunocaramelo/simple-customer-maintenance/docs/images/unit-tests.png)
