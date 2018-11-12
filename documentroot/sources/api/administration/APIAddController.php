<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 28.10.18
 * Time: 11:53
 */

extract ($_POST); //  $gendername

require_once ("sources/model/Gender.php");

$gender = new Gender();
$gender->setName($gendername);
$gender->store();

?>

