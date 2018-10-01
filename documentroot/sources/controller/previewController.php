<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 24.09.2018
 * Time: 13:59
 */
require_once ("sources/model/artists.php");

foreach (getArtists() as $artist){
    if($artist['id'] == $artistid) {
        break;
    }
}

require_once ("sources/view/previewView.html");