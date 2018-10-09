<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */


require_once "Artist.php";
require_once "Performance.php";
require_once "Coordinate.php";
require_once "Scene.php";
require_once "Contract.php";
require_once "VIPContract.php";
require_once "StandardContract.php";
require_once "Database.php"; // for db connection

class ArtistProvider
{

    // Returns the whole lineup as an array of associative arrays
    static function getArtists()
    {
        $pdo = Database::dbConnection();

        $stmt = $pdo->prepare(
            'select 
              Artists.id, 
              Artists.Name as name, 
              Artists.Mainpicture as mainpicture, 
              Artists.Description as description, 
              Genders.Name as kind, 
              Countries.Name as country,
              Contracts.signedOn,
              Contracts.description as contracttext,
              Contracts.fee,
              Contracts.restaurant,
              Contracts.car,
              Contracts.nbMeals
            from 
              Artists inner join 
              Countries on Artists.Country_id = Countries.id inner join 
              Genders on Artists.Gender_id = Genders.id left join
              Contracts on Artists.Contract_id = Contracts.id');
        $stmt->execute();
        $artists = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($artists as $key => $artist)
        {
            extract($artist); // $id, $name, $mainpicture, $description, $kind, $country, $signeOn, $contracttext, $fee, $restaurant, $car, $nbMeals

            $artistObj = new Artist($id, $name, $description, $kind, $country, $mainpicture);
            $artistObj->setPerformances(self::getArtistPerformances($pdo, $artistObj->getId()));

            unset($contract);
            if (isset($fee)) // there is a contract
                if (isset($car)) // it is a VIP contract
                    $contract = new VIPContract($contracttext, $fee, $restaurant, $car);
                else
                    $contract = new StandardContract($contracttext, $fee, $nbMeals);
            $artistObj->setContract($contract);

            $artistObjs[] = $artistObj;
        }
        print_r($artistObjs,1);
        return $artistObjs;
    }

    // Returns the list of performances of a given artist
    // db connection is passed a parameter in order to avoid reconnecting (dependency injection)
    static function getArtistPerformances($pdo, $aid)
    {
        $stmt = $pdo->prepare(
            'select Date_time as datetime, Duration as duration, S.Name as scene, S.Localisation
        from PerformanceDates inner join Scenes S on PerformanceDates.Scene_id = S.id
        where Artist_id = :aid;');
        $stmt->execute(['aid' => $aid]);
        foreach ($stmt->fetchAll() as $perf)
        {
            $coos = preg_split(";", $perf['Localisation']);
            $coobj = new Coordinate(floatval($coos[0]), floatval($coos[1]));
            $sceneobj = new Scene($perf['scene'], $coobj);
            $perfObj = new Performance(new DateTime($perf['datetime']), $perf['duration'], $sceneobj);
            $perfs[] = $perfObj;
        }
        return $perfs;
    }

}

?>