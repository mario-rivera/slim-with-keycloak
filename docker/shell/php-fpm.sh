#!/bin/bash

pushd $WORKDIR > /dev/null

if [ ! -f "./public/keycloak.json" ]
then
    cp ./docker/keycloak/keycloak.json ./public/keycloak.json
fi

if [[ $(composer show 2>&1) == *"No dependencies installed"* ]]; then
    composer install -n
fi

# in case that composer show is not reliable enough then check
# for the existence of the vendor dir

# if [ ! -d "/www/vendor" ]; then
#     composer install -n
# fi

popd > /dev/null

php-fpm