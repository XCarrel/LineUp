<?php
/**
 * Created by PhpStorm.
 * User: David Niembro
 * Date: 02.09.18
 * Time: 16:41
 */

require_once ("sources/model/Gender.php");

//Retrieve data from Post
extract ($_POST);

if(isset($button)){

    //is a create a update or delete?
    switch ($button){
        case "create":{
            $gender = new Gender();
            $gender->setName($name);
            $genderData = $gender->create();
        }
            break;
        case "update":{
            $gender = new Gender();
            $gender->load($genderID[0]);
            $gender->setName($name);
            $gender->store();
        }
            break;
        case "delete":{
            foreach ($genderID as $ids){
                $gender = new Gender();
                $gender->load($ids);
                $gender->destroy();
            }
        }
            break;
        default:
            break;
    }
}

$genders = Gender::all();

require_once ("sources/view/adminView.html");

?>