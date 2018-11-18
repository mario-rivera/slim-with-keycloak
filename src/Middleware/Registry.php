<?php
namespace SlimApp\Middleware;

class Registry
{
    public function getApplicationMiddleware($configDir)
    {
        return include_once($configDir . '/application_middleware.php');
    }
}