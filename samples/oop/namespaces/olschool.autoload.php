<?php

function __autoload($class)
{
    $aliases = [
        'ga' => 'google\api'
    ];
    foreach ($aliases as $alias => $rout) {
        if (stripos($class, $alias) === false) {
            continue;
        }

        $class = str_replace($alias, $rout, $class);
    }

    $dir = __DIR__ . DIRECTORY_SEPARATOR;
    $file = $dir . str_replace('\\', DIRECTORY_SEPARATOR, ltrim($class, '\\')) . '.php';

    if (file_exists($file)) {
        return require_once $file;
    }

    die("Class {$class} can not be loaded");
}
