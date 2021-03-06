﻿<?php
/**
 * Class RaspStats
 *
 * Contains all utilities for getting a Raspberry Pi system information
 */
require(__DIR__ . "/ini_parser.php");

abstract class RaspStats
{

    public static function isLinux()
    {
        return stripos(php_uname(), 'Win') === FALSE;
    }

    /**
     * Returns the syetem's temperature.
     * Previously by running a system command
     *
     * @return float|int
     */
    public static function getTemperature()
    {
        if (file_exists('/sys/class/thermal/thermal_zone0/temp')) {
            $milidegrees = (int)file_get_contents('/sys/class/thermal/thermal_zone0/temp');
            return $milidegrees / 1000;
        }

        return 9999999; // :D
    }

    /**
     * Returns the system's IP address via $SERVER
     */
    public static function getIpAddress()
    {

        //Check if localhost
        $localip = array(
            '127.0.0.1',
            '::1'
        );

        if (!in_array($_SERVER['SERVER_ADDR'], $localip)) {
            //IS NOT LOCALHOST
            return $_SERVER["SERVER_ADDR"];
        }

        return getHostByName(php_uname('n'));
    }

    /**
     * @see phpversion()
     *
     * @return array
     */
    public static function getPHPVersion()
    {
        $phpver = substr(phpversion(), 0, 6);
        $changelog = "https://php.net/releases/" . str_replace(".", "_", $phpver) . ".php";

        return [
            $phpver,
            $changelog
        ];
    }

    /**
     * Returns an array with server name and server version by using some detection techniques
     * @see apache_get_version()
     * @return array|bool
     */
    public static function getWebserverVersion()
    {
        // Is there a server variable to get the server version ?

        if (isset($_SERVER['SERVER_SOFTWARE'])) {
            return [
                'server' => null,
                'version' => $_SERVER['SERVER_SOFTWARE']
            ];
        }

        // PHP provides a function to get Apache's version
        if (function_exists('apache_get_version')) {
            $version = apache_get_version();
            return [
                'server' => 'Apache',
                'version' => $version ? $version : 'Failed to get Apache version'
            ];
        }

        // Maybe handle other server types ?
        return false;
    }

    /**
     * @see php_uname()
     * @return string
     */
    public static function getOSInformation()
    {
        return php_uname();
    }

    /**
     * Returns the system's KERNEL.
     * @change I don't really like calling shell commands
     * @return string
     */
    public static function getOSKernel()
    {
        return exec('uname -r');
    }

    /**
     * Return LAN server name
     * @return string
     */
    public static function getSrvName()
    {
        return gethostname();
    }

    public static function getServerSoftware()
    {
        $srv_soft = $_SERVER["SERVER_SOFTWARE"];


        if (strpos($srv_soft, 'Apache') !== false) {
            return "Apache";
        }

        if (strpos($srv_soft, "ngnix") !== false) {
            return "NGNIX";
        }

        return $srv_soft;
    }

    public static function checkSSH()
    {
        $configini = iniParser(False);
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $connection = @socket_connect($socket, getHostByName(php_uname('n')), $configini["ssh_port"]);

        if ($connection) {
            return 'Ouvert';
        }

        return 'Fermé';
    }

    public static function checkFTP()
    {
        $configini = iniParser(False);
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        $connection = @socket_connect($socket, getHostByName(php_uname('n')), $configini["ftp_port"]);

        if ($connection) {
            return 'Ouvert';
        }

        return 'Fermé';
    }
}
