<?php

namespace components\web;

use components\Router;

/**
 * Class Application
 * @package components\web
 */
class Application extends \components\Application
{
    public function run()
    {
        $dispatcher = new Dispatcher();
        (new Router($dispatcher))->init();
    }
}