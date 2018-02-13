<?php

namespace app\controllers;

use components\web\SecuredController;

/**
 * Class SiteController
 * @package app\controllers
 */
class SiteController extends SecuredController
{
    public function actionShow($id, $title, $some = 1)
    {
        var_dump($id, $title, $some);
    }

    public function actionUnlim(...$attr)
    {
        var_dump($attr);
    }
}
