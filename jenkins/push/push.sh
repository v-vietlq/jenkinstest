#!/bin/bash

echo "********************"
echo "** Pushing image ***"
echo "********************"

IMAGE="laravel-app_php"

echo "** Logging in ***"
docker login -u vietawake -p $PASS
echo "*** Tagging image ***"
docker tag $IMAGE vietawake/$IMAGE
echo "*** Pushing image ***"
docker push vietawake/$IMAGE