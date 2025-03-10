<?php

namespace Database;

class MigrationManager
{
    static function getMigration()
    {
        $files = glob(__DIR__ . "/migrations/*.php");
        sort($files);

        $migration = [];
        foreach ($files as $file) {
            $fileName = basename($file, ".php");
            $migration[] = $fileName;
        }
        return $migration;
    }

    public static function runMigrations()
    {
        // Get connection
        $conn = DatabaseManger::getConnection();
        // Get migrations
        $migrations = self::getMigration();

        foreach ($migrations as $migration) {
            require_once __DIR__ . "/migrations/{$migration}.php";
            //remove numbers
            $text = preg_replace("/^\d+/", "", $migration);
            //remove _
            $newText = str_replace("_", " ", $text);
            $newText = ucwords($newText);
            $className = str_replace(" ", "", $newText);

            if (class_exists($className)) {
                (new $className())->up($conn);
            }
        }
    }
}
