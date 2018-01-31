<?php

$baseDir = dirname(__DIR__);

return [
    'controllersNamespace' => 'console\controllers',
    'migrations' => [
        'dir' => "{$baseDir}/console/migrations",
        'namespace' => '\console\migrations'
    ]
];
