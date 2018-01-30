<?php

namespace components\web;

use exceptions\NotAuthorisedException;

/**
 * Class SecuredController
 * @package components\web
 */
class SecuredController extends Controller
{
    public function __construct()
    {
        throw new NotAuthorisedException();
    }

    /**
     * @return Template
     */
    public function getTemplate()
    {
        $template = parent::getTemplate();
        $template->setLayout('layouts/main');

        return $template;
    }
}
