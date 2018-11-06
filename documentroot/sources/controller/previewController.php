<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Artist.php");

$artist = new Artist();
$artist->load($artistId);

require_once ("sources/view/previewView.html");

?>