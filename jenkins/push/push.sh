#!/bin/bash

echo "********************"
echo "** Pushing image ***"
echo "********************"

IMAGE="laravelapp_php"
TAG="latest"
echo "** Logging in ***"
sudo docker login -u vietawake -p $PASS
echo "*** Tagging image ***"
sudo docker tag $IMAGE:$TAG vietawake/$IMAGE:12
echo "*** Pushing image ***"
sudo docker push vietawake/$IMAGE:12