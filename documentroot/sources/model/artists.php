<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:35
 */

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
   }
   error_log(print_r($artists, 1));
   return $artists;

   /*return [
      [
         "id" => 1,
         "name" => "Kaleo",
         "country" => "Islande",
         "kind" => "Blues Rock",
         "description" => "D’un côté, l’Islande et ses 300'000 habitants. De l’autre, les États-Unis, pays de la démesure. Et entre les deux, Kaleo. Ces quatre amis d’enfance, originaires des environs de Reykjavik, ont plié bagage pour s’installer au Texas. Entre rock, folk et blues, ils puisent dans l’atmosphère mystique des fjords et dans la chaleur moite des déserts. Leur album A/B révèle leur dualité: entre titres racés et ballades gracieuses, leur cœur balance. Mais il faudrait bien plus que deux faces à cet opus pour illustrer la virtuosité du groupe, qui jongle tant avec les riffs rocailleux ou les aurores boréales qu’avec la poussière d’Austin.",
         "mainpicture" => "artists-main-kaleo.jpg"
      ],
      [
         "id" => 2,
         "name" => "Txarango",
         "country" => "Espagne",
         "kind" => "Latino",
         "description" => "Avec quatre continents et quelques vingt-trois pays explorés au compteur, les Catalans de Txarango sont devenus un Village du Monde à eux tous seuls. Leur musique - aux fortes références latino-américaines et festive en diable - pioche ses rythmes et mélodies dans le son de Barcelona, un genre musical héritier de la rumba cubaine, qu'ils fusionnent à volonté avec du reggae, du ska et du punk. Tout en faisant la part belle à la langue catalane, leurs chansons - profondément engagées - se fredonnent, se susurrent, se crient et se dansent à l'unisson, redonnant à la musique son pouvoir le plus magique: celui de changer le monde.",
         "mainpicture" => "artists-main-txarango.jpg"
      ],
      [
         "id" => 3,
         "name" => "Nekfeu",
         "country" => "France",
         "kind" => "Rap",
         "description" => "Ce n'est pas parce qu'il fraie avec Catherine Deneuve que Nekfeu a abandonné son amour de la rime. On verra, Reuf, Egérie… Après avoir enchaîné les tubes, Le Fennek a vu son album Cyborg dépasser en à peine deux semaines les 100 000 exemplaires vendus. Un retour à un rap qui fleure bon les 90's et donne des coups de verbe saillants. Et une preuve réconfortante qu'il est encore possible, à notre époque, de produire un album de rap sans auto-tune. Un succès époustouflant pour ce rappeur technique et virtuose, aussi à l'initiative de l'incontournable label Seine Zoo. Allez Feu, allume la mèche.",
         "mainpicture" => "artists-main-nekfeu.png"
      ]
   ];*/
}

?>
