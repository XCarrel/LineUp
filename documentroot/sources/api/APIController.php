<?php
/**
 * Created by ATOM.
 * User: Jarod
 * Date: 20.11.2018
 * Time: 10:33
 */

extract ($_POST); // $artistid, $description, $countryid, $genderid ||||||||$action $genderName $genderOldName $genderNewName $gendersid[]

require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");
if(isset($_POST['artistid']))
{
    $artist = new Artist();
    $artist->load($artistid);
    $artist->setDescription($description);
    $artist->setCountryId($countryid);
    $artist->setGenderId($genderid);
    $artist->store();
}
else if($_POST['action'] == "add")
{
    $gender = new Gender();
    $gender -> setName($genderName);
    $gender -> create();
}
else if($_POST['action'] =="rename")
{
    $gender = new Gender();
    $gender->load($genderid);
    $gender->setName($genderNewName);
    $gender->store();
}
else if($_POST['action'] == "remove")
{
    foreach ($gendersid as $genderid)
    {
       $gender = new Gender();
       $gender->load($genderid);
       $gender->destroy();
   }
}



?>
