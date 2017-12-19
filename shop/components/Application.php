<?php

namespace components;

/**
 * Class Application
 * @package components
 */
class Application
{
    public function __construct(array $config)
    {
        Config::addData($config);
    }

    public function run()
    {
        $dispatcher = new Dispatcher();
        (new Router($dispatcher))->init();
    }
}
