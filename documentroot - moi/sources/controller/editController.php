<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");
require_once ("sources/model/Countries.php");

$artist = new Artist();
$artist->load($artistId);

$genders = Gender::All();
$countries = Countries::All();

require_once ("sources/view/editView.html");

?>