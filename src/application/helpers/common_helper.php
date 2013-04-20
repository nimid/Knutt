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

if ( ! function_exists('log_debug'))
{
    function log_debug($message)
    {
        log_message('debug', $message);
    }
}

if ( ! function_exists('log_error'))
{
    function log_error($message)
    {
        log_message('error', $message);
    }
}

if ( ! function_exists('log_trace'))
{
    function log_trace($class, $function)
    {
        log_message('debug', "$class: $function Called");
    }
}

if ( ! function_exists('pr'))
{
    function pr($expression)
    {
        echo '<pre>';
        print_r($expression);
        echo '</pre>';
    }
}

/* End of file common_helper.php */
/* Location: ./application/helpers/common_helper.php */