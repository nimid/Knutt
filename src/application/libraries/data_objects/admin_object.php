<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package libraries/data_objects
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Admin Object Class
 *
 * @package libraries/data_objects
 * @author Saroj Saengphongumphai
*/

class Admin_object {
    private $id = NULL;
    private $username = '';

    public function __construct()
    {
        log_trace(__CLASS__, __FUNCTION__);
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function set_username($username)
    {
        $this->username = $username;
    }
}

/* End of file admin_object.php */
/* Location: ./application/libraries/data_objects/admin_object.php */