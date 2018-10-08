<?php

require_once "Artist.php";
require_once "Performance.php";

function connection(){
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

    return $pdo;
}

function getArtists()
{
    $pdo = connection();

    $stmt = $pdo->prepare('   SELECT Artists.id, Artists.Name AS name, Artists.Description AS description, Artists.Mainpicture as imageurl, Genders.Name AS kind, Countries.Name AS country
                                        FROM Artists
                                        INNER JOIN Genders ON Artists.Gender_id = Genders.id
                                        INNER JOIN Countries ON Artists.Country_id = Countries.id;');
    $stmt->execute();

    $artistsArray = $stmt->fetchAll();

    //echo 'ArtistsArray: <br />';
//    var_dump($artistsArray);
//    $artists = array();
    foreach($artistsArray as $key => $artistArray){
        //var_dump($artistArray);

        $stmt = $pdo->prepare('SELECT Date_time,Scenes.Name as Scene_name, Duration
                                        FROM PerformanceDates
                                        INNER JOIN Scenes ON Scenes.id = Scene_id
                                        WHERE Artist_id = :artist_id');

        $stmt->execute(["artist_id" => $artistArray['id']]);
        $performancesArray = $stmt->fetchAll();

        $performances = array();
        foreach($performancesArray as $key => $performanceArray) {
            $performances[] = new Performance($performanceArray["Date_time"], $performanceArray["Duration"], null);
        }



        $artist = new Artist($artistArray["id"], $artistArray["name"], $artistArray["kind"], $artistArray["kind"], $artistArray["country"], $artistArray["imageurl"], null, $performances);
        $artists[] = $artist;
    }

    return $artists;
}

function getContract($id){
    $pdo = connection();

    $stmt = $pdo->prepare('SELECT Name, Contract_id
                                     FROM Artists
                                      LEFT JOIN Contracts ON Artists.Contract_id = Contracts.id');
    $stmt->execute();

    $artistsArray = $stmt->fetchAll();

}

/*
function getPerformancesDatesForArtistId($id){
    $pdo = connection();

    $stmt = $pdo->prepare('SELECT * FROM Performance WHERE Performance.Artist_id = :artist_id;');
    $stmt->execute(["artist_id" => $id]);
    $performances = $stmt->fetchAll();
    print_r($performances);
    return $performances;
}*/

function getActualLanguage(){
    return "french";
}

function getKeyTranslationToSpecificLanguage($language){

    switch($language) {
        case 'french':
        default:
            return ["id" => "",
                "name" => "Nom",
                "kind" => "Genre",
                "country" => "Pays",
                "description" => "Description",
                "imageurl" => "Image"];
            break;
    }
}

function pathToImages(){
    return "../../assets/images/";
}

function pathToExternalData(){
    return "datastorage/";
}

function pathToArtistsImages(){
    return pathToExternalData() . "pictures/";
}

