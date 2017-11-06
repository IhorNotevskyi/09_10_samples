<?php

error_reporting(E_ALL);

require_once __DIR__ . '/lib.php';

$dir = __DIR__ . '/data';
$file = getArrayValue($_GET, 'file');

if (empty($file)) {
    die('Required params are not exists');
}

$comment = readSerializedFile($file, $dir);
$action = "/save.php?file={$file}";

require_once __DIR__ . '/form.php';