<?php
/**
 * User: Alexandre Junod
 * Date: 12.11.18
 * Utility: Get all genders
 */

require_once ("sources/model/Gender.php");

if(isset($_POST['cmdNewGender'])) //Create a new gender
{
   $InputGender = $_POST['InputGender']; //Take the value of "InputGender"
   $gender = new Gender();
   $gender->setName($InputGender);
   $gender->create();
}

if(isset($_POST['cmdDelGender'])) //Delete a gender
{

   $GenderToDel = $_POST['cmdDelGender']; //Take the id stored on "cmdDelGender"
   $gender = new Gender();
   $gender->setId($GenderToDel);
   $gender->destroy();
}

$genders = Gender::All();
require_once ("sources/view/AdministrationView.html"); //Call the page with the view
?>
