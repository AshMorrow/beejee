<?php

namespace Lib;

/**
 * Class Security
 * Using for generation password, csrf hash
 * and check it
 * @package Lib
 */
abstract class Security
{
    public static function set_csrf_token(){
        $_SESSION['token'] = self::hash_generate(uniqid());
    }

    public static function check_csrf_token($hash){

        return hash_equals($_SESSION['token'], $hash);
    }

    public static function hash_generate($string){

        return password_hash($string, PASSWORD_DEFAULT);
    }

    public static function password_check($string, $hash){

        return password_verify($string, $hash);
    }

}