<?php

namespace google\api;

class Api
{
    public $authHash;

    public function call($method)
    {
        return self::class . ' >>> ' . $method;
    }
}