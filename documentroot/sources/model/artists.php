<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */

require_once('artist.php');
require_once('performance.php');

function connectDatabase(){
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
        return $pdo;
    } catch (\PDOException $e) {
        throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

}

function getArtists()
{
    $pdo = connectDatabase();

    $stmt = $pdo->prepare('SELECT Artists.id,Artists.Name as artistName, Artists.Description as artistDesc,Genders.Name as artistGender, Countries.Name as artistCountry,Artists.Mainpicture as artistPicture FROM Artists INNER JOIN Genders ON Artists.Gender_id = Genders.id INNER JOIN Countries ON Artists.Country_id = Countries.id;');
    $stmt->execute();
    $artists = $stmt->fetchAll();

    foreach($artists as $key=> $artist){
      $newArtist = new artist($artist['id'],$artist['artistName'],$artist['artistDesc'],$artist['artistGender'],$artist['artistCountry'],$artist['artistPicture']);
    }
    error_log(print_r($newArtist,1));
}

function getArtistPerf(){
    $pdo = connectDatabase();

    $stmt = $pdo->prepare('SELECT Date_time as dateTime, Duration as duration, Scenes.Name as sceneName FROM PerformanceDates INNER JOIN Scenes ON Scenes.id = PerformanceDates.Scene_id;');
    $stmt->execute();
    $perfs = $stmt->fetchAll();

    foreach($perfs as $key=>$perf){
        $newPerf = new performance($perf['dateTime'],$perf['duration'],$perf['sceneName']);
        error_log(print_r($newPerf,1));
    }
}

function getScenes(){

}

?>