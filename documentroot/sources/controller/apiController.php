<?php
/**
 * Created by PhpStorm.
 * User: Dardan.Iljazi
 * Date: 10.09.2018
 * Time: 15:53
 */

require_once ("sources/model/Artist.php");
require_once ("sources/model/Gender.php");
require_once ("sources/model/Country.php");


$gender         = $_POST['gender'];
$country        = $_POST['country'];
$description    = $_POST['description'];
$artistId       = $_POST['artistId'];

$artist = new Artist();
$artist->store();


require_once ("sources/view/editView.html");

