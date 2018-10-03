<?php

require_once ("sources/model/artists.php");

foreach (getArtists() as $artist)
{
    if($artist->getId() == $artistid)
    {
        break;
    }
}

require_once ("sources/view/infosView.html");

?>
