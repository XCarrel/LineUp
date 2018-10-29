<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 10.09.2018
 * Time: 14:08
 */
require_once ("/sources/model/Artist.php");


$artist = new Artist();
$artist->load($artistId);

require_once ("/sources/view/infoView.html");

?>