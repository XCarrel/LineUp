<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 10.09.2018
 * Time: 13:55
 */

require_once ("sources/model/artists.php");

foreach (getArtists() as $artist){
    if($artist->getId() == $artistid) {
        break;
    }
}

require_once ("sources/view/artistview.html");

?>