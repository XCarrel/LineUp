<?php
/**
 * Created by PhpStorm.
 * User: David.NIEMBRO
 * Date: 11.09.2018
 * Time: 13:33
 */


require_once ("sources/model/artists.php");

$artist = getArtistsByID($_GET['id']);

require_once ("sources/view/previewView.html");

?>