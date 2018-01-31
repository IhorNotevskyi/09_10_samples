<?php

namespace components\console;

use components\Router;

/**
 * Class Application
 * @package components\console
 */
class Application extends \components\Application
{
    /**
     * @return mixed
     */
    public function run()
    {
        $dispatcher = new Dispatcher();
        return (new Router($dispatcher))->init();
    }
}