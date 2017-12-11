<?php

abstract class Butter extends BurgerComponent
{
    protected $name;

    public function getAPart()
    {
        return "A little of {$this->name} [{$this->className()}] butter";
    }
}
