<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 05.11.2018
 * Time: 15:33
 */

require_once ("sources/model/Artist.php");
require_once ("sources/model/Genders.php");

/** Edit the table Artist with POST data */
$artist = new Artist();
$artist->setId($_POST['id']);
$artist->setName($_POST['Name']);
$artist->setDescription($_POST['Description']);
$artist->setGenderId($_POST['Gender_id']);
$artist->setCountryId($_POST['Country_id']);
$artist->setContractId($_POST['Contract_id']);
$artist->setPicture($_POST['Mainpicture']);
$artist->store();

/** Create a new record in the Genders table */
$gender = new Genders();
$gender->setName($_POST['gender']);
$gender->create();


/** Get data via POST method and delete records from table */
foreach($_POST['gender_id'] as $gender_id) {
    $gender_delete = new Genders();
    $gender_delete->load($gender_id);
    $gender_delete->destroy();
}

/** Get the data via POST method and update name in Genders table */
$gender_update = new Genders();
$gender_update->setName($_POST['gender_name']);
$gender_update->load($_POST['gender_id_update']);
$gender_update->store();
?>