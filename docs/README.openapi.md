# OpenApi

## Start Documentation Site (Swagger UI)
```bash
$ docker-compose \
-f $(pwd)/docker/services/openapi.yml --project-directory $(pwd) \
up -d docs
```

## Generate Documentation (YAML)
```bash
$ docker-compose \
-f $(pwd)/docker/services/openapi.yml --project-directory $(pwd) \
run --rm docgen
```