<?php

namespace Lib;
use PDO;

/**
 * Class DB using for work with DataBase
 * implementing singleton pattern
 * @package Lib
 */
class DB
{
    private static $instance = null;
    private $pdo = null;

    private function __construct()
    {
        $this->pdo = new PDO("mysql:host=". DB_HOST . ";dbname=".DB_NAME, DB_USER_NAME, DB_PASSWORD);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        $this->pdo->exec('SET NAMES utf8');
    }

    private function __wakeup(){}

    private function __clone(){}

    private static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new DB();
        }
        return self::$instance;
    }

    public static function pdo(){
        return self::getInstance()->pdo;

    }

}