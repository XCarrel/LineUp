<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */
require_once("Fonctions.php");
require_once("database.php");

function getArtists()
{
    $pdo = connexion();

    $stmt = $pdo->prepare(
        'select Artists.id as id, Artists.Name as name, Mainpicture as picture, Description as description, G.Name as kind, C.Name as country 
         from Artists inner join Countries C on Artists.Country_id = C.id inner join Genders G on Artists.Gender_id = G.id');
    $stmt->execute();
    $artistsFromDB = $stmt->fetchAll();

    $rules = [
        "fields" => [
            0 =>["name"=>'id', 'function'=>'setId'],
            1 =>["name"=>'name', 'function'=>'setName'],
            2 =>["name"=>'description', 'function'=>'setDescription'],
            3 =>["name"=>'kind', 'function'=>'setKind'],
            4 =>["name"=>'country', 'function'=>'setCountry'],
            5 =>["name"=>'picture', 'function'=>'setPicture']

        ]
    ];

    $artists = hydrate("Artist", $artistsFromDB, $rules);
    foreach($artists as $key=> $artist){    
        $Performance = getPerformance($pdo,$artist->getId());
        $artist->setPerformance($Performance);
    }
    return $artists;
   }

function getPerformance($pdo, $id)
{
    $stmt = $pdo->prepare('select Date_time as datetime, Duration as duration, S.Name as scene 
    from PerformanceDates inner join Scenes S on PerformanceDates.Scene_id = S.id where Artist_id = :id;');
    $stmt->execute(['id' => $id]);
    $performancesFromDB = $stmt->fetchALL();

    $rules = [
        "fields" => [
            0 =>["name"=>'datetime', 'function'=>'setDatetime'],
            1 =>["name"=>'duration', 'function'=>'setDuration'],
            2 =>["name"=>'scene', 'function'=>'setScene'],
        ]
    ];

    $performances = hydrate("Performance", $performancesFromDB, $rules);
    return $performances;
}
?>