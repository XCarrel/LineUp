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

/* Get all the data from the two tables Countries and Genders */
$countries = Country::All();
$genders = Genders::All();

/* Load data from id  */
$artist = new Artist();
$artist->load($artistId);


require_once ("sources/view/editView.html");

?>