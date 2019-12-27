#!/bin/bash

# wait for keycloak server
$(pwd)/docker/shell/wait-for-it.sh "${KEYCLOAK_HOST}:${KEYCLOAK_PORT}" -s -t 60
retval=$?

# start supervisor
supervisord -n -c /etc/supervisord.conf