<?php
require_once ("sources/model/Artist.php");
$artist = new Artist();

if($_POST['id'])
{
   $artist->load($_POST['id']);
   $artist->setGender($_POST['gender']);
   $artist->setCountry($_POST['country']);
   $artist->setDescription($_POST['description']);
   $artist->store();
}
error_log(print_r($_POST,1));
?>
