<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 10.09.2018
 * Time: 15:53
 */

require_once ("sources/model/Artist.php");

$actualArtist = new Artist();
$actualArtist->load($artistId);

require_once ("sources/view/editView.html");

