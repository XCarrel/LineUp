<?php
/**
 * User: Alexandre Junod
 * Date: 12.11.18
 * Utility: Get all genders
 */

require_once ("sources/model/Gender.php");
$genders = Gender::All();
require_once ("sources/view/AdministrationView.html"); //Call the page with the view
?>
