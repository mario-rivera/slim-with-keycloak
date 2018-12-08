#!/bin/bash

#.env file
echo "Checkig .env file..."
if [ ! -f ".env" ]; then
    cat .env.dist > .env
fi

# mariadb data dir
echo "Checkig storage directory..."
if [ ! -d $MARIADB_DATA_PATH ]; then
    mkdir -p $MARIADB_DATA_PATH
    chmod 777 $MARIADB_DATA_PATH
fi

# keycloak
echo "Checkig keycloak public json file..."
if [ ! -f "./public/keycloak.json" ]; then
    cp ./docker/keycloak/keycloak.json ./public/keycloak.json
fi

echo "Done!"
