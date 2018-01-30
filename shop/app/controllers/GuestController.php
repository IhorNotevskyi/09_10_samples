<?php

namespace app\controllers;

use app\models\User;
use components\web\Controller;
use helpers\ArrayHelper;
use helpers\ResponseHelper;
use helpers\SessionHelper;

/**
 * Class GuestController
 * @package app\controllers
 */
class GuestController extends Controller
{
    public function actionLogin()
    {
        return $this->getTemplate()->render('guest/login');
    }

    public function actionAuth()
    {
        $login = ArrayHelper::getValue($_POST, 'login');
        $password = ArrayHelper::getValue($_POST, 'password');

        if (empty($login) || empty($password)) {
            SessionHelper::addFlash('error', 'All fields are required');
            ResponseHelper::redirect('/guest/registration');
        }

        $user = new User();
    }

    public function actionRegistration()
    {
        return $this->getTemplate()->render('guest/registration');
    }

    public function actionCreateAccount()
    {
        $login = ArrayHelper::getValue($_POST, 'login');
        $password = ArrayHelper::getValue($_POST, 'password');

        if (empty($login) || empty($password)) {
            SessionHelper::addFlash('error', 'All fields are required');
            ResponseHelper::redirect('/guest/registration');
        }

        $user = new User();
        $user->load([
            'login' => $login,
            'password' => md5($password)
        ]);
        $user->save();

        SessionHelper::addFlash('success', 'Account created successfully');
        ResponseHelper::redirect('/guest/login');
    }
}
