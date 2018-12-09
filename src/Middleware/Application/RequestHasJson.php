<?php
namespace SlimApp\Middleware\Application;

use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;

class RequestHasJson
{
    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $isJson = (stripos($request->getContentType(), 'json') !== false);
        $request = $request->withAttribute('HasJson', $isJson); 
        $response = $next($request, $response);

        return $response;
    }
}
