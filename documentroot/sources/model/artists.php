<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */

function getArtists()
{
    $host = 'localhost';
    $db   = 'lineup';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
        $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    $stmt = $pdo->prepare('SELECT Artists.id,Artists.Name as artistName, Artists.Description as artistDesc,Genders.Name as artistGender, Countries.Name as artistCountry,Artists.Mainpicture as artistPicture FROM Artists INNER JOIN Genders ON Artists.Gender_id = Genders.id INNER JOIN Countries ON Artists.Country_id = Countries.id;');
    $stmt->execute();
    $artists = $stmt->fetchAll();
    return $artists;
}

function getArtistPerf($artistid){
    $artists = getArtists();

    foreach($artists as $key=> $artistid){

    }
}

?>