<?php

$number1 = array_key_exists('number1', $_POST) ? $_POST['number1'] : null;
$number2 = array_key_exists('number2', $_POST) ? $_POST['number2'] : null;

if (empty($number1) || empty($number2)) {
    $result = ['status' => 'error', 'data' => 'Bad request'];
} else {
    $result = ['status' => 'ok', 'data' => $number1 * $number2];
}

echo json_encode($result);
