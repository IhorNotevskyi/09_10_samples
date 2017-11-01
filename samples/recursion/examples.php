<?php
function factorial($number)
{
    if ($number < 2) {
        return 1;
    } else {
        return ($number * factorial($number - 1));
    }
}
echo factorial(5);
echo '<br>';

//5 * (factorial(4) = 24)
//    4 * (factorial(3) = 6)
//        3 * (factorial(2) = 2)
//            2 * (factorial(1) = 1)


function fibonacci($level)
{
    if ($level < 0) {
        return null;
    } elseif ($level === 0) {
        return 0;
    } elseif ($level === 1 || $level === 2) {
        return 1;
    } else {
        return fibonacci($level - 1) + fibonacci($level - 2);
    }
}
echo fibonacci(10);
echo '<br>';
function power($number, $power)
{
    static $iterations = 0;
    $iterations++;
    var_dump($iterations);

    if ($power == 0) {
        return 1;
    }
    if ($power % 2 == 0) {
        $sub = power($number, $power / 2);
        return $sub * $sub;
    } else {
        return $number * power($number, $power - 1);
    }
}
echo power(3, 20);