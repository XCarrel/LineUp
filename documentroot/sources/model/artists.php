<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */
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

function getArtists()
{
    $pdo = connexion();

    $stmt = $pdo->prepare('SELECT * FROM Artists ');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getArtistsByID($id){
    $pdo = connexion();

    $stmt = $pdo->prepare('SELECT * FROM Artists where id = :id ');
    $stmt->execute(['id'=>$id]);
    $artist = $stmt->fetch();

    $performance = getPerformance($id);
    $artist['performance'] = $performance;
    error_log(print_r($artist,1));
    return $artist;
}

function getPerformance($id)
{
    $pdo = connexion();

    $stmt = $pdo->prepare('SELECT * FROM PerformanceDates where Artist_id = :artistID ');
    $stmt->execute(['artistID'=>$id]);
    return $stmt->fetchALL();
}
?>