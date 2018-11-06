<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 30.10.2018
 * Time: 13:38
 */

require_once ("sources/model/Country.php");
require_once ("sources/model/Artist.php");
require_once ("sources/model/Genders.php");


$countries = Country::All();
$genders = Genders::All();

$artist = new Artist();
$artist->load($artistId);


require_once ("sources/view/editView.html");

?>