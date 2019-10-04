#!/bin/bash

cd laravel-app && docker-compose up --build -d

cd laravel-app && docker-compose run --rm php composer install
cd laravel-app && docker-compose run --rm php cp .env.example .env
cd laravel-app && docker-compose run --rm php php artisan key:generate
cd laravel-app && docker-compose run --rm php chmod 777 -R storage bootstrap