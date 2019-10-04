#!/bin/bash

cd laravel-app 
chmod 777 -R vendor
docker-compose up --build -d

docker-compose run --rm php composer install
docker-compose run --rm php cp .env.example .env
docker-compose run --rm php php artisan key:generate
docker-compose run --rm php chmod 777 -R storage bootstrap