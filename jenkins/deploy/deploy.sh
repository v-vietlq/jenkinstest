#!/bin/bash

echo laravelapp_php > /tmp/.auth
echo $BUILD_TAG >> /tmp/.auth


scp -i /opt/prod /tmp/.auth root@144.202.3.128:/tmp/.auth
scp -i /opt/prod ./jenkins/deploy/publish root@144.202.3.128:/tmp/publish
ssh -i /opt/prod root@144.202.3.128 "/tmp/publish"