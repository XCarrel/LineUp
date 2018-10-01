<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */
require_once "Artist.php";
require_once "Performance.php";

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
   $req = $pdo->prepare('SELECT Artists.id, Artists.Name as name, Artists.Description as
      description, Countries.Name as country, Genders.Name as kind, Artists.Mainpicture as
      mainpicture FROM lineup.Artists
      INNER JOIN Genders ON Artists.Gender_id = Genders.id
      INNER JOIN Countries ON Artists.Country_id = Countries.id');
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

      foreach ($performances as $key => $performance)
      {
         $datetime = $performance['datetime'];
         $scene = $performance['scene'];
      }
      $p = new Performance($datetime, $scene);
      $a = new Artist($artist['id'], $artist['name'], $artist['description'], $artist['kind'], $artist['country'], $artist['mainpicture'], 'contrat', $p);
      $artistsObjects[]=$a;
   }
   error_log(print_r($a, 1));
   return $artistsObjects;
}

?>
