<?php
require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");

$artist = new Artist();
$artist->load($artistId);
$genders = Gender::All();
require_once ("sources/view/editView.html");
?>
