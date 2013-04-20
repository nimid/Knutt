<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package libraries/sessions
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Admin Session Class
 *
 * @package libraries/sessions
 * @author Saroj Saengphongumphai
*/

class Admin_session {
    CONST SESSION_NAME = 'admin_session';
    private $CI;

    public function __construct()
    {
        log_trace(__CLASS__, __FUNCTION__);
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    public function clear()
    {
        $this->CI->session->unset_userdata(self::SESSION_NAME);
    }

    public function is_stayed()
    {
        $admin = $this->CI->session->userdata(self::SESSION_NAME);

        if (empty($admin))
        {
            return FALSE;
        }

        if ($admin['is_stayed'] === TRUE)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function save($admin)
    {
        $array = array(
                        'id' => $admin->get_id(),
                        'username' => $admin->get_username(),
                        'is_stayed' => TRUE
        );

        $this->CI->session->set_userdata(self::SESSION_NAME, $array);
    }

    public function get_id()
    {
        $admin = $this->CI->session->userdata(self::SESSION_NAME);

        if (empty($admin))
        {
            return NULL;
        }
        else
        {
            return $admin['id'];
        }
    }

    public function get_username()
    {
        $admin = $this->CI->session->userdata(self::SESSION_NAME);

        if (empty($admin))
        {
            return NULL;
        }
        else
        {
            return $admin['username'];
        }
    }
}

/* End of file admin_session.php */
/* Location: ./application/libraries/sessions/admin_session.php */