<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package errors
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

$CI =& get_instance();

$CI->lang->load('main', $CI->config->item('frontend_language'));
$CI->lang->load('frontend/main', 'frontend_language');

$data['page_title'] = $CI->lang->line('page_not_found') . ' - ' . $CI->lang->line('site_title');

echo $CI->parser->parse('errors/error_404', $data, TRUE);

/* End of file error_404.php */
/* Location: ./application/errors/error_404.php */