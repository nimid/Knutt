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
 * Parser Class
 *
 * @package libraries
 * @author Saroj Saengphongumphai
*/

class Parser {

    public function __construct()
    {
        log_trace(__CLASS__, __FUNCTION__);
    }

    public function parse($template, $data = array(), $return = FALSE)
    {
        log_trace(__CLASS__, __FUNCTION__);

        if (empty($template))
        {
            log_error('Template is empty');
            show_error('internal error');
            return FALSE;
        }

        $CI = &get_instance();

        if ( ! empty($data))
        {
            foreach ($data as $key => $val)
            {
                $CI->smarty->assign($key, $val);
            }
        }

        try
        {
            $template_string = $CI->smarty->fetch($template);
        }
        catch (Exception $exception)
        {
            _exception_handler(E_PARSE, $exception->getMessage(),
            $exception->getFile(), $exception->getLine());
        }

        if ($return == TRUE)
        {
            return $template_string;
        }
        else
        {
            $CI->output->append_output($template_string);
        }
    }
}

/* End of file Parser.php */
/* Location: ./application/libraries/Parser.php */