<?php

abstract class Butter extends BurgerComponent
{
    protected $name;

    public function getALittle()
    {
        return "A little of {$this->name} [{$this->className()}] butter";
    }
}
