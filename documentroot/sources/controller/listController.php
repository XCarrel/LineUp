<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:42
 */
//
require_once ("sources/model/artists.php");

$artists = getArtists();

require_once ("sources/view/listView.html");

