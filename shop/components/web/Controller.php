<?php

namespace components\web;

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
        Application::getTemplate()->setLayout('layouts/guest');
        return Application::getTemplate();
    }
}
