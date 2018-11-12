<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 12.11.2018
 * Time: 14:42
 */

extract ($_POST);

require_once ("sources/model/Gender.php");

$gender = new Gender();
$gender->setName($name);
$gender->create();