<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */
require_once("Fonctions.php");
require_once("database.php");
require_once ("Artist.php");

function getArtists()
{
    $pdo = connexion();
    $stmt = $pdo->prepare('select * from Artists ');
    $stmt->execute();
    $artistsFromDB = $stmt->fetchAll();

    $rules = [
        "fields" => [
            0 =>["name"=>'Name', 'function'=>'setName'],
            1 =>["name"=>'Description', 'function'=>'setDescription']/*'kind','country','Mainpicture','contract'*/]
    ];

    $artists = hydrate("Artist", $artistsFromDB, $rules);

   // var_dump($artists);

    return $artistsFromDB;
   }

function getArtistsByID($id){
    $pdo = connexion();

    $stmt = $pdo->prepare('SELECT * FROM Artists where id = :id ');
    $stmt->execute(['id'=>$id]);
    $artist = $stmt->fetch();

    $performance = getPerformance($pdo,$id);
    $artist['performance'] = $performance;
    //error_log(print_r($artist,1));
    return $artist;
}

function getPerformance($pdo, $id)
{
    $stmt = $pdo->prepare('SELECT * FROM PerformanceDates where Artist_id = :artistID ');
    $stmt->execute(['artistID'=>$id]);
    return $stmt->fetchALL();
}
?>