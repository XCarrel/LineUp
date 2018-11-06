<?php
/**
 * Created by PhpStorm.
 * User: David Nimebro
 * Date: 02.09.18
 * Time: 16:42
 */

require_once ("sources/model/Artist.php");

$artists = Artist::all();

require_once ("sources/view/listView.html");

?>