<?php
namespace SlimApp\Exception\Components;

use SlimApp\Exception\Components\ErrorList;
use JsonSerializable;
use Throwable;

class ErrorResponseData implements JsonSerializable
{
    protected $errorList;
    private $debugData = [];

    public function __construct($errors = null)
    {
        $this->setErrors($errors);
    }

    public function setErrors($errors)
    {
        if (!$errors instanceof ErrorList) {
            $errors = new ErrorList($errors);
        }
        
        return $this->setErrorList($errors);
    }

    public function setErrorList(ErrorList $list)
    {
        $this->errorList = $list;
        return $this;
    }

    public function getErrorList(): ErrorList
    {
        return $this->errorList;
    }

    public function setDebugData(Throwable $e)
    {
        $this->debugData['file'] = $e->getFile();
        $this->debugData['line'] = $e->getLine();
        $this->debugData['trace'] = $e->getTrace();

        return $this;
    }

    public function getDebugData()
    {
        return $this->debugData;
    }

    public function jsonSerialize()
    {
        $data = ['errors' => $this->errorList->getErrors()];

        if (!empty($this->getDebugData())) {
            $data['debug'] = $this->getDebugData();
        }

        return $data;
    }
}