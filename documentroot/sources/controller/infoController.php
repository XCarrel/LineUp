<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/artists.php");

$artist = getArtistsByID($_GET['id']);

require_once ("sources/view/infoView.html");

?>