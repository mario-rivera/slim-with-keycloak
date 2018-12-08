#!/bin/bash
/www/docker/shell/wait-for-it.sh -t 150 $KEYCLOAK_HOST:$KEYCLOAK_PORT

nginx -g "daemon off;"