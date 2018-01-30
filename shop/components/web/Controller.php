<?php

namespace components\web;

use exceptions\NotAuthorised;

/**
 * Class Controller
 * @package components\web
 */
class Controller extends \components\Controller
{
    /**
     * @return Template
     */
    protected function getTemplate()
    {
        return Application::getTemplate();
    }
}
