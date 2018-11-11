<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:41
 */

session_start();

require_once ("sources/model/Artist.php");

$artists = Artist::All();

require_once ("sources/view/homeView.html");

$_SESSION["sawHomeView"] = true;
