<?php

class Test
{
    public $q1;

    private $storage = [];

    public function __set($name, $value)
    {
        $this->storage[$name] = $value;
    }

    public function __get($name)
    {
        return array_key_exists($name, $this->storage) ? $this->storage[$name] : null;
    }

    public function __call($name, $arguments)
    {
        $isGetter = substr($name, 0, 3) === 'get';
        $attribute = strtolower(substr($name, 3));
        $isAllowedAttribute = array_key_exists($attribute, $this->storage);

        if ($isGetter && $isAllowedAttribute) {
            return $this->storage[$attribute];
        }

        throw new Exception("Method {$name} is not allowed");
    }

    public function __sleep()
    {
        return ['q1'];
    }

    public function __wakeup()
    {
        $this->IAmAliveAgain = true;
    }

    public function __toString()
    {
        return serialize($this);
    }
}
