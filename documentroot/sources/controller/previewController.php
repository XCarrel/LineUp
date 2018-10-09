<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 10.09.2018
 * Time: 15:53
 */

require_once ("sources/model/artists.php");

$artists = getArtists();
$actualArtist = $artists[$artistId-1];

require_once ("sources/view/previewView.html");
