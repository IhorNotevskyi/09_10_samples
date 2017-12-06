<?php

error_reporting(E_ALL);

require_once __DIR__ . '/Cheese.php';
require_once __DIR__ . '/Gollandian.php';
require_once __DIR__ . '/Russian.php';
require_once __DIR__ . '/Tvorog.php';

require_once __DIR__ . '/Bread.php';
require_once __DIR__ . '/Borobinsky.php';

require_once __DIR__ . '/Butter.php';
require_once __DIR__ . '/VoloskovePole.php';

require_once __DIR__ . '/Sandwich.php';

$tvorogCheese = new Tvorog();
$bread = new Borobinsky();
$butter = new VoloskovePole();

$sandwich = new Sandwich();

$sandwich->setBread($bread);
$sandwich->setButter($butter);
$sandwich->setCheese($tvorogCheese);

$gollandianCheese = new Gollandian();
$sandwich2 = clone $sandwich;
$sandwich2->setCheese($gollandianCheese);

echo $sandwich->create(), '<br><br>', $sandwich2->create();
