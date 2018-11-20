<?php
/**
 * Created by PhpStorm.
 * User: Xavier.SCHWAB
 * Date: 20.11.2018
 * Time: 09:15
 */
require_once ("sources/model/Gender.php");


if (isset($_POST["cmdCreateGender"])) {

    $InputGender = $_POST['UpdateGender']; //Take the value of "UpdateGender"
    $gender = new Gender();
    $gender->setName($InputGender);
    $gender->create();

}

else if (isset($_POST["cmdUpdateGender"])) {

    $RenameGender = $_POST['UpdateGender']; //Take the value of "UpdateGender"
    foreach ($_POST['rbtGender'] as $SelectedOption) //Select the gender who is checked
    {
        $gender = new Gender();
        $gender->setId($SelectedOption);
        $gender->setName($RenameGender);
        $gender->store();
    }

}

else if (isset($_POST["cmdDeleteGender"]))
{
    foreach ($_POST['rbtGender'] as $SelectedOption) //Delete the genders selected one and delete them
    {
        $gender = new Gender();
        $gender->setId($SelectedOption);
        $gender->destroy();
    }
}


$genders = Gender::All();
require_once ("sources/view/AdministrationView.html"); //Call the page with the view
