<?php
date_default_timezone_set("UTC");

/* Project under WTFPL licence */
/* Projet sous la licence WTFPL */


/*
 * LOAD REQUIREMENTS
 */
require_once('php/class/RaspStats.php'); //LOAD MAIN CLASS
require_once('php/class/NotifyManager.php'); //LOAD NOTIFY MANAGER CLASS
require_once('php/update.php'); //LOAD UPDATE CHECKER
require_once('php/lang/lang.php'); //LOAD LANG FILE
require_once('php/class/ini_parser.php'); //LOAD INI PARSER
require_once('php/smarty/smarty.class.php'); //LOAD SMARTY 2
require_once('php/class/ThemeManager.php'); //LOAD THEME MANAGER

/*
 * DEFINE GLOBAL, RASPMONITOR_VERSION
 */
define('RASPMONITOR_VERSION', iniParser(false, __DIR__ . "/php/version.ini")['version']);

/*
 * GLOBAL INI
 */
$iniConf = iniParser(False);

/*
 * NOTIFICATIONS
 */
$notifmngr = new NotifyManager();
if (isset($_GET['update'])) {
    $notifmngr->addNotif("update", checkUpdate());
}
if (!RaspStats::isLinux()) {
    $notifmngr->addNotif("win", "true");
}

/*
 * THEME
 */
$raspTheme = new RaspThemeManager;
//INIPARSER
$raspTheme->loadTheme($iniConf["theme"]);

/*
SMARTY INIT.
*/
$page = new Smarty();

/*
ASSIGN SMARTY VARS
*/

//LANG
$page->assign($lang);

//RASPMONITOR FUNCTIONS
$page->assign(array(
    "ipAdrr" => RaspStats::getIpAddress(),
    "srvName" => RaspStats::getSrvName(),
    "phpVer" => RaspStats::getPHPVersion(),
    "serverSoftware" => RaspStats::getServerSoftware(),
    "webserver_version" => RaspStats::getWebserverVersion()["version"],
    "InformationOS" => RaspStats::getOSInformation(),
    "temp" => RaspStats::getTemperature(),
    "isLinux" => RaspStats::isLinux(),
    "KernelOS" => RaspStats::getOSKernel(),
    "checkSSH" => RaspStats::checkSSH(),
    "checkFTP" => RaspStats::checkFTP(),
    "RASPMONITOR_VERSION" => RASPMONITOR_VERSION
));

//OTHER ELEMENTS
$page->assign(array(
    "notify_atributs" => $notifmngr->ReturnNotif()
));

//RASP THEME
$page->assign(array(
    "theme" => $raspTheme->themeURL()
));

//Header
$page->display(__DIR__ . "/php/tpl/header.tpl");

//LOADER
$page->display(__DIR__ . "/php/tpl/loader.tpl");

//NAV
$page->display(__DIR__ . "/php/tpl/nav.tpl");

//Page content
$page->display(__DIR__ . "/php/tpl/index.tpl");

//Footer
$page->display(__DIR__ . "/php/tpl/footer.tpl");

?>
