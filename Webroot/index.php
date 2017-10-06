<?php
use Lib\Routes;
use Lib\Security;
try{
    session_start();
    require_once '..' . DIRECTORY_SEPARATOR .'App'.DIRECTORY_SEPARATOR. 'config.php';

    spl_autoload_register(function($class){
        require_once ROOT. str_replace('\\', DS, $class).'.php';
    });

    if(!$_SESSION['token']){
        Security::set_csrf_token();
    }

    Routes::init();

}catch (Exception $e){
    var_dump('<pre>',$e,'</pre>');
}
