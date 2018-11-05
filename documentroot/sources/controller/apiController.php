<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Artist.php");

$artist = new Artist();

//error_log(print_r($_POST, true));

if($_POST['id'])
{
    $artist->load($_POST['id']);
    $artist->setGenderId($_POST['kind']);
    $artist->setCountryId($_POST['countries']);
    $artist->setDescription($_POST['description']);
    $artist->store();
}

?>