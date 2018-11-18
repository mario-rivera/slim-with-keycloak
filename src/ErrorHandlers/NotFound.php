<?php
namespace SlimApp\ErrorHandlers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Dwoo\Core;

use SlimApp\Exception\Components\ErrorResponseData;

class NotFound
{
    protected $dwoo;

    public function __construct(Core $core)
    {
        $this->dwoo = $core;
    }

    public function __invoke(Request $request, Response $response)
    {
        switch($request->getAttribute('RequestAccepts'))
        {
            case 'application/json':
                $response = $this->buildJsonResponse($response);
                break;
            default:
                $response = $this->buildResponse($response);
            
        }

        return $response->withStatus(404);
    }

    public function buildResponse(Response $response)
    {
        $template = $this->dwoo->get('errors/404.html');
        $response->getBody()->write($template);
        return $response;
    }

    public function buildJsonResponse(Response $response)
    {
        $data = new ErrorResponseData('Content Not Found');
        return $response->withJson($data);
    }
}