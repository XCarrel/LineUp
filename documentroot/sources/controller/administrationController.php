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
//            foreach($deleteList as $toDeleteGender) :
//                $gender = new Gender();
//                $gender->load($toDeleteGender);
//                $gender->destroy();
//            endforeach;;
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
    echo 'delete';
}

if(isset($rename)){
    echo 'rename';
}

require_once ("sources/view/administrationView.html");

