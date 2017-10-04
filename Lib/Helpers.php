<?php
namespace Lib;


abstract class Helpers
{
    public static function statusText($id){
        $status = [
            'In process',
            'Finished'
        ];


        return $status[$id];
    }
}