# Slim PHP with Keycloak Authentication

## Getting Started

1. **Execute the bootstrap script:**\
*(needs to be run only once)*

   ```bash
   $ docker-compose \
   -f ./docker/services/bootstrap.yml \
   --project-directory $(pwd) \
   run --rm --user $(id -u):$(id -g) bootstrap
   ```

2. **Install composer dependencies. Read more [here](./docs/README.composer.md)**


## Start the keycloak server

```bash
$ docker-compose up -d mariadb keycloak
```

## Run the webserver

```bash
$ docker-compose up -d webserver
```

## License
[MIT](https://choosealicense.com/licenses/mit/)