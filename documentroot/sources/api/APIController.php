<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 28.10.18
 * Time: 11:53
 */

extract ($_POST); // $artistid, $description, $countryid, $genderid

require_once ("sources/model/Artist.php");

$artist = new Artist();
$artist->load($artistid);
$artist->setDescription($description);
$artist->setCountryId($countryid);
$artist->setGenderId($genderid);
$artist->store();

?>

