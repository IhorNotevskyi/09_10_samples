<?php

error_reporting(E_ALL);

function testDoSomething()
{
    echo __LINE__, '<br>',  __FILE__, '<br>', __FUNCTION__, '<br>';
}

testDoSomething();

$anonymous = function () {
    echo __FUNCTION__, '<br>';
};
$anonymous();

$do = 'Do';
$something = 'Something';
$doSomething = "test{$do}{$something}";
$doSomething();

echo "Output: testDoSomething()<br>";

function test($qwerty, $sub)
{
    echo "{$qwerty}: {$sub}<br>";
}
test('Name', 'Gabriel');

function qwerty($required, $custom = 123)
{
    echo "{$required}: {$custom}<br>";
}
qwerty('Age');
qwerty('Age', 28);

function printNumbers(array $numbers)
{
    echo implode(', ', $numbers), '<br>';
}
printNumbers([1, 5, 7, 8]);

function oldSum()
{
    echo 'Sum of ', func_num_args(), ' argument is ', array_sum(func_get_args()), '<br>';
}
oldSum(1, 3, 4, 6, 19, 44);

function newSum(...$params)
{
    echo 'Sum of ', count($params), ' argument is ', array_sum($params), '<br>';
}
newSum(3, 5);

function getPositives(...$integers)
{
    return array_filter($integers, function ($item) {
        return $item % 2 === 0;
    });
}
$positives = getPositives(1, 3, 4, 55, 66, 4);
var_dump($positives);

$outside = 12;
function visibility()
{
//    $GLOBALS['outside'] = 33;
//    global $outside;

    $outside = 44;

    $inside = 23;
}
visibility();
var_dump($outside);

$func = function () use ($outside) {
    $outside = 222;
    var_dump($outside);
};
$func();
var_dump($outside);

