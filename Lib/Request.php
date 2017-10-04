<?php

namespace Lib;


abstract class Request
{

    public static function post($key){
        return isset($_POST[$key])? trim($_POST[$key]): false;
    }
}