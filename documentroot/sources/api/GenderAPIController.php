<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 12.11.2018
 * Time: 14:42
 */


/* Not used anymore
extract ($_POST);

require_once ("sources/model/Gender.php");

//Check if a new gender is added with the variable name or a gender is getting deleted.

if(isset($name) && !isset($id)){
    // Create a new Gender object so we can add our new gender in the create method.
    $gender = new Gender();
    $gender->setName($name);
    $gender->create();
}

if(isset($ids)){
    //To delete multiple selections, do a foreach then create a new object to destroy it.
    foreach ($ids as $id){
        error_log($id,0);
        $gender = new Gender();
        $gender->load($id);
        $gender->destroy();
    }
}
if(isset($id) && isset($name)){
    $gender = new Gender();
    $gender->load($id);
    $gender->setName($name);
    $gender->store();
}
