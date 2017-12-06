<?php

class Tvorog extends Cheese
{
    protected $name = 'Tvorog';
    protected $fat = '30';

    public function getAPart()
    {
        return "Gorka of {$this->name} ({$this->fat}%) [{$this->className()}] cheese";
    }
}