<?php

namespace components;

use helpers\ArrayHelper;
use helpers\StringHelper;

/**
 * Class Dispatcher
 * @package components
 */
class Dispatcher
{
    /**
     * @var string
     */
    private $rout;

    /**
     * @var string
     */
    private $controller;

    /**
     * @var string
     */
    private $action;

    public function __construct()
    {
        $this->rout = trim($_SERVER['REQUEST_URI'], " \t\n\r\0\x0B/");
        $parts = $this->prepareUrlToParts();

        $defaultController = Config::get('defaults.controller', 'index');
        $controllerPart = ArrayHelper::getValue($parts, 0, $defaultController);
        $this->controller = $this->prepareControllerClassName($controllerPart);

        $defaultAction = Config::get('defaults.action', 'index');
        $actionPart = ArrayHelper::getValue($parts, 1, $defaultAction);
        $this->action = $this->prepareActionFunctionName($actionPart);
    }

    /**
     * @return string
     */
    public function getControllerClassName()
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getActionMethodName()
    {
        return $this->action;
    }

    /**
     * @return array
     */
    private function prepareUrlToParts()
    {
        $getParamsStart = strpos($this->rout, '?');
        if (false !== $getParamsStart) {
            $this->rout = substr($this->rout, 0, $getParamsStart);
        }

        return array_filter(explode('/', $this->rout));
    }

    /**
     * @param string $urlPart
     * @return string
     */
    private function prepareControllerClassName($urlPart)
    {
        $namespace = Config::get('controllersNamespace');
        $namespace = StringHelper::rtrim($namespace, '\\');

        return $namespace . '\\' . StringHelper::camelize($urlPart) . 'Controller';
    }

    /**
     * @param string $urlPart
     * @return string
     */
    private function prepareActionFunctionName($urlPart)
    {
        return 'action' . StringHelper::camelize($urlPart);
    }
}
