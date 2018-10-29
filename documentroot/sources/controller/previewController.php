<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: Senistan.JEGARAJASIN
 * Date: 24.09.2018
 * Time: 13:59
 */
require_once ("sources/model/artists.php");

foreach (getArtists() as $artist){
    if($artist->getId() == $artistid) {
        break;
    }
}

require_once ("sources/view/previewView.html");
=======
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Artist.php");

$artist = new Artist();
$artist->load($artistId);

require_once ("sources/view/previewView.html");

?>
>>>>>>> master
