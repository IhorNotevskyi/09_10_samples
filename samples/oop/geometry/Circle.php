<?php

class Circle extends Figure implements Round
{
    private $radius;

    public function __construct($radius)
    {
        $this->radius = $radius;
    }

    function calculateSquare()
    {
        return Figure::P * pow($this->getRadius(), 2);
    }

    public function getRadius()
    {
        return $this->radius;
    }
}