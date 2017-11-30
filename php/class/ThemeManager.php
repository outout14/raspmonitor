<?php
/**
 * Class RaspThemeManager
 *
 * Functions for theme managing and loading
 */

class RaspThemeManager
{
    private $_themeurl;
    private $_themeurl_temp;
    private $_themename;

    /**
     * @param $themename
     */
    function LoadTheme($themename)
    {
        $this->_themeurl_temp = __DIR__ . "/../../assets/themes/" . $themename . ".css";

        if (file_exists($this->_themeurl_temp)) {
            $this->_themeurl = "assets/themes/" . $themename . ".css";
            unset($this->_themeurl_temp);
        } else {
            $this->_themeurl = "assets/themes/default.css";
            unset($this->_themeurl_temp);
        }
    }

    /**
     * @return mixed
     */
    function themeURL()
    {
        if (isset($this->_themeurl) && $this->_themeurl != "") {
            return $this->_themeurl;
        }
    }
}