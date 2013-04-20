<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package helpers
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

if ( ! function_exists('string_limiter'))
{
    function string_limiter($str, $length = 100, $start = 0)
    {
        $CI =& get_instance();
        $charset = $CI->config->item('charset');

        if (mb_strlen($str, $charset) <= $length)
        {
            return $str;
        }

        return mb_substr($str, $start, $length, $charset) . '&#8230;';
    }
}

/* End of file my_text_helper.php */
/* Location: ./application/helpers/my_text_helper.php */