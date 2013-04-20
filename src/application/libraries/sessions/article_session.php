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
 * Article Session Class
 *
 * @package libraries/sessions
 * @author Saroj Saengphongumphai
*/

class Article_session {
    CONST SESSION_NAME = 'article_session';
    private $CI;

    public function __construct()
    {
        log_trace(__CLASS__, __FUNCTION__);
        $this->CI = &get_instance();
        $this->CI->load->library('session');
    }

    public function get_search_word()
    {
        return $this->CI->session->userdata(self::SESSION_NAME . '_search_word');
    }

    public function save_search_word($search_word)
    {
        $this->CI->session->set_userdata(self::SESSION_NAME . '_search_word'
                        , $search_word);
    }
}

/* End of file article_session.php */
/* Location: ./application/libraries/sessions/article_session.php */