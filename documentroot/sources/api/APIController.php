<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 28.10.18
 * Time: 11:53
 */

extract ($_POST); // $artistid, $description, $countryid, $genderid

require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");

error_log((print_r($_POST, true)));

$gender = new Gender();
if($_POST['gender'] != "")
{
    $gender->setName($_POST['gender']);
    $gender->create();
}
else if($_POST['genderDel'] != "")
{
    foreach($_POST['genderDel'] as $genderDel)
    {
        $gender->setId($genderDel);
        $gender->destroy();
    }
}
else if($_POST['id'] != "" && $_POST['genderUpdate'] != "")
{
    $gender->setId($_POST['id']);
    $gender->setName($_POST['genderUpdate']);
    $gender->store();
}

/*
$artist = new Artist();
$artist->load($artistid);
$artist->setDescription($description);
$artist->setCountryId($countryid);
$artist->setGenderId($genderid);
$artist->store();
*/
?>

