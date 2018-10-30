<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 15:51
 */

/*/ Unit test. Uncomment to execute

require_once "sources/unittest/UnitTests.php";
UnitTests::testPersistableOnArtist();

//*/
$appVersion = "v1.0";

$page = isset($_GET["page"]) ? $_GET["page"] : "home";

switch ($page)
{
    case 'home':
    case 'list':
        break;
    case 'view':
    case 'editview':
    case 'preview':
        if (isset($_GET["id"]))
            $artistId = $_GET["id"];
        else
        {
            $page = 'error';
            $errormessage = "Format incorrect (manque l'id de l'artiste)";
        }
        break;
    default:
        $page = 'error';
        $errormessage = "La page demandée n'existe pas";
}

ob_start();
include("sources/controller/$page"."Controller.php"); // "call" to the controller
$content = ob_get_contents();
ob_end_clean();

include("sources/view/layout.html");
?>