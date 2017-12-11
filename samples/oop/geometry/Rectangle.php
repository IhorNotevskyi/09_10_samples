<?php

class Rectangle extends Figure implements Rectangular
{
    private $width;

    private $height;

    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    function calculateSquare()
    {
        return $this->getWidth() * $this->getHeight();
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }
}