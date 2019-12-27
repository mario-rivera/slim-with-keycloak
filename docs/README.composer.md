# Composer Operations

## Composer install
```bash
$ docker-compose \
-f $(pwd)/docker/services/composer.yml --project-directory $(pwd) \
run --rm --no-deps --user $(id -u):$(id -g) \
install
```

## Require composer package
```bash
$ docker-compose \
-f $(pwd)/docker/services/composer.yml --project-directory $(pwd) \
run --rm --no-deps --user $(id -u):$(id -g) \
console
```

once inside the container from the console run

```bash
$ composer require -n --ignore-platform-reqs --no-scripts \
{packagename}:{packageversion}
```

## Update single package
```bash
$ docker-compose \
-f $(pwd)/docker/services/composer.yml --project-directory $(pwd) \
run --rm --no-deps --user $(id -u):$(id -g) \
console
```

once inside the container from the console run

```bash
$ composer update -n --ignore-platform-reqs --no-scripts \
{packagename}
```

## Update all composer packages
```bash
$ docker-compose \
-f $(pwd)/docker/services/composer.yml --project-directory $(pwd) \
run --rm --no-deps --user $(id -u):$(id -g) \
update
```

---
Back to [README](./README.md)