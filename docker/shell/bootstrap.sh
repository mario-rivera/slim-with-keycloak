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
fi
chmod 777 $MARIADB_DATA_PATH

# keycloak
echo "Checkig keycloak public json file..."
if [ ! -f "./public/keycloak.json" ]; then
    cp ./docker/keycloak/keycloak.json ./public/keycloak.json
fi

echo "Checkig jwt directory..."
if [ ! -d $JWT_DATA_PATH ]; then
    mkdir -p $JWT_DATA_PATH
fi
chmod 777 $JWT_DATA_PATH

echo "Done!"
