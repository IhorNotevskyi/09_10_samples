<?php

namespace components;

/**
 * Class Application
 * @package components
 */
abstract class Application
{
    public function __construct(array $config)
    {
        Config::addData($config);
    }

    abstract public function run();
}
