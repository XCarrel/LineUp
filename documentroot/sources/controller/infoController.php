<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 10.09.2018
 * Time: 14:08
 */
require_once ("sources/model/artists.php");

$artistId = $_GET['id'];

// find the artist
foreach (getArtists() as $artist)
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

require_once ("sources/view/infoView.html");

?>