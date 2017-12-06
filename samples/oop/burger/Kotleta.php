<?php

class Kotleta
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
        return "Kotleta with {$this->meet} meet";
    }
}
