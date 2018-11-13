<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Database.php");
require_once ("sources/model/iPersistable.php");
require_once ("sources/model/Gender.php");
require_once ("sources/model/Country.php");

error_log(print_r($_POST,1));
extract ($_POST); // $ins, $upd, $del, $newName, $updName, $genders[]

if (isset($ins)) // New gender inserted
{
    $ng = new Gender();
    $ng->setName($newName);
    $ng->create();
}

if (isset($del))
{
    foreach ($genders as $gid)
    {
        $dg = new Gender();
        $dg->load($gid);
        $dg->destroy();
    }
}

if (isset($upd))
{
    $ug = new Gender();
    $ug->load($genders[0]);
    $ug->setName($updName);
    $ug->store();
}

$genders = Gender::All();
$countries = Country::All();

require_once ("sources/view/adminView.html");

?>