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

extract($_POST);

if(isset($add)){
    $gender = new Gender();
    $gender->setName($genderToAdd);
    $gender->create();
}

if(isset($delete)){
    foreach($genderId as $id) :
        $gender = new Gender();
        $gender->load($id);
        $gender->destroy();
    endforeach;
}

if(isset($rename)){
    $gender = new Gender();
    $gender->setId($genderId[0]);
    $gender->setName($genderToDeleteOrRename);
    $gender->store();
}

require_once ("sources/view/administrationView.html");

