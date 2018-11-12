<?php
require_once ("sources/model/Gender.php");

extract ($_POST);

switch ($_POST["action"]){
    case "create":{
        $gender = new Gender();
        $gender->setName($_POST['name']);
        $genderData = $gender->create();
        echo json_encode($genderData);
    }
    break;
    case "update":{
        $gender = new Gender();
        $gender->load($id);
        $gender->setName($_POST['name']);
        $gender->store();
        echo "Les modifications ont été appliqué";
    }
    break;
    case "delete":{

        $idArray = $id;
        foreach ($idArray as $ids){
          $gender = new Gender();
          $gender->load($ids);
          $gender->destroy();
        }
    }
    break;
}


