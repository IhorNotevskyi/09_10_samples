<?php

require_once __DIR__ . '/vendor/autoload.php';

use app\PDF;

$builder = (new PDF())->getBuilder();

$builder->AddPage();
$builder->Image('https://php-academy.kiev.ua/2017/img/logo-footer.png');
$builder->SetFont(PDF::ARIAL_FAMILY, PDF::BOLD_TEXT, 24);
$builder->Ln(50);

$text = 'Получите 6 месяцев курсов FullStack с IT English + трудоустройство с испытательным сроком в 3 месяца. Минимальная зарплата на время испытательного срока - от $250 до $350 в месяц. Контракт на стажировку подписывается при старте курсов. ';
$builder->Cell(100, 20, $text);

$builder->Output("report.pdf", PDF::BROWSER_OUTPUT);
