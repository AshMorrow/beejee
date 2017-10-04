<?php

namespace Lib;

/**
 * Class Flash using for flash massages
 *
 * @package Lib
 */
class Flash
{

    public static function check(){
        return $_SESSION['flash']? true: false;
    }


    /*
     * Showing flash massage if exists
     */
    public static function get(){
        echo $_SESSION['flash'];
        unset($_SESSION['flash']);
    }

    /**
     * Set flash massage
     * @param $message
     */
    public static function set($message){
        $_SESSION['flash'] = $message;
    }

}