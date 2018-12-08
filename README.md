# Slim PHP with Keycloak Authentication

## Requirements

* docker-compose (version 3.7)
* docker

## Getting Started

**Before running for the first time, execute the bootstrap script:**\
*(needs to be run only once)*

```bash
$ docker-compose \
-f ./docker/compose/bootstrap.yml \
--project-directory $(pwd) \
run --rm --user $(id -u):$(id -g) bootstrap
```

## Run the application

Run command: *(user id prefix is to avoid running as root)*
```bash
$ CURRENT_UID=$(id -u):$(id -g) docker-compose up -d
```

## License
[MIT](https://choosealicense.com/licenses/mit/)