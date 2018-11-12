<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");

$genders = Gender::All();

require_once ("sources/view/administrationView.html");

?>