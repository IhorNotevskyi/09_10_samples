<?php

abstract class Bread extends BurgerComponent
{
    protected $name;

    public function getAPart()
    {
        return "Slice of {$this->name} [{$this->className()}] bread";
    }
}
