<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */

require_once ("Artist.php");
require_once ("database.php");




// Returns the whole lineup as an array of associative arrays
function getArtists()
{
    $pdo = connexionPDO();
    $stmt = $pdo->prepare(
        'select Artists.id, Artists.Name as name, Mainpicture as mainpicture, Description as description, G.Name as kind, C.Name as country 
         from Artists inner join Countries C on Artists.Country_id = C.id inner join Genders G on Artists.Gender_id = G.id ORDER BY Artists.id');
    $stmt->execute();
    $artists = $stmt->fetchAll();
    foreach ($artists as $key => $artist)
        $artist = new Artist($artist['name'], $artist['description'], $artist['kind'], $artist['country'], $artist['mainpicture'], null,$artist['performances']);
        print_r(error_log($artist,1));
    return $artists;
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
    return $stmt->fetchAll();
}


?>