<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/artists.php");

// find the artist
foreach (getArtists() as $artist)
    if ($artist->getId() == $artistId)
        break;

require_once ("sources/view/previewView.html");

?>