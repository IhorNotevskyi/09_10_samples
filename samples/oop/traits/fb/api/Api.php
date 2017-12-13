<?php

namespace fb\api;

class Api
{
    public $login;

    public $password;

    public function call($method)
    {
        return self::class . ' >>> ' . $method;
    }
}