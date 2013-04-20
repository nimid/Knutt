<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * @name CI Smarty
 * @copyright Dwayne Charrington, 2011.
 * @author Dwayne Charrington and other Github contributors
 * @license (DWYWALAYAM) Do What You Want As Long As You Attribute Me Licence
 * @version 1.2
 * @link http://ilikekillnerds.com
*/

// Your views directory with a trailing slash
$config['template_directory'] = array(APPPATH . 'views/');

// Smarty caching enabled by default unless explicitly set to 0
$config['cache_status'] = FALSE;

// Cache lifetime. Default value is 3600 seconds (1 hour) Smarty's default value
$config['cache_lifetime'] = 3600;

// Where templates are compiled
$config['compile_directory'] = FCPATH . APPPATH . 'cache/template/compile/';

// Where templates are cached
$config['cache_directory'] = FCPATH . APPPATH . 'cache/template/cache/';

// Where Smarty configs are located
$config['config_directory'] = FCPATH . APPPATH . 'third_party/smarty/configs/';

$config['debugging'] = FALSE;

$config['plugins_directory'] = FCPATH . APPPATH . 'helpers/smarty/';
// Default extension of templates if one isn't supplied
$config['template_ext'] = 'tpl';

/* End of file smarty.php */
/* Location: ./application/config/knutt/smarty.php */