<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 01.10.2018
 * Time: 14:52
 */

require_once ("sources/model/Artist.php");

$artist = new Artist();
$artist->load($artistId);

require_once ("sources/view/previewView.html");
?>