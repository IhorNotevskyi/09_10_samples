<?php

namespace api\controllers;

use components\api\Controller;

/**
 * Class IndexController
 * @package api\controllers
 */
class IndexController extends Controller
{
    public function actionIndex()
    {
        return ['status' => 200, 'message' => 'Success'];
    }
}
