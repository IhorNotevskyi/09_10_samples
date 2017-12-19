<?php

error_reporting(E_ALL);

require_once __DIR__ . '/../components/Autoload.php';
$autoload = new \components\Autoload(dirname(__DIR__));
spl_autoload_register([$autoload, 'load']);

$config = require_once __DIR__ . '/../configs/main.php';
(new components\Application($config))->run();
