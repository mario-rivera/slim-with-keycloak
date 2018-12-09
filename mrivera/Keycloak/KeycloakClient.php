<?php
namespace MRivera\Keycloak;

use GuzzleHttp\Client;

class KeycloakClient extends Client
{
    private $jwsKeysEndpoint = '/auth/realms/App/protocol/openid-connect/certs';

    public function getOIDKeys(): string
    {
        $response = $this->request('GET', $this->jwsKeysEndpoint);
        return $response->getBody()->getContents();
    }
}
