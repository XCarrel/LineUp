<?php
/**
 * Created by PhpStorm.
 * User: David.NIEMBRO
 * Date: 11.09.2018
 * Time: 13:33
 */


require_once ("sources/model/artists.php");

$artists = getArtists();
foreach ($artists as $artist)
    if ($artist->getId() == $_GET['id'])
        break;
//$artist = getArtistsByID($_GET['id']);

require_once ("sources/view/previewView.html");

?>