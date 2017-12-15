#!/usr/bin/env bash
REMOTE_HOST_DBG=$(echo ifconfig $1|sed -n 2p|awk '{ print $2 }'|awk -F : '{ print $2 }')
COMPOSE_PROJECT_NAME=media
export COMPOSE_PROJECT_NAME
export REMOTE_HOST_DBG

docker-compose up --build