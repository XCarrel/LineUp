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
    case 'gender':


        if($typeRequest === "add"){ // toAdd must be set for the "add" request
            $gender = new Gender();

            $gender->setName($toAdd);
            $gender->create();
            break;
        }else if($typeRequest === "delete"){ // deleteList must be set for the "delete" request
            foreach($deleteList as $toDeleteGender) :
                $gender = new Gender();
                $gender->load($toDeleteGender);
                $gender->destroy();
            endforeach;;
        }else if($typeRequest === "rename"){ // genderToRename must be set for the "delete" request
                $gender = new Gender();
                // Not finished
        }
        break;
}






