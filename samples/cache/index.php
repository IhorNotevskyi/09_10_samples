<?php

$cache = new Memcached();
$cache->addServer('127.0.0.1', 11211);

$data = $cache->get('qwerty');
if (empty($data)) {
    $data = getData();
    $cache->set('qwerty', $data, 10);
}

var_dump($data);

function getData()
{
    sleep(3);

    return ['test' => mt_rand()];
}
