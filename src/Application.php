<?php
namespace SlimApp;

use Psr\Container\ContainerInterface;
use DI\ContainerBuilder;
use DI\Bridge\Slim\App;

use SlimApp\ErrorHandlers\PhpErrors;
use SlimApp\Routes\RouteCollector;
use SlimApp\Middleware\Registry;

class Application extends App
{
    protected function configureContainer(ContainerBuilder $builder)
    {
        PhpErrors::enable();
        $builder->addDefinitions(__DIR__ . '/../config/definitions.php');
    }

    public function run($silent = false)
    {
        $container = $this->getContainer();
        $this->registerAppMiddleware($container);
        $this->collectRoutes($container);

        parent::run($silent);
    }

    protected function registerAppMiddleware(ContainerInterface $container)
    {
        $middleware = $container->call(
            [Registry::class, 'getApplicationMiddleware'], 
            [$container->get('configDir')]
        );

        foreach($middleware as $definition){
            $callable = (is_string($definition)) ? $container->get($definition) : $definition;
            $this->add($callable);
        }
    }

    protected function collectRoutes(ContainerInterface $container)
    {
        $container->call([RouteCollector::class, 'collect'], [$container->get('configDir'), $this]);
    }
}