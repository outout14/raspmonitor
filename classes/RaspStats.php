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
     * @see apache_get_version()
     * @return string
     */
    public static function getApacheVersion(){
        $version = apache_get_version();
        return ($version ? $version : 'Failed to get Apache version');
    }

    /**
     * @see php_uname()
     * @return string
     */
    public static function getOSInformation(){
        return php_uname();
    }
}