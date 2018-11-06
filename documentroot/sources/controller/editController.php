<?php
/**
 * Created by PhpStorm.
 * User: David Niembro
 * Date: 11.09.2018
 * Time: 13:33
 */


require_once ("sources/model/Artist.php");
require_once ("sources/model/Country.php");
require_once ("sources/model/Gender.php");


$artist = new Artist();
$artist->load($artistId);
$countries = Country::all();
$genders = Gender::all();
//$artist = getArtistsByID($_GET['id']);

require_once ("sources/view/editView.html");

?>