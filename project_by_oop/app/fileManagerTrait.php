<?php

namespace App;

trait fileManagerTrait
{

    protected function uploadFile($file, $dir = "../public/assets/image/")
    {
        $filePath = $dir . $file['name'];

        if (move_uploaded_file($file['tmp_name'], $filePath)) {
            return str_replace("../public/","",$filePath);
        }

        return null;
    }
}
