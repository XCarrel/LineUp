<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 16:41
 */
require_once ("sources/model/artists.php");

$artists = getArtists();

require_once ("sources/view/homeView.html");

