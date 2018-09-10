<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:41
 */

require_once ("sources/model/artists.php");

foreach (getArtists() as $artist)
{
    if($artist['id'] == $artistid)
        break;
}

require_once ("sources/view/infosView.html");

?>