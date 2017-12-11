<?php

abstract class BurgerComponent
{
    public function className()
    {
//        var_dump(static::getFat());
        return static::class;
    }

    public function getFat()
    {
        return self::class;
    }

    abstract public function getAPart();
}