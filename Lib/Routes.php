<?php

namespace Lib;
use Lib\Redirect;

abstract class Routes
{

    /**
     *  Using in index.php for selecting controller and method
     *  using URL
     */
    public static function init(){

        $routes = require_once (ROOT.'App'.DS.'routes.php');

        $uri = parse_url(strtolower($_SERVER['REQUEST_URI']))['path'];
        $method = strtolower($_SERVER['REQUEST_METHOD']);

        if(array_key_exists($uri , $routes[$method])){
            $data = $routes[$method][$uri];
            if(is_array($data) && $data['secured']){
                if(!$_SESSION['logged']) Redirect::to(R_LOGOUT);
                $controller_method = explode('@', $data['controller']);
            }else{
                $controller_method = explode('@', $data);
            }

            $controller = 'Controllers\\'.$controller_method[0];
            $method = $controller_method[1];
            $controller = new $controller;
            $controller->$method();
            return;
        }

        Redirect::to('/');

    }
}