<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package libraries
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Load Class
 *
 * @package libraries
 * @author Saroj Saengphongumphai
*/

class Load extends CI_Loader {
    private $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
    }

    public function data_object($data_object)
    {
        $this->CI->load->library("data_objects/$data_object");
    }

    public function form($form)
    {
        $this->CI->load->library("forms/$form");
    }

    public function session($session)
    {
        $this->CI->load->library("sessions/$session");
    }
}

/* End of file Load.php */
/* Location: ./libraries/Load.php */