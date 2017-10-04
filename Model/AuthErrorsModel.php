<?php
namespace Model;
use Lib\DB;
class AuthErrorsModel{


    public static function searchByAddr($addr){
        $result = DB::pdo()->query("SELECT * FROM auth_errors WHERE ip LIKE '{$addr}' LIMIT 1");
        return $result->rowCount()? $result->fetch(): false;
    }

    public static function deleteByAddr($addr){
        DB::pdo()->query("DELETE FROM auth_errors WHERE ip LIKE '{$addr}'");
    }

    public static function updateByAddr($counter,$addr){
        DB::pdo()->query("UPDATE auth_errors SET error_counter = {$counter}, `date` = NOW() WHERE ip LIKE '{$addr}' LIMIT 1");
    }

    public static function insert($addr){
        DB::pdo()->query("INSERT INTO auth_errors VALUES ('{$addr}', 1, NOW())");
    }

}
