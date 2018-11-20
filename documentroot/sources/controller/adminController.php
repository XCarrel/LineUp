<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 12.11.2018
 * Time: 13:41
 */

//Required so we can use Genders anywhere without problems.
require_once "sources/model/Database.php";
require_once "sources/model/iPersistable.php";
require_once "sources/model/Gender.php";

extract ($_POST); // get the variables genders[], $add, $delete, $rename, $newGender, $renameGender


if (isset($add)) // Check if an insert has been initiated
{
    $addGender = new Gender();
    $addGender->setName($newGender);
    $addGender->create();
}

if (isset($delete))
{
    //using the checkbox array to get the id.
    foreach ($genders as $gender)
    {
        error_log($gender,0);
        $deleteGender = new Gender();
        $deleteGender->load($gender);
        $deleteGender->destroy();
    }
}

if (isset($rename))
{
    $updateGender = new Gender();
    $updateGender->load($genders[0]);
    $updateGender->setName($renameGender);
    $updateGender->store();
}

$genders = Gender::All();

require_once ("sources/view/adminView.html");