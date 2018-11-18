<?php

return [
    'configDir' => __DIR__,
    'errorHandler' => DI\autowire(SlimApp\ErrorHandlers\ErrorHandler::class),
    'phpErrorHandler' => DI\autowire(SlimApp\ErrorHandlers\ErrorHandler::class),
    'notFoundHandler' => DI\autowire(SlimApp\ErrorHandlers\NotFound::class),
    Dwoo\Core::class => 
        DI\create()
        ->method('setTemplateDir', dirname(__DIR__) . '/templates'),
];