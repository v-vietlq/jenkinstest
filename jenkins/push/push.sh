#!/bin/bash

echo "********************"
echo "** Pushing image ***"
echo "********************"

IMAGE="laravelapp_php"

echo "** Logging in ***"
docker login -u vietawake -p $PASS
echo "*** Tagging image ***"
docker tag $IMAGE vietawake/$IMAGE
echo "*** Pushing image ***"
sudo docker push vietawake/$IMAGE