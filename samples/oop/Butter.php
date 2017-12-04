<?php

abstract class Butter
{
    protected $name;

    public function getALittle()
    {
        return "A little of {$this->name} butter";
    }
}
