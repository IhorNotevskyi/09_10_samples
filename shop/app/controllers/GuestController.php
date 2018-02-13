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
            ResponseHelper::redirect('/guest/login');
        }

        $user = User::findOne([['=', 'login', $login], ['=', 'password', md5($password)]]);
        if (empty($user)) {
            SessionHelper::addFlash('error', 'Login or password is incorrect');
            ResponseHelper::redirect('/guest/login');
        }

        SessionHelper::set('user', $user);
        ResponseHelper::redirect('/');
    }

    public function actionRegistration()
    {
        return $this->getTemplate()->render('guest/registration');
    }

    public function actionCreateAccount()
    {
        $login = ArrayHelper::getValue($_POST, 'login');
        $password = ArrayHelper::getValue($_POST, 'password');
        $repeatPassword = ArrayHelper::getValue($_POST, 'repeat_password');

        if (empty($login) || empty($password) || empty($repeatPassword)) {
            SessionHelper::addFlash('error', 'All fields are required');
            ResponseHelper::redirect('/guest/registration');
        }

        if ($password !== $repeatPassword) {
            SessionHelper::addFlash('error', 'Passwords are not equals');
            ResponseHelper::redirect('/guest/registration');
        }

        $user = new User();
        $user->load([
            'name' => ArrayHelper::getValue($_POST, 'name'),
            'login' => $login,
            'password' => md5($password)
        ]);
        $user->save();

        SessionHelper::addFlash('success', 'Account created successfully');
        ResponseHelper::redirect('/guest/login');
    }
}
