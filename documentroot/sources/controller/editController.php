<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");
require_once ("sources/model/Country.php");
require_once ("sources/model/ContractType.php");

$genders = Gender::All();
$countries = Country::All();
$contractTypes = ContractType::All();
$artist = new Artist();
$artist->load($artistId);

require_once ("sources/view/editView.html");

?>