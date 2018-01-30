<?php

namespace helpers;

/**
 * Class SessionHelper
 * @package helpers
 */
class SessionHelper
{
    /**
     * @param string $key
     * @param mixed $data
     */
    public static function addFlash($key, $data)
    {
        self::initSession();

        $_SESSION['flashes'][$key] = $data;
    }

    /**
     * @param string $key
     * @param bool $clearAfterAccess
     * @return mixed
     */
    public static function getFlash($key, $clearAfterAccess = true)
    {
        self::initSession();

        $flash = ArrayHelper::getValue($_SESSION, $key);
        if ($flash && $clearAfterAccess) {
            unset($_SESSION['flashes'][$key]);
        }

        return $flash;
    }

    public static function initSession()
    {
        if (empty(session_id())) {
            session_start();
        }
    }
}
