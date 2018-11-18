<?php
namespace SlimApp\Routes;

use Slim\App;

class RouteCollector
{
    public function collect($configDir, App $app)
    {
        require_once($configDir . '/routes.php');
    }
}