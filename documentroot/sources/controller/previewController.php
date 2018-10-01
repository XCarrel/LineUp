<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 01.10.2018
 * Time: 14:52
 */

require_once ("sources/model/artists.php");

$artistId = $_GET['id'];

// find the artist
foreach (getArtists() as $artist)
    if ($artist["id"] == $artistId)
        break;

require_once ("sources/view/previewView.html");
?>