<?php
/**
 * Created by PhpStorm.
 * User: Senistan.JEGARAJASIN
 * Date: 12.11.2018
 * Time: 13:41
 */

require_once ("sources/model/Gender.php");

$genders = Gender::All();

require_once ("sources/view/adminView.html");