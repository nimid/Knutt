<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package core
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Solid Controller Class
 *
 * @package core
 * @author Saroj Saengphongumphai
*/

class Solid_Controller extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        log_trace(__CLASS__, __FUNCTION__);
        $this->lang->load('main', $this->config->item('frontend_language'));
        $this->lang->load('frontend/main', $this->config->item('frontend_language'));
    }
}

/* End of file Solid_Controller.php */
/* Location: ./application/core/Solid_Controller.php */