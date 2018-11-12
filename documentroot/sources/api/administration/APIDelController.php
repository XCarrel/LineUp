<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 28.10.18
 * Time: 11:53
 */

extract ($_POST); // $genderid

require_once ("sources/model/Gender.php");


$gender = new Gender();
$gender->setId($genderid);
$gender->setName($gendername);
$gender->destroy();

?>

