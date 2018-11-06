<?php
/**
 * Created by PhpStorm.
 * User: David Niembro
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Artist.php");

$artist = new Artist();
$artist->load($artistId);
//$artist = getArtistsByID($_GET['id']);

require_once ("sources/view/infoView.html");

?>