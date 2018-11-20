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


extract ($_POST); /* $artistid, $description, $countryid, $genderid, $request, $typeRequest
                         --> It's not an exhausthive list but it's the basics to receive on this page. Some extra elements can be added and differ if it's for artist or gender for example  */

switch($request){
    case 'artist':
        $artist = new Artist();
        $artist->load($artistid);
        $artist->setDescription($description);
        $artist->setCountryId($countryid);
        $artist->setGenderId($genderid);
        $artist->store();
        break;
}






