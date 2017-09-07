<?php

/**
 * Class RaspStats
 *
 * Contains all utilities for getting a Raspberry Pi system information
 */
abstract class RaspStats{
    /**
     * Returns the syetem's temperature.
     * Previously by running a system command
     *
     * @return float|int
     */
    public static function getTemperature(){
        $milidegrees = (int) file_get_contents('/sys/class/thermal/thermal_zone0/temp');
        $degrees = $milidegrees / 1000;

        return $degrees;
    }

    /**
     * Returns the system's IP address via a system call
     * @change I don't really like calling shell commands
     * @return string
     */
    public static function getIpAddress(){
        return exec('hostname -I');
    }

    /**
     * @see phpversion()
     *
     * @return string
     */
    public static function getPHPVersion(){
        return phpversion();
    }

    /**
     * Returns an array with server name and server version by using some detection techniques
     * @see apache_get_version()
     * @return array|bool
     */
    public static function getWebserverVersion(){
        // Is there a server variable to get the server version ?

        if(isset($_SERVER['SERVER_SOFTWARE'])){
            return [
                'server' => null,
                'version' => $_SERVER['SERVER_SOFTWARE']
            ];
        }

        // PHP provides a function to get Apache's version
        if(function_exists('apache_get_version')){
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
    public static function getOSInformation(){
        return php_uname();
    }
    
    /**
     * Returns the system's KERNEL.
     * @change I don't really like calling shell commands
     * @return string
    */
    public static function getOSKernel(){
        return exec('uname -r');
    }
}
