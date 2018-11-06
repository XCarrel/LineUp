<?php
require_once "vendor/autoload.php";
//$dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT']);
//$dotenv->load();

class Database {
    static function dbConnection()
    {
         /*$host = getenv("SERVER");
        $db = getenv("DB");
        $user = getenv("USER");
        $pass = getenv("PASSWORD");*/
        $host = "127.0.0.1";
        $db = "lineup";
        $user = "root";
        $pass = "root";
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }
}