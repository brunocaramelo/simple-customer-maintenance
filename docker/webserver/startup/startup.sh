
#!/bin/bash
WEBSERVER_PORT=8003

for arg in "$@"; do
  case $arg in
    --webserver-port=*)
      WEBSERVER_PORT="${arg#*=}"
      shift
      ;;
  esac
done

sleep 10 

php artisan migrate

php artisan optimize

php artisan db:seed

php artisan octane:frankenphp --port=$WEBSERVER_PORT

