<?php
/**
 * Created by PhpStorm.
 * User: David Niembro
 * Date: 11.09.2018
 * Time: 13:33
 */


require_once ("sources/model/Artist.php");

$artist = new Artist();
$artist->load($artistId);
//$artist = getArtistsByID($_GET['id']);

require_once ("sources/view/previewView.html");

?>