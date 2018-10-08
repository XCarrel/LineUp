<?php

require_once "Artist.php";
require_once "Scene.php";
require_once "Performance.php";
require_once "Contract.php";
require_once "VIPContract.php";
require_once "StandardContract.php";

function connection()
{
    $host = 'localhost';
    $db = 'lineup';
    $user = 'root';
    $pass = 'root';
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
    $pdo = connection();

    $stmt = $pdo->prepare('   SELECT Artists.id, Artists.Name AS name, Artists.Description AS description, Artists.Mainpicture as imageurl, Genders.Name AS kind, Countries.Name AS country
                                        FROM Artists
                                        INNER JOIN Genders ON Artists.Gender_id = Genders.id
                                        INNER JOIN Countries ON Artists.Country_id = Countries.id;');
    $stmt->execute();

    $artistsArray = $stmt->fetchAll();
    $artists = null;

    foreach ($artistsArray as $key => $artistArray) {

        $stmt = $pdo->prepare('SELECT PerformanceDates.Date_time, 
                                             PerformanceDates.Duration, Scenes.Name as Scene_name, 
                                             Scenes.Localisation
                                                FROM PerformanceDates
                                                INNER JOIN Scenes ON Scenes.id = Scene_id
                                                WHERE Artist_id = :artist_id');

        $stmt->execute(["artist_id" => $artistArray['id']]);
        $performancesAndScenesArray = $stmt->fetchAll();

        $performances = array();
        foreach ($performancesAndScenesArray as $key => $performanceAndSceneArray) {
            $scene = new Scene($performanceAndSceneArray["Scene_name"], $performanceAndSceneArray["Localisation"]);
            $performances[] = new Performance(new DateTime($performanceAndSceneArray["Date_time"]), $performanceAndSceneArray["Duration"], $scene);
        }
//        SELECT Artists . Name, Artists . Contract_id, Contracts . description, Contracts . fee FROM Artists
//LEFT JOIN Contracts on Artists . Contract_id = Contracts . id
        $stmt = $pdo->prepare('SELECT Artists.Name, Artists.Contract_id, Contracts.*
                                         FROM Artists
                                         LEFT JOIN Contracts on Artists.Contract_id = Contracts.id
                                         WHERE Artists.id = :artist_id');

        $stmt->execute(["artist_id" => $artistArray['id']]);
        $contractArray = $stmt->fetchAll();

        $contract = null;
        echo print_r($contractArray) . '<br /><br />';
        echo print_r($contractArray["contract_type"]) . '<br /><br />';
//        if ($contractArray["contract_type"] == 1) { // VIPContract
//            echo 'contract_type === 1';
//            $contract = new VIPContract($contractArray["description"], $contractArray["fee"], $contractArray["restaurant"], $contractArray["car"]);
//        } else if ($contractArray["contract_type"] == 2 OR is_null($contractArray["contract_type"])) { // StandardContract
//            echo 'contract_type === 2';
//            $contract = new StandardContract($contractArray["description"], $contractArray["fee"], $contractArray["nbMeals"]);
//        } else {
//            var_dump("Contract not taken in consideration yet!");
//        }

        $artist = new Artist($artistArray["id"], $artistArray["name"], $artistArray["kind"], $artistArray["kind"], $artistArray["country"], $artistArray["imageurl"], $contract, $performances);
        $artists[] = $artist;
    }

    return $artists;
}

function getContract($id)
{
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

function getActualLanguage()
{
    return "french";
}

function getKeyTranslationToSpecificLanguage($language)
{

    switch ($language) {
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

function pathToImages()
{
    return "../../assets/images/";
}

function pathToExternalData()
{
    return "datastorage/";
}

function pathToArtistsImages()
{
    return pathToExternalData() . "pictures/";
}

