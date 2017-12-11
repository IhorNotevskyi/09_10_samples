<?php

require_once __DIR__ . '/ApiException.php';
require_once __DIR__ . '/ApiLoginException.php';
require_once __DIR__ . '/ApiPasswordException.php';
require_once __DIR__ . '/MyOwnException.php';

require_once __DIR__ . '/Api.php';
require_once __DIR__ . '/Application.php';

try {
    (new Application())->doSomething();
} catch (ApiException $exception) {
    var_dump($exception);
}


