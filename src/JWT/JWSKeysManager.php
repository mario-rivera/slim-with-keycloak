<?php
namespace SlimApp\JWT;

use MRivera\Keycloak\KeycloakClient;

class JWSKeysManager
{
    /**
     * @var KeycloakClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $dataDir;

    /**
     * @var string
     */
    protected $keysFilename = 'oid_keys.json';

    public function __construct($dataDir, KeycloakClient $client)
    {
        $this->dataDir = $dataDir;
        $this->client = $client;
    }

    public function getKeys(): string
    {
        $path = "{$this->dataDir}/{$this->keysFilename}";
        
        if (!file_exists($path)) {
            $keys = $this->client->getOIDKeys();
            file_put_contents($path, $keys);
        } else {
            $keys = file_get_contents($path);
        }

        return $keys;
    }
}
