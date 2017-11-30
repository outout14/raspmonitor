<?php
/*
 *
 * Very Lite Script to check Update
 *
 * This script download "version.ini" file of last version (master) on Github and it compare version number.
 *
 */
require(__DIR__ . "/class/ini_parser.php");

/* CHECK */
function checkUpdate()
{
    /* INI OF THE LAST GITHUB COMMIT */
    $web_ini = "https://raw.githubusercontent.com/outout14/raspmonitor/master/php/version.ini";
    $web_ini_srvpath = 'php/web_version.ini';

    if (@!copy($web_ini, $web_ini_srvpath)) {
        return 666;
    }
    $web_version = iniParser(false, "php/web_version.ini");
    $web_version = $web_version["version"];

    /* INI OF THE SERVER */
    $version = iniParser(false, "php/version.ini");
    $version = $version["version"];

    unlink($web_ini_srvpath);
    if ($web_version > $version) {
        return 1; //1 = It's time to up to date !
    } else {
        return 0; //0 = O.K.
    }

}

?>