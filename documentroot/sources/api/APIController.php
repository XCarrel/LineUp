<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 28.10.18
 * Time: 11:53
 */

extract ($_POST); // $artistid, $description, $countryid, $genderid ||||||||$action $genderName $genderOldName $genderNewName

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
else if(isset($_POST['genderName']))
{
    $gender = new Gender();
    $gender -> setName($genderName);
    $gender -> create();
}
else if(isset($_POST['genderNewName']))
{
    
}



?>
