<?php

use boys\Person as BoyPerson;
use girls\Person as GirlPerson;

require_once __DIR__ . '/olschool.autoload.php';

$boy = new BoyPerson();
$girl = new GirlPerson();

var_dump($boy, $girl);

$api = new \ga\transactions\Api();
var_dump($api);

