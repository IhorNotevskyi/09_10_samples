<?php

class Tvorog extends Cheese implements FreeFlowingInterface, FattyInterface
{
    protected $name = 'Tvorog';
    protected $fat = '30';

    public function getAPart()
    {
        return "Gorka of {$this->name} ({$this->fat}%) [{$this->className()}] cheese";
    }

    public function getFlowingSpeed()
    {
        return '10 pieces / 1 sec';
    }

    public function getNoise()
    {
        return 'ssssssssssss';
    }
}