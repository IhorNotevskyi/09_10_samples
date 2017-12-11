<?php

require_once __DIR__ . '/Round.php';
require_once __DIR__ . '/Rectangular.php';
require_once __DIR__ . '/Figure.php';
require_once __DIR__ . '/SquareCalculator.php';
require_once __DIR__ . '/Circle.php';
require_once __DIR__ . '/Rectangle.php';

$circle = new Circle(10);
$rectangle = new Rectangle(3, 5);


var_dump($circle->calculateSquare(), $rectangle->calculateSquare());
var_dump(SquareCalculator::calculate($rectangle));
