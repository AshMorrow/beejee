<?php
namespace Controllers;

/**
 * Main controller all controllers must extent this class.
 * Class Controller
 * @package Controllers
 */
class Controller
{
    public $ajax = false;

    public function __construct()
    {
        return $this;
    }

    protected function view($path, Array $params = [])
    {
        ob_start();
        extract($params);
        include_once DIR_VIEW. str_replace('.', DS,$path). '.php';
        $content = ob_get_clean();

        if($this->ajax){
            echo $content;
            return;
        }

        require_once DIR_VIEW. 'main.php';
    }

}