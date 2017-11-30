<?php
/**
 * Class Notify
 *
 * Contains all utilities for manage Notifications from ../notify.php for RaspMonitor
 */

class NotifyManager
{
    private $_notifs;

    /**
     * CONSTURCT
     * Just construct $_notifs...
     */
    public function __construct()
    {
        $this->_notifs = "?";
    }


    /**
     * Function to add Notifications
     *
     * Entrys :
     * notification_var @ STRING OR INT
     * notification_value @ STRING OR INT
     *
     * @return nothing
     */
    public function addNotif($_nvar, $_nval)
    {
        $this->_notifs = $this->_notifs . $_nvar . "=" . $_nval . "&";
    }

    /*
     * This function returns $_notifs var.
     *
     * @return string
     */
    public function returnNotif()
    {
        return $this->_notifs;
    }
}

?>