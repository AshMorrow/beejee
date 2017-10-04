<?php

namespace Lib;


abstract class Image
{
    public static function create($id, $image){

        list($type, $image) = explode(';', $image);
        list(, $image)      = explode(',', $image);
        $image = base64_decode($image);
        $imageDetails = getimagesizefromstring($image);

        if($imageDetails[0] > 320 || $imageDetails[1] > 240 || $imageDetails['mime'] != 'image/png'){
            return false;
        }

        file_put_contents(DIR_UPLOADS. $id . '.png', $image);

    }

}