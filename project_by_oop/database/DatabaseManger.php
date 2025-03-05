<?php

namespace Database ;
use PDO ;
use Throwable;

class DatabaseManger{
    private static ?PDO $conn = null ;
    private static array $config ;

    private static function loadConfig(){
        if(!isset(self::$config)){
            self::$config = require "../confg/database.php";
        }
    }

    private static function connect($useDb = null){
        self::loadConfig();
        try {
            $dsn ="mysql:host". self::$config['host'];
            if($useDb){
                $dsn .= ";dbname=" . self::$config['dbname'];
            }
            self::$conn = new PDO($dsn , self::$config['username'] ,self::$config['password']);
            self::$conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        } catch (Throwable $th) {
            //throw $th;
        }
    }

    private static function databaseExists(): bool{
        self::connect();
        $sql = self::$conn->prepare("SELECT SCHEMA_NAME FROM information_schema.SCHEMATA WHERE SCHEMA_NAME = :dbname");
        $sql->execute([':dbname' => self::$config['dbname']]);
        return $sql->fetchColumn() !== false ;
    }

    private static function createDatabase()
    {
        if(!self::databaseExists()){
            // create database
            self::$conn->exec("CREATE DATABASE " . self::$config['dbname']);
        }
    }

    public static function getDatabase() : PDO
    {
        return self::$conn ;
    }
    public static function initialize() {
        self::connect();
        self::createDatabase();
        self::connect(true);
    }
}