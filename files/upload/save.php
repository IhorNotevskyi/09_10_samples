<?php

$allowed = ['image/jpg', 'image/jpeg', 'image/png', 'image/gif'];
$file = $_FILES['example'];
if (!in_array($file['type'], $allowed)) {
    die("Type {$file['type']} is not allowed");
}

$dir = __DIR__ . '/data';
move_uploaded_file($file['tmp_name'], "{$dir}/{$file['name']}");

header("Location: /files/upload");
exit;
