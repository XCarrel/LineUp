<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 05.11.2018
 * Time: 15:33
 */

require_once ("sources/model/Artist.php");

$artist = new Artist();
$artist->setId($_POST['id']);
$artist->setName($_POST['Name']);
$artist->setDescription($_POST['Description']);
$artist->setGenderId($_POST['Gender_id']);
$artist->setCountryId($_POST['Country_id']);
$artist->setContractId($_POST['Contract_id']);
$artist->setPicture($_POST['Mainpicture']);
$artist->store();

?>