<?php
//Controller to save the data on the DB
extract ($_POST); //$InputGender

require_once ("sources/model/Gender.php");

$gender = new Gender();
$gender->create($InputGender); //Create a new gender
$gender->setName($InputGender)
$gender->store();
?>
