docker run --rm     -u "$(id -u):$(id -g)"     -v "$(pwd):/var/www/html"     -w /var/www/html     laravelsail/php83-composer:latest  composer install --no-ansi --no-autoloader --no-interaction --no-scripts --prefer-dist ; composer dump-autoload --optimize --classmap-authoritative


php artisan l5-swagger:generate
