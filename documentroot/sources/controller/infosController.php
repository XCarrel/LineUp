<?php

require_once ("sources/model/artists.php");

foreach (getArtists() as $artist)
{
    if($artist->getId() == $artistid)
    {
        break;
    }
}

if($artist->getContract())
{
    if(get_class($artist->getContract()) == 'VIPContract')
    {
        $contract = "VIP";
    }
    else
    {
        $contract = "Standard";
    }
}
else
{
    $contract = 'Aucun';
}

require_once ("sources/view/infosView.html");

?>
