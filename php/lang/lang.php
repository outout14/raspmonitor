<?php
/*
 *
 * SIMPLE SCRIPT TO AUTOMATIC OR MANUAL SELECT LANGAGE.
 *
 * Priority order :
 * 1 -> $_SESSION
 * 2 -> Config File
 *
 */
session_start();
header('Cache-control: private'); // IE 6
require_once(__DIR__ . "/../class/ini_parser.php");
$iniConf = iniParser(false);


if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} elseif (isset($iniConf['lang'])) {
    $lang = $iniConf['lang'];
} else {
    $lang = 'en';
}

switch ($lang) {
    case 'en':
        $lang_file = 'en.php';
        break;

    case 'fr':
        $lang_file = 'fr.php';
        break;

    default:
        $lang_file = 'en.php';

}

include_once $lang_file;
?>