<?php

function saveToFile($content, $dir, $file = null)
{
    $dir = normalizeDirName($dir);

    $file = $file ?: getUniqueFileName($dir);
    file_put_contents("{$dir}/{$file}", $content);

    return $file;
}

function getUniqueFileName($dir, $ext = null)
{
    $dir = normalizeDirName($dir);

    do {
        $ext = $ext ? ".{$ext}" : '';
        $file = md5(uniqid()) . $ext;
    } while (file_exists("{$dir}/{$file}"));

    return $file;
}

function normalizeDirName($dir)
{
    return rtrim($dir, " \t\n\r\0\x0B/\\");
}

function getArrayValue(array $data, $key, $default = null)
{
    return array_key_exists($key, $data) ? $data[$key] : $default;
}

function readDirectory($dir)
{
    return array_filter(scandir($dir), function ($item) {
        return !in_array($item, ['.', '..', '.gitignore']);
    });
}

function readSerializedFile($file, $dir)
{
    $dir = normalizeDirName($dir);
    $content = file_get_contents("{$dir}/{$file}");

    return unserialize($content);
}
