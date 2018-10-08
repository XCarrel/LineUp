<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */

require_once "Artist.php";
require_once "Performances.php";
require_once "VIPContract.php";
require_once "StandardContract.php";

function connectDB()
{
    $host = 'localhost';
    $db   = 'lineup';
    $user = 'root';
    $pass = 'root';
    $charset = 'utf8';

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
    $pdo = connectDB();
    $stmt = $pdo->prepare('SELECT 
                                    a.id as id, 
                                    a.Name as name, 
                                    a.Description as description, 
                                    g.Name as kind, 
                                    c.Name as country, 
                                    a.Mainpicture as image, 
                                    Contract_id as idcontract,
                                    co.description as contratDescription,
                                    co.fee as fee,
                                    co.restaurant as restaurant,
                                    co.car as car,
                                    co.nbMeals as nbMeals
                                    FROM Artists as a 
                                    inner join Genders as g on Gender_id = g.id
                                    inner join Countries as c on Country_id = c.id
                                    left join Contracts as co on co.id = a.contract_id;');
    $stmt->execute();
    $artists = $stmt->fetchAll();
    //error_log(print_r($artists, 1));

    foreach($artists as $key => $artist)
    {
        $artObj = new Artist($artist['id'], $artist['name'], $artist['description'], $artist['kind'], $artist['country'], $artist['image']);

        $stmt = $pdo->prepare('select perf.id, perf.Date_time as datetime, s.Name as scene, Duration as duration 
                                        from PerformanceDates as perf
                                        inner join Scenes as s on Scene_id = s.id
                                        where :artist_id = Artist_id;');
        $stmt->execute(['artist_id' => $artist['id']]);
        $performances = $stmt->fetchAll();

        $perfsObj = null;
        foreach($performances as $key => $performance)
        {
            $perfsObj[] = new Performances($performance['datetime'], $performance['duration'], $performance['scene']);
        }

        $artObj -> setPerformances($perfsObj);

        if($artist['idcontract'] != null)
        {
            if($artist['restaurant'] == null && $artist['car'] == null)
            {
                $contract = new StandardContract($artist['contratDescription'], $artist['fee'], $artist['nbMeals']);
            }
            else
            {
                $contract = new VIPContract($artist['contratDescription'], $artist['fee'], $artist['restaurant'], $artist['car']);
            }
        }
        else
        {
            $contract = null;
        }

        $artObj -> setContract($contract);
        $artsObj[] = $artObj;
    }
    error_log(print_r($artsObj, 1));
    return $artsObj;
}

?>