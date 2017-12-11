<?php

error_reporting(E_ALL);

require_once __DIR__ . '/olschool.autoload.php';

$bread = new Borobinsky();
$butter = new VoloskovePole();

$tvorogCheese = new Tvorog();
$gollandianCheese = new Gollandian();
$russianCheese = new Russian();

$sandwich = new Sandwich($russianCheese, $bread, $butter, $tvorogCheese, $gollandianCheese);

echo $sandwich->create();
