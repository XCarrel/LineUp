<?php
/**
 * Created by PhpStorm.
 * User: David Niembro
 * Date: 02.09.18
 * Time: 16:41
 */

require_once ("sources/model/Gender.php");
$genders = Gender::all();
require_once ("sources/view/adminView.html");

?>