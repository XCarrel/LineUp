<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 10.09.2018
 * Time: 15:53
 */

require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");

$genders = new Gender();

error_log("LIST");
var_dump($_POST);
extract($_POST);


//            break;
//        }else if($typeRequest === "delete"){ // deleteList must be set for the "delete" request
//
//        }else if($typeRequest === "rename"){ // genderToRename must be set for the "delete" request
//            $gender = new Gender();
//            // Not finished
//        }
//        break;

if(isset($add)){
    $gender = new Gender();

    $gender->setName($genderToAdd);
    $gender->create();
}

if(isset($delete)){
    foreach($deleteList as $toDeleteGender) :
        $gender = new Gender();
        $gender->load($toDeleteGender);
        $gender->destroy();
    endforeach;;
    echo 'delete';
}

////array(4) { ["genderId"]=> string(2) "12" ["rename"]=> string(0) "" ["genderToDeleteOrRename"]=> string(8) "TEST1234" ["genderToAdd"]=> string(0) "" } genderId: 12renameif(isset($rename)){
if(isset($rename)){
    $gender = new Gender();
    $gender->setId($genderId);
    $gender->setName($genderToDeleteOrRename);
    $gender->store();
}

require_once ("sources/view/administrationView.html");

