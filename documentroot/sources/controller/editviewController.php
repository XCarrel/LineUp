<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Artist.php");
require_once ("sources/model/Database.php");

$artist = new Artist();
$artist->load($artistId);
$genders = Database::getAllGender();
$countries = Database::getAllCountries();


require_once ("sources/view/editView.html");

?>