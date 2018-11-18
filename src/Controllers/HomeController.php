<?php
namespace SlimApp\Controllers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Container\ContainerInterface;
use Dwoo\Core;

class HomeController
{
    protected $container;
    protected $dwoo;

    public function __construct(ContainerInterface $c, Core $dwoo)
    {
        $this->container = $c;
        $this->dwoo = $dwoo;
    }

    public function getHome(Request $request, Response $response)
    {

        $template = $this->dwoo->get('home.html', [
        ]);

        return $response->getBody()->write($template);
    }
}