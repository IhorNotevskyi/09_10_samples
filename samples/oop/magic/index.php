<?php

error_reporting(E_ALL);

require_once __DIR__ . '/Test.php';

$test = new Test();

$test->q1 = 1;
var_dump($test->q1);

$test->q2 = 3;
var_dump($test->q2);

$test->qwerty = 'Some test';
var_dump($test->getQ2(), $test->getQwerty());

$serialised = (string)$test;
var_dump($serialised);

$unserialized = unserialize($serialised);
var_dump($unserialized);
