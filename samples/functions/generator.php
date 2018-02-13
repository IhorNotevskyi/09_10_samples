<?php

function numbers($min, $max)
{
    for ($i = $min; $i <= $max; $i++) {
        yield $i;
    }
}

foreach (numbers(PHP_INT_MIN, PHP_INT_MAX) as $number) {
    echo "{$number}, ";
}
