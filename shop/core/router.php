<?php

function init()
{
    $parts = prepareUrlToParts();

    $controller = prepareControllerFileName(getArrayValue($parts, 0, 'index'));
    $controllersRout = getFromConfig('controllersDir');
    $controllerFile = "{$controllersRout}/{$controller}";
    if (!file_exists($controllerFile)) {
        die('Controller is not exists');
    }

    require_once $controllerFile;

    $action = prepareActionFunctionName(getArrayValue($parts, 1, 'index'));
    if (!function_exists($action)) {
        die('Action is not exists');
    }

    return $action();
}
