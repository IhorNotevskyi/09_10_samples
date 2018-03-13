<?php

namespace components\console;

use components\AbstractDispatcher;
use components\Config;
use helpers\ArrayHelper;

/**
 * Class Dispatcher
 * @package components\console
 */
class Dispatcher extends AbstractDispatcher
{
    public function __construct()
    {
        $this->rout = ArrayHelper::getValue($_SERVER['argv'], 1, '');
        $this->params = array_slice($_SERVER['argv'], 2);

        $parts = $this->prepareUrlToParts();

        $defaultController = Config::get('defaults.controller', 'index');
        $controllerPart = ArrayHelper::getValue($parts, 0, $defaultController);
        $this->controller = $this->prepareControllerClassName($controllerPart);

        $defaultAction = Config::get('defaults.action', 'index');
        $actionPart = ArrayHelper::getValue($parts, 1, $defaultAction);
        $this->action = $this->prepareActionFunctionName($actionPart);
    }

    /**
     * @return array
     */
    public function getParams()
    {
        $params = [];
        foreach ($this->params as $param) {
            $parts = explode('=', $param);
            $params[current($parts)] = end($parts);
        }

        return $params;
    }
}
