<?php
namespace SlimApp\Routes;

use Slim\App;

class RouteCollector
{
    public function collect($configDir, App $app)
    {
        $container = $app->getContainer();
        require_once($configDir . '/routes.php');
    }
}
