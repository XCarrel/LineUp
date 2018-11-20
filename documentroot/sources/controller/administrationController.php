<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Database.php");
require_once ("sources/model/iPersistable.php");
require_once ("sources/model/Gender.php");

error_log(print_r($_POST, true));
extract($_POST);

if (isset($add)) // New gender inserted
{
    $genderAdd = new Gender();
    $genderAdd->setName($addtext);
    $genderAdd->create();
}
if (isset($delete))
{
    foreach ($genders as $genderID)
    {
        try {
            $genderDelete = new Gender();
            $genderDelete->load($genderID);
            $genderDelete->destroy();
        }
        catch (Exception $ex) {}
    }
}
if (isset($update))
{
    $genderUpdate = new Gender();
    $genderUpdate->setId($genders[0]);
    $genderUpdate->setName($updatetext);
    $genderUpdate->store();
}

// Reprendre tous les genres dans la base de données
$genders = Gender::All();

require_once ("sources/view/administrationView.html");

?>