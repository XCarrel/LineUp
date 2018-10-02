<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */


require_once "Artist.php";
require_once "Performance.php";

require_once("database.php"); // for db connection

// Returns the whole lineup as an array of associative arrays
function getArtists()
{
    $pdo = dbConnection();

    $stmt = $pdo->prepare(
        'select Artists.id, Artists.Name as name, Mainpicture as mainpicture, Description as description, G.Name as kind, C.Name as country 
         from Artists inner join Countries C on Artists.Country_id = C.id inner join Genders G on Artists.Gender_id = G.id');
    $stmt->execute();
    $artists = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($artists as $key => $artist)
    {
        $artistObj = new Artist($artist['id'],$artist['name'],$artist['description'],$artist['kind'],$artist['country'],$artist['mainpicture']);
        $perfs = null; // because we reuse the variable in the loop
        foreach (getArtistPerformances($pdo,$artistObj->getId()) as $perf)
            $perfs[] = new Performance($perf['datetime'],$perf['duration'],$perf['scene']);
        $artistObj->setPerformances($perfs);
        $artistObjs[] = $artistObj;
    }
    return $artistObjs;
}

// Returns the list of performances of a given artist
// db connection is passed a parameter in order to avoid reconnecting (dependency injection)
function getArtistPerformances($pdo,$aid)
{
    $stmt = $pdo->prepare(
        'select Date_time as datetime, Duration as duration, S.Name as scene
        from PerformanceDates inner join Scenes S on PerformanceDates.Scene_id = S.id
        where Artist_id = :aid;');
    $stmt->execute(['aid' => $aid]);
    $perfs = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $perfs;
}

?>