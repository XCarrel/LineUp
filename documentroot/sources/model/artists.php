<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */

require_once('artist.php');
require_once('performance.php');
require_once('coordinate.php');
require_once('scene.php');
require_once ('VIPContract.php');
require_once ('StandardContract.php');

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

    $stmt = $pdo->prepare('select Artists.id,Artists.Name as artistName, Artists.Description as artistDesc,Genders.Name as artistGender, Countries.Name as artistCountry,Artists.Mainpicture as artistPicture, Contracts.id as Contract_id, Contracts.signedOn, Contracts.description as ContractDesc, Contracts.fee, Contracts.restaurant, Contracts.car, Contracts.nbMeals from Artists INNER JOIN Genders ON Artists.Gender_id = Genders.id INNER JOIN Countries ON Artists.Country_id = Countries.id left join Contracts on Artists.Contract_id = Contracts.id ');
    $stmt->execute();
    $artists = $stmt->fetchAll();

    foreach($artists as $key=> $artist){
      $newArtist = new artist($artist['id'],$artist['artistName'],$artist['artistDesc'],$artist['artistGender'],$artist['artistCountry'],$artist['artistPicture']);
      $newArtist->setPerformances(getArtistPerf($newArtist->getId()));

        if($artist['Contract_id'] != NULL) {
            if ($artist['nbMeals'] != NULL) {
                $contractObj = new StandardContract($artist['ContractDesc'], $artist['fee'], $artist['nbMeals']);
            } else {
                $contractObj = new VIPContract($artist['ContractDesc'], $artist['fee'], $artist['restaurant'], $artist['car']);
            }
            $newArtist->setContract($contractObj);
        }
      $artistsObjs[] = $newArtist;
    }
    return $artistsObjs;
}

function getArtistPerf($idArtist){
    $pdo = connectDatabase();

    $stmt = $pdo->prepare('SELECT Date_time as dateTime, Duration as duration, Scenes.Name as sceneName, Scenes.Localisation as localisation FROM PerformanceDates INNER JOIN Scenes ON Scenes.id = PerformanceDates.Scene_id WHERE PerformanceDates.Artist_id = :idartist;');
    $stmt->execute(['idartist' =>$idArtist]);
    foreach ($stmt->fetchAll() as $perf)
    {
        $coos = preg_split("/;/",$perf['localisation']);
        $coobj = new coordinate(floatval($coos[0]),floatval($coos[1]));
        $sceneobj = new scene($perf['sceneName'],$coobj);
        $perfObj = new performance(new DateTime($perf['dateTime']),$perf['duration'],$sceneobj);
        $perfs[] = $perfObj;
    }
    return $perfs;
}

function getScenes(){

}

?>