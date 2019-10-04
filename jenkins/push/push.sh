#!/bin/bash

echo "********************"
echo "** Pushing image ***"
echo "********************"

IMAGE="laravelapp_php"
TAG="latest"
echo "** Logging in ***"
sudo docker login -u vietawake -p khongbiet1
echo "*** Tagging image ***"
sudo docker tag $IMAGE vietawake/$IMAGE
echo "*** Pushing image ***"
sudo docker push vietawake/$IMAGE