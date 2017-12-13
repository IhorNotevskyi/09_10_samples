<?php

error_reporting(E_ALL);

require_once __DIR__ . '/olschool.autoload.php';

$bread = new components\Borobinsky();
$butter = new components\VoloskovePole();

$tvorogCheese = new components\Tvorog();
$gollandianCheese = new components\Gollandian();
$russianCheese = new components\Russian();

$sandwich = new Sandwich($russianCheese, $bread, $butter, $tvorogCheese, $gollandianCheese);

echo $sandwich->create();
