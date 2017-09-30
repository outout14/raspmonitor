<?php
date_default_timezone_set("UTC");
define('RASPMONITOR_VERSION', '1');

/* Project under WTFPL licence */
/* Projet sous la licence WTFPL */

/* SMARTY */
require('php/smarty/smarty.class.php'); //TPL POWER :D

require('php/RaspStats.php'); //LOAD CLASS
require('php/update.php'); //UPDATE CHECK
require('php/lang/lang.php'); //LANG

// NOTIFY ATTRUBUTS FOR NOTIFY.PHP //
$notify_atributs = "?";

if(isset($_GET['update'])){
    $update = checkUpdate();
    $notify_atributs = $notify_atributs . "update=" . $update;
}


/*
INITIALISATION DE SMARTY
*/
$page = new Smarty();

/*
Assignation des variables
*/

//LANG
$page->assign($lang);

//RASPMONITOR FUNCTIONS
$page->assign(array(
  "ipAdrr" => RaspStats::getIpAddress(),
  "srvName" => RaspStats::getSrvName(),
  "phpVer" => RaspStats::getPHPVersion(),
  "serverSoftware" => RaspStats::getServerSoftware(),
  "webserver_version" => RaspStats::getWebserverVersion(),
  "InformationOS" =>  RaspStats::getOSInformation(),
  "temp" => RaspStats::getTemperature(),
  "isLinux" => RaspStats::isLinux(),
  "KernelOS" => RaspStats::getOSKernel(),
  "checkSSH" => RaspStats::checkSSH(),
  "checkFTP" => RaspStats::checkFTP(),
  "RASPMONITOR_VERSION" => RASPMONITOR_VERSION
));

//OTHER ELEMENTS
$page->assign(array(
  "notify_atributs" => $notify_atributs
));

//Header
$page->display("php/tpl/header.tpl");

//LOADER
$page->display("php/tpl/loader.tpl");

//NAV
$page->display("php/tpl/nav.tpl");

//Page content
$page->display("php/tpl/index.tpl");

//Footer
$page->display("php/tpl/footer.tpl");

?>
