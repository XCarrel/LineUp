<?php
require_once ("sources/model/Artist.php");
$artist = new Artist();

if($_POST['id'])
{
   $artist->load($_POST['id']);
   $artist->setGenderId($_POST['gender']);
   $artist->setCountryId($_POST['country']);
   $artist->setDescription($_POST['description']);
   $artist->store();
}
?>
