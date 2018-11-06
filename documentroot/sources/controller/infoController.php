<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/artists.php");

$artists = getArtists();
foreach ($artists as $artist)
    if ($artist->getId() == $_GET['id'])
        break;
//$artist = getArtistsByID($_GET['id']);

require_once ("sources/view/infoView.html");

?>