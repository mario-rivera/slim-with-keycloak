<?php

return [
    'errorHandler' => DI\autowire(SlimApp\ErrorHandlers\ErrorHandler::class),
    'phpErrorHandler' => DI\autowire(SlimApp\ErrorHandlers\ErrorHandler::class),
    'notFoundHandler' => DI\autowire(SlimApp\ErrorHandlers\NotFound::class),
    'configDir' => __DIR__,
    'jwtDir' => dirname(__DIR__) . "/jwt",
    Dwoo\Core::class => 
        DI\create()
        ->method('setTemplateDir', dirname(__DIR__) . '/templates'),
    MRivera\Keycloak\KeycloakClient::class =>
        DI\autowire()
        ->constructorParameter('config', [
            'base_uri' => getenv('KEYCLOAK_HOST') . ':' . getenv('KEYCLOAK_PORT')
        ]),
    SlimApp\JWT\JWSKeysManager::class => DI\autowire()
        ->constructorParameter('dataDir', DI\get('jwtDir'))
];
