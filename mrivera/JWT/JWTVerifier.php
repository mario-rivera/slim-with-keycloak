<?php
namespace MRivera\JWT;

use Jose\Component\Core\JWKSet;
use Jose\Component\Core\AlgorithmManager;

use Jose\Component\Signature\Algorithm\SignatureAlgorithm;
use Jose\Component\Signature\Algorithm\RS256;
use Jose\Component\Signature\JWSVerifier;

class JWTVerifier
{
    /**
     * @var SignatureAlgorithm
     */
    protected $algorithm;

    /**
     * @var AlgorithmManager
     */
    protected $algorithmManager;

    /**
     * @var JWKSet
     */
    protected $jwkSet;

    /**
     * @var JWSVerifier
     */
    protected $jwsVerifier;

    public function __construct()
    {
        $this->setAlgorithm();
        $this->setAlgorithmManager();
        $this->setJWSVerifier();
    }

    public function setAlgorithm()
    {
        $this->algorithm = new RS256();
    }

    public function setAlgorithmManager()
    {
        $this->algorithmManager = AlgorithmManager::create([$this->algorithm]);
        return $this;
    }

    public function setJWSVerifier()
    {
        $this->jwsVerifier = new JWSVerifier($this->algorithmManager);
        return $this;
    }

    public function setJWKSet($jwkJson)
    {
        $this->jwkSet = JWKSet::createFromJson($jwkJson);
        return $this;
    }

    public function verify($jwt)
    {
        // the jwk to verify against
        $jwk = $this->jwkSet->selectKey('sig', $this->algorithm);

        // We verify the signature. This method does NOT check the header.
        // The arguments are:
        // - The JWS object,
        // - The key,
        return $this->jwsVerifier->verifyWithKey($jwt, $jwk, 0);
    }
}
