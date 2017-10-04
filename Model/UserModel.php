<?php

namespace Model;
use Lib\DB;

class UserModel
{
    public static function getByEmail($email){
        $query = DB::pdo()->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
        $query->execute(['email' => $email]);
        if($query->rowCount()){
            return $query->fetch();
        }

        return false;
    }
}