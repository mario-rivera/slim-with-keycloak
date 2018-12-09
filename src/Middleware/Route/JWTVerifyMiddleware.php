<?php
namespace SlimApp\Middleware\Route;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;

use MRivera\JWT\JWTVerifier;
use MRivera\JWT\JWTManager;

use SlimApp\JWT\JWSKeysManager;

class JWTVerifyMiddleware
{
    /**
     * @var JWTManager
     */
    protected $jwtManager;

    /**
     * @var JWTVerifier
     */
    protected $verifier;

    /**
     * @var JWSKeysManager
     */
    protected $keysManager;

    public function __construct(JWSKeysManager $keysManager, JWTManager $jwtManager, JWTVerifier $verifier)
    {
        $this->keysManager = $keysManager;
        $this->jwtManager = $jwtManager;
        $this->verifier = $verifier;
    }

    /**
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $header = $request->getHeader('Authorization')[0];
        $token = explode(" ", $header, 2)[1];

        $jws = $this->jwtManager->getJWS($token);

        $this->verifier->setJWKSet($this->keysManager->getKeys());
        if( !$this->verifier->verify($jws) ){
            die('The json web token is NOT verified' . PHP_EOL);
        }

        $response = $next($request, $response);
        return $response;
    }
}
