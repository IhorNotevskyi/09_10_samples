<?php

abstract class Kotleta extends BurgerComponent
{
    /**
     * @var string
     */
    protected $meet;

    /**
     * @return string
     */
    public function getOne()
    {
        return "Kotleta with {$this->meet} [{$this->className()}] meet";
    }
}
