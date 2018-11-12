<?php
/**
 * Created by PhpStorm.
 * User: Anel.MUMINOVIC
 * Date: 12.11.2018
 * Time: 13:54
 */

require_once ("sources/model/Genders.php");

/* Get all the data from table Artist */
$artists = Genders::All();

require_once ("sources/view/adminView.html");

?>