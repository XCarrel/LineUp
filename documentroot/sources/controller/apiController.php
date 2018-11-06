<?php
require_once ("sources/model/Artist.php");
$artist = new Artist();
extract ($_POST); 
if($id != null){
    $artist->load($id);
    $artist->setName($_POST['name']);
    $artist->setDescription($_POST['description']);
    $artist->setGender($_POST['gender_id']);
    $artist->setCountryID($_POST['country_id']);
    $artist->store();
    echo "Les modifications ont été appliqué";
}else{
    $artist->setName($_POST['name']);
    $artist->setDescription($_POST['description']);
    $artist->setGender($_POST['gender_id']);
    $artist->setCountryID($_POST['country_id']);
    $artist->create();
    echo "Create ok";
}
