<?php

abstract class Cheese
{
    protected $name;
    protected $fat;

    public function getAPart()
    {
        return "Slice of {$this->name} ({$this->fat}%) cheese";
    }
}