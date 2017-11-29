<?php

/**
 * @return bool
 */
function getIsPostRequest()
{
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

/**
 * @param string $url
 * @param int $status
 * @param bool $terminate
 */
function redirect($url, $status = 301, $terminate = true)
{
    header("Location: {$url}", true, $status);
    if ($terminate) {
        exit;
    }
}
