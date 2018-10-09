<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */
require_once "Artist.php";
require_once "Performance.php";
require_once "VIPContract.php";
require_once "StandardContract.php";

function connectdb(){
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
   $pdo = connectdb();
   $req = $pdo->prepare('SELECT Artists.id, Artists.Name AS name, Mainpicture AS mainpicture, Artists.Description AS description, G.Name AS kind, C.Name AS country,Con.id AS Contact_id, Con.signedOn,Con.description AS descContrat, Con.fee , Con.car, Con.restaurant , Con.nbMeals from Artists
   INNER JOIN Countries C ON Artists.Country_id = C.id
   INNER JOIN Genders G ON Artists.Gender_id = G.id LEFT JOIN  Contracts Con ON Artists.Contract_id = Con.id');
   $req->execute();
   $artists = $req->fetchAll();

   foreach($artists as $key => $artist)
   {
      $req = $pdo->prepare('select perf.id, perf.Date_time as datetime, s.Name as scene
         from PerformanceDates as perf
         inner join Scenes as s on Scene_id = s.id
         where :artist_id = Artist_id;');
      $req->execute(['artist_id' => $artist['id']]);
      $performances = $req->fetchAll();
      $artists[$key]['performances'] = $performances;

      $performanceObjects = NULL;
      foreach ($performances as $key => $performance)
      {
         $p = new Performance($performance['datetime'], $performance['scene']);
      }

      $a = new Artist($artist['id'], $artist['name'], $artist['description'], $artist['kind'], $artist['country'], $artist['mainpicture'], 'contrat', $p);
      if($artist['nbMeals'] == NULL)
      {
         $c = new VIPContract($artist['signedOn'], $artist['description'], $artist['fee'], $artist['restaurant'], $artist['car']);
      }
      else
      {
         $c = new StandardContract($artist['signedOn'], $artist['description'], $artist['fee'], $artist['nbMeals']);
      }

      $artistsObjects[]=$a;
      $performanceObjects[]=$p;
      $a->setPerformances($performanceObjects);
      $a->setContract($c);
   }
   error_log(print_r($a, 1));
   return $artistsObjects;
}
?>
