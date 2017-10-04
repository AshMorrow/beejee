<?php

namespace Controllers;
use Lib\Redirect;
use Lib\Security;

class LoginController extends Controller
{
    public function showLoginForm(){

        if ($_SESSION['logged']) {
            Redirect::to(R_LOGGED);
        }

        $this->view('login',['title' => 'Login form']);

    }
}