<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 10.09.2018
 * Time: 15:53
 */

require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");
require_once ("sources/model/Country.php");


$actualArtist = new Artist();
$actualArtist->load($artistId);

$gender = new Gender();
$country = new Country();

$backToPage = "?page=preview&id=" . $artistId;

require_once ("sources/view/editView.html");

