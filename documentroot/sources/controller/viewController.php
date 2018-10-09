<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/ArtistProvider.php");

// find the artist
foreach (ArtistProvider::getArtists() as $artist)
    if ($artist->getId() == $artistId)
        break;

// Prepare contract type for display
if ($artist->hasContract())
    if (get_class($artist->getContract()) == 'VIPContract')
        $contractType = "VIP";
    else
        $contractType = "Standard";
else
    $contractType = "Aucun";

require_once ("sources/view/viewView.html");

?>