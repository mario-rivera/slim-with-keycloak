#!/bin/bash
/www/docker/shell/wait-for-it.sh -t 150 $TELNET_HOST:$TELNET_PORT

nginx -g "daemon off;"