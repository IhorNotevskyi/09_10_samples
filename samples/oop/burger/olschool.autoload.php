<?php

function __autoload($class)
{
    $rout = explode('_', $class);
    $class = array_pop($rout);

    $dir = __DIR__;
    foreach ($rout as $item) {
        $dir .= DIRECTORY_SEPARATOR . $item;
    }

    $file = $dir . DIRECTORY_SEPARATOR . $class . '.php';
    if (file_exists($file)) {
        return require_once $file;
    }

    die("Class {$class} can not be loaded");
}
