<?php
namespace MRivera\JWT;

use Jose\Component\Signature\Serializer\JWSSerializerManager;
use Jose\Component\Signature\Serializer\CompactSerializer;
use Jose\Component\Core\Converter\StandardConverter;

use Jose\Component\Signature\JWS;

class JWTManager
{
    /**
     * @var StandardConverter
     */
    protected $converter;

    /**
     * @var CompactSerializer
     */
    protected $serializer;

    /**
     * @var JWSSerializerManager
     */
    protected $serializerManager;

    public function __construct()
    {
        $this->setConverter();
        $this->setSerializer();
        $this->setSerializerManager();
    }

    public function setConverter()
    {
        $this->converter = new StandardConverter();
    }

    public function setSerializer()
    {
        $this->serializer = new CompactSerializer($this->converter);
    }

    public function setSerializerManager()
    {
        $this->serializerManager = JWSSerializerManager::create([$this->serializer]);
    }

    public function getJWS($token): JWS
    {
        return $this->serializerManager->unserialize($token);
    }

    public function decodeJWS(JWS $jws)
    {
        return $this->converter->decode($jws->getPayload());
    }
}
