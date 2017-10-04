<?php

namespace Lib;


class Redirect
{
    /**
     * Use for redirecting
     * @param $path
     */
    public static function to($path){
//        Security::set_csrf_token();
        header('Location: '. $path);
    }
}