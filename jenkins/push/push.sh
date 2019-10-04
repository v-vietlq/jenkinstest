#!/bin/bash

echo "********************"
echo "** Pushing image ***"
echo "********************"

IMAGE="laravelapp_php"
TAG=latest
echo "** Logging in ***"
docker login -u vietawake -p $PASS
echo "*** Tagging image ***"
docker tag $IMAGE:$TAG vietawake/$IMAGE:$BUILD_TAG
echo "*** Pushing image ***"
docker push vietawake/$IMAGE:$BUILD_TAG