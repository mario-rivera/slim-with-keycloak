# Xdebug Configuration
Set the $XDEBUG_CONFIG environment variable and set it in the container

## On Mac
```bash
$ XDEBUG_CONFIG="remote_enable=1 remote_connect_back=0 remote_autostart=1 remote_host=host.docker.internal idekey=XDEBUG" \
export XDEBUG_CONFIG
```

## On Linux
```bash
$ DOCKER_IP=$(ip -4 address show docker0 | grep "scope global" | grep -Po '(?<=inet )[\d.]+') \
XDEBUG_CONFIG="remote_enable=1 remote_connect_back=0 remote_autostart=1 remote_host=${DOCKER_IP} idekey=XDEBUG" \
export XDEBUG_CONFIG
```

# Sample VSCode config
```
{
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for XDebug",
            "type": "php",
            "request": "launch",
            "port": 9000,
            "pathMappings": {
                "/www": "${workspaceFolder}"
            },
            "stopOnEntry": true
        }
    ]
}
```