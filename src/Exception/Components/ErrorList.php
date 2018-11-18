<?php
namespace SlimApp\Exception\Components;

use Throwable;

class ErrorList extends AbstractErrorList
{
    public function __construct($errors = null)
    {
        $this->setErrors($errors);
    }

    public function setErrors($errors)
    {
        $this->reset();

        if (is_iterable($errors)) {
            return $this->bulkAdd($errors);
        }

        if (!empty($errors)) {
            return $this->add($errors);
        }

        return $this;
    }

    public function getErrors(): array
    {
        return $this->array;
    }

    public function add($error)
    {
        $message = ($error instanceof Throwable) ? 
            $error->getMessage() : $error;

        $this->array[] = ['message' => $message];
        
        return $this;
    }

    public function bulkAdd($errors, $code = null)
    {
        foreach ($errors as $error) {
            $this->add($error, $code);
        }

        return $this;
    }
}