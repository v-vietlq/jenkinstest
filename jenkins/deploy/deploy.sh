#!/bin/bash

echo -e "laravelapp_php\nnginx:alpine\nphpmyadmin" > /tmp/.auth



scp -i /opt/prod /tmp/.auth root@144.202.3.128:/tmp/.auth
scp -i /opt/prod ./jenkins/deploy/publish root@144.202.3.128:/tmp/publish
ssh -i /opt/prod root@144.202.3.128 "/tmp/publish"