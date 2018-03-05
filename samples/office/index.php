<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\PDF;

$builder = (new PDF())->getBuilder();

$builder->AddPage();
$builder->Image('https://php-academy.kiev.ua/2017/img/logo-footer.png');
$builder->SetFont(PDF::ARIAL_FAMILY, PDF::BOLD_TEXT, 14);
$builder->Ln(10);

$text = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.';
$builder->Cell(100, 20, $text);

$builder->Output("report.pdf", PDF::BROWSER_OUTPUT);
