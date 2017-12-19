<?php

namespace components\console;

use components\Router;

/**
 * Class Application
 * @package components\console
 */
class Application extends \components\Application
{
    public function run()
    {
        $dispatcher = new Dispatcher();
        (new Router($dispatcher))->init();
    }
}