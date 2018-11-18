#!/bin/bash
/usr/docker/shell/wait-for-it.sh -t 90 $DB_ADDR:$DB_PORT

/opt/jboss/tools/docker-entrypoint.sh -b 0.0.0.0