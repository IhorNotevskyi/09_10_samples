<?php

namespace components\abstractions;

abstract class Kotleta extends BurgerComponent
{
    /**
     * @var string
     */
    protected $meet;

    /**
     * @return string
     */
    public function getAPart()
    {
        return "Kotleta with {$this->meet} [{$this->className()}] meet";
    }
}
