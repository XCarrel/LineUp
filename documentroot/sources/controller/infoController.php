<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 10.09.2018
 * Time: 14:08
 */
require_once ("sources/model/artists.php");

$artists = getArtists();

foreach ($artists as $artist) {
    if ($artist['id'] == $_GET["artistID"]) {
        $artistID = $artist;
    } else {
    }
}
require_once ("sources/view/infoView.html");

?>