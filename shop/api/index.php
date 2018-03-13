<?php

require_once __DIR__ . '/../vendor/autoload.php';

$config = array_merge(
    require_once __DIR__ . '/../configs/main.php',
    require_once __DIR__ . '/../configs/api.php'
);

$answer = (new components\api\Application($config))->run();
header('Content-Type: application/json');
echo json_encode($answer);
