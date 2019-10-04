#!/bin/bash

echo "********************"
echo "** Pushing image ***"
echo "********************"

IMAGE="laravelapp_php"
IMAGE_NGINX="nginx:alpine"
IMAGE_PHP="phpmyadmin/phpmyadmin"
echo "** Logging in ***"
sudo docker login -u vietawake -p khongbiet1
echo "*** Tagging image ***"
sudo docker tag $IMAGE vietawake/$IMAGE
sudo docker tag $IMAGE_NGINX vietawake/$IMAGE_NGINX
sudo docker tag $IMAGE_PHP vietawake/phpmyadmin
echo "*** Pushing image ***"
sudo docker push vietawake/$IMAGE
sudo docker push vietawake/$IMAGE_NGINX
sudo docker push vietawake/phpmyadmin

