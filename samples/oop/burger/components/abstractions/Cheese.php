<?php

namespace components\abstractions;

abstract class Cheese extends BurgerComponent
{
    protected $name;
    protected $fat;

    public function getAPart()
    {
        return "Slice of {$this->name} ({$this->fat}%) [{$this->className()}] cheese";
    }

    public function getFat()
    {
        return self::class;
    }
}