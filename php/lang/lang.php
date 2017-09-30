<?php
session_start();
header('Cache-control: private'); // IE 6

if(isset($_GET['lang']))
{
    $lang = $_GET['lang'];
    $_SESSION['lang'] = $lang;
    setcookie('lang', $lang, time() + (3600 * 24 * 30));
}
else if(isset($_SESSION['lang']))
{
    $lang = $_SESSION['lang'];
}
else if(isset($_COOKIE['lang']))
{
    $lang = $_COOKIE['lang'];
}
else
{
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