<?php
require_once "vendor/autoload.php";
$dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

function connexion(){
    $host = getenv("SERVER");
    $db = getenv("DB");
    $user = getenv("USER");
    $pass = getenv("PASSWORD");
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
    return $pdo;
}
