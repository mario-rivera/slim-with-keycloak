# Slim PHP with Keycloak Authentication

### Requirements

* docker-compose (version 3.7)
* docker

### Before first docker-compose

Copy the contents of the .env.dist file and replace values accordingly
```bash
$ cat .env.dist > .env
```

### Run the application

Run command: *(user id prefix is to avoid running as root)*
```bash
$ CURRENT_UID=$(id -u):$(id -g) docker-compose up -d
```

### License
[MIT](https://choosealicense.com/licenses/mit/)