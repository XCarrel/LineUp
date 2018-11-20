<?php
/**
 * User: Alexandre Junod
 * Date: 12.11.18
 * Utility: Get all genders
 */

require_once ("sources/model/Gender.php");

error_log(print_r($_POST,1));

if(isset($_POST['cmdNewGender'])) //Create a new gender
{
   $InputGender = $_POST['InputGender']; //Take the value of "InputGender"
   $gender = new Gender();
   $gender->setName($InputGender);
   $gender->create();
}

if(isset($_POST['cmdDelGender'])) //Delete all the genders selected
{
   foreach ($_POST['rbtGender'] as $SelectedOption) //Delete the genders selected one and delete them
   {
      $gender = new Gender();
      $gender->setId($SelectedOption);
      $gender->destroy();
   }
}

if(isset($_POST['cmdRenameGender'])) //Rename the gender selected
{
   $RenameGender = $_POST['RenameGender']; //Take the value of "InputGender"
   foreach ($_POST['rbtGender'] as $SelectedOption) //Select the gender who is checked
   {
      $gender = new Gender();
      $gender->setId($SelectedOption);
      $gender->setName($RenameGender);
      $gender->store();
   }
}

$genders = Gender::All();
require_once ("sources/view/AdministrationView.html"); //Call the page with the view
?>
