#!/bin/bash
#######################################################
# Docker script bash
# To install Docker Script: 
#######################################################

sudo apt-get update
sudo apt-get install vim
sudo apt-get install curl
sudo apt-get install git-core
sudo git --version

# install Docker
git clone https://gitlab.com/quoctuan9901/job-thom.git
cd job-thom
curl -fsSL https://get.docker.com -o get-docker.sh
sh get-docker.sh
apt  install docker-compose
docker-compose up -d
cd job-thom
docker-compose run --rm php composer install
docker-compose run --rm php cp .env.production .env
docker-compose run --rm php php artisan key:generate
docker-compose run --rm php chmod 777 -R storage bootstrap/cache
docker-compose up --build -d