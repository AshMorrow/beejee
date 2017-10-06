<?php
namespace Model;

use Lib\Request;

abstract class TaskFormModel
{
    /**
     * Pattern for removing style tag from string
     * @var string
     */
    private static $scriptTagRemovePattern = "/((<(\s*)(script)(\s*)(\/*)(\s*)>((.|\n)*?)<(\s*)(\/+)(\s*)(script)(\s*)>)|<(\s*)(\/*)(\s*)(script)(\s*)(\/*)(\s*)>)*/";

    public static function createValidate(){

        $name = trim(strip_tags(Request::post('name')));
        $email = trim(strip_tags(Request::post('email')));

        if(!$name || !filter_var($email, FILTER_VALIDATE_EMAIL)) return;

        $text = trim(preg_replace(self::$scriptTagRemovePattern, '', Request::post('text')));
        $shortText = strip_tags($text);
        if(strlen($shortText) > 255){
            $shortText = substr($shortText, 0, 250). '...';
        }

        $data = [
            'name' => $name,
            'email' => $email,
            'text' => $text,
            'short_text' => $shortText
        ];

        return $data;
    }

    public static function editValidate(){

        $id = trim(strip_tags(Request::post('taskId')));
        if(!$id) return false;

        $text = trim(preg_replace(self::$scriptTagRemovePattern, '', Request::post('text')));
        $status = Request::post('status') == 'on'? 1: 0;

        $data = [
            'id' => $id,
            'text' => $text,
            'status' => $status
        ];

        return $data;

    }

}