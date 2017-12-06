<?php

abstract class Bread
{
    protected $name;

    public function getAPart()
    {
        return "Slice of {$this->name} bread";
    }
}
