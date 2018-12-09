<?php

$app->get('/', [\SlimApp\Controllers\HomeController::class, 'getHome']);

$app->group('', function() {

    $this->get('/verify', function ($request, $response) {

        return $response->withJson('verified');
    });

})->add( $container->get(\SlimApp\Middleware\Route\JWTVerifyMiddleware::class) );
