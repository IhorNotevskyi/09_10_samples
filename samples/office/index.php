<?php

require_once __DIR__ . '/vendor/autoload.php';

$pdf = new \Knp\Snappy\Pdf('/usr/local/bin/wkhtmltopdf-amd64');

//header('Content-Type: application/pdf');
//header('Content-Disposition: attachment; filename="file.pdf"');
echo $pdf->getOutput('http://mignews.com.ua/');