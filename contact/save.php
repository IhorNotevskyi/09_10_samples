<?php

require_once __DIR__ . '/lib.php';

$name = getArrayValue($_POST, 'name');
$comment = getArrayValue($_POST, 'comment');
$file = getArrayValue($_GET, 'file');

if (empty($name) || empty($comment)) {
    die('Required parameters are not exists');
}

$dir = __DIR__ . '/data';

$content = serialize($_POST);
$file = saveToFile($content, $dir, $file);

header('Location: /');
exit;
