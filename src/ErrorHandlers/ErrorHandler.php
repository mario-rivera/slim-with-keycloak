<?php
namespace SlimApp\ErrorHandlers;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Dwoo\Core;

use SlimApp\Exception\Components\ErrorResponseData;
use Throwable;

class ErrorHandler extends AbstractHandler
{
    protected $dwoo;

    public function __construct(Core $core)
    {
        $this->dwoo = $core;
    }

    public function __invoke(Request $request, Response $response, Throwable $e)
    {
        switch($this->determineContentType($request))
        {
            case 'application/json':
                $response = $this->buildJsonResponse($response, $e);
                break;
            default:
                $response = $this->buildResponse($response, $e);
            
        }
        
        return $response->withStatus(500);
    }

    public function buildResponse(Response $response, Throwable $e)
    {
        $template = $this->dwoo->get('errors/error.html', [
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'trace' => $e->getTraceAsString()
        ]);

        $response->getBody()->write($template);
        return $response;
    }

    public function buildJsonResponse(Response $response, Throwable $e)
    {
        $data = new ErrorResponseData($e);
        return $response->withJson($data);
    }
}