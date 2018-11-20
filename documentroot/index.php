<?php
/**
 * Created by PhpStorm.
 * User: Xavier
 * Date: 02.09.18
 * Time: 15:51
 */

require_once "vendor/autoload.php";
$dotenv = new Dotenv\Dotenv($_SERVER['DOCUMENT_ROOT']);
$dotenv->load();

$appVersion = getenv("VERSION");
$auteur = getenv("AUTEUR");
$page = isset($_GET["page"]) ? $_GET["page"] : "home";

switch ($page)
{
    case 'home':
    case 'list':
    case 'admin':
        break;
    case 'info':
    case 'preview':
    case 'edit':
        if (isset($_GET["id"]))
            $artistId = $_GET["id"];
        else
        {
            $page = 'error';
            $errormessage = "Format incorrect (manque l'id de l'artiste)";
        }
        break;
    case 'api':
        include("sources/controller/$page"."Controller.php");
        die();
        break;
    default:
        $page = 'error';
        $errormessage = "La page demandée n'existe pas";
}

ob_start();
include("sources/controller/$page"."Controller.php");
$content = ob_get_contents();
ob_end_clean();
include("sources/view/layout.html");

?>