<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package controllers/backend
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Backend Controller Class
 *
 * @package controllers/backend
 * @author Saroj Saengphongumphai
*/

class Backend extends Solid_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->session('admin_session');

        if ($this->admin_session->is_stayed() === FALSE)
        {
            redirect('/');
        }
    }
}

/* End of file backend.php */
/* Location: ./application/controllers/backend/backend.php */