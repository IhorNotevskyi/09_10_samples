<?php

namespace components\api;

use Exception;
use components\Router;
use components\web\Dispatcher;
use exceptions\NotAuthorisedException;

/**
 * Class Application
 * @package components\api
 */
class Application extends \components\Application
{
    public function run()
    {
        $dispatcher = new Dispatcher();

        try {
            return (new Router($dispatcher))->init();
        } catch (NotAuthorisedException $exception) {
            return ['status' => 401, 'massage' => $exception->getMessage()];
        } catch (Exception $exception) {
            return ['status' => 500, 'massage' => $exception->getMessage()];
        }
    }
}
