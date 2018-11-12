<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 10.09.2018
 * Time: 15:53
 */

require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");
require_once ("sources/model/Country.php");


extract ($_POST); // $artistid, $description, $countryid, $genderid, $typeRequest

var_dump($_POST);


switch($typeRequest){
    case 'changeArtist':
        $artist = new Artist();
        $artist->load($artistid);
        $artist->setDescription($description);
        $artist->setCountryId($countryid);
        $artist->setGenderId($genderid);
        $artist->store();
        break;
    case 'changeGender':

        break;
}






