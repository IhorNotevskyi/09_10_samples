<?php

namespace components\console;

/**
 * Class Controller
 * @package components\console
 */
class Controller extends \components\Controller
{
    /**
     * @param string $line
     * @return string
     */
    protected function writeLine($line)
    {
        return $line . PHP_EOL;
    }
}
