<?php

namespace Controllers;

use Lib\Flash;
use Lib\Security;
use Lib\Redirect;
use Model\AuthErrorsModel as AuthErrors;
use Model\UserModel;

class SecurityController extends Controller
{

    /**
     * Checking error status
     */
    public function AuthErrorsCheck()
    {
        $errors = AuthErrors::searchByAddr($_SERVER['REMOTE_ADDR']);
        if ($errors && $errors['error_counter'] >= A_ERROR_LIMIT) {
            $diff = time() - strtotime($errors['date']);
            if ($diff < A_TIME_LIMIT) {
                Flash::set('Попробуйте еще раз через ' . (A_TIME_LIMIT - $diff) . ' секуд');
                Redirect::to(R_LOGIN_ERROR);
                die;
            } else {
                AuthErrors::deleteByAddr($_SERVER['REMOTE_ADDR']);
            }
        }
    }

    /**
     * Creating auth error record and updating error counter
     */
    public function errorLogging()
    {
        $errors = AuthErrors::searchByAddr($_SERVER['REMOTE_ADDR']);
        if ($errors) {
            $errors_counter = $errors['error_counter'] + 1;
            AuthErrors::updateByAddr($errors_counter, $_SERVER['REMOTE_ADDR']);
        } else {
            AuthErrors::insert($_SERVER['REMOTE_ADDR']);
        }
    }

    public function logout()
    {
        if (Security::check_csrf_token($_POST['_token'])) {
            session_destroy();
            unset($_SESSION);
            Redirect::to(R_LOGOUT);
        }
    }

    public function login()
    {
        if ($_POST && $_POST['email'] && $_POST['password'] && Security::check_csrf_token($_POST['_token'])) {
            $this->AuthErrorsCheck();
            $user = UserModel::getByEmail($_POST['email']);
            if ($user && Security::password_check($_POST['password'], $user['password'])) {
                $_SESSION['logged'] = true;
                $_SESSION['userName'] = $user['name'];
                $_SESSION['userEmail'] = $user['email'];

                AuthErrors::deleteByAddr($_SERVER['REMOTE_ADDR']);

                Redirect::to(R_LOGIN_ERROR);
                die;
            }

            $this->errorLogging();
            Flash::set('Неверные данные');
        }

        Redirect::to(R_LOGIN_ERROR);
    }
}