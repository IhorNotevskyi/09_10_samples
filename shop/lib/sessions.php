<?php

function startSession()
{
    $sessionId = session_id();
    if (empty($sessionId)) {
        session_start();
    }
}

function addFlash($key, $value)
{
    startSession();

    $_SESSION[$key] = $value;
}

/**
 * @param string $key
 * @param bool $delete
 * @return mixed|null
 */
function getFlash($key, $delete = true)
{
    startSession();

    $flash = getArrayValue($_SESSION, $key);
    if ($flash && $delete) {
        unset($_SESSION[$key]);
    }

    return $flash;
}
