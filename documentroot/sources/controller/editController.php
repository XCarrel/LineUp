<?php
require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");
require_once ("sources/model/Country.php");

$artist = new Artist();
$artist->load($artistId);
$genders = Gender::All();
$countries = Country::All();
require_once ("sources/view/editView.html");
?>
