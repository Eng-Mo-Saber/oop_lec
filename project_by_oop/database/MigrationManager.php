<?php

namespace Database ;

class MigrationManager{
    static function getMigration(){
        $files =glob(__DIR__ . "/migrations/*.php");
        sort($files );

        $migration = [];
        foreach($files as $file){
            $fileName = basename($file , ".php"); 
            $migration[]= $fileName;
        }
        return $migration ;
    }
}