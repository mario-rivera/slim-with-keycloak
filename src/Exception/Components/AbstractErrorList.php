<?php
namespace SlimApp\Exception\Components;

use Iterator;

class AbstractErrorList implements Iterator
{
    protected $position = 0;
    protected $array = [];
    
    public function rewind()
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->array[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->array[$this->position]);
    }

    public function reset()
    {
        $this->array = [];
    }
}