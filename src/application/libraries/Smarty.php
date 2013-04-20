<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * @name CI_Smarty
 * @copyright Dwayne Charrington, 2011.
 * @author Dwayne Charrington and other Github contributors
 * @license (DWYWALAYAM) Do What You Want As Long As You Attribute Me Licence
 * @version 1.2
 * @link http://ilikekillnerds.com
*/

require_once APPPATH . 'third_party/smarty/Smarty.class.php';

class CI_Smarty extends Smarty {
    private $template_ext;

    public function __construct()
    {
        parent::__construct();
        log_trace(__CLASS__, __FUNCTION__);
        $CI = &get_instance();

        $this->addPluginsDir($CI->config->item('plugins_directory'));
        $this->caching = $CI->config->item('cache_status');
        $this->cache_dir = $CI->config->item('cache_directory');
        $this->cache_lifetime = $CI->config->item('cache_lifetime');
        $this->compile_dir = $CI->config->item('compile_directory');
        $this->config_dir = $CI->config->item('config_directory');
        $this->debugging = $CI->config->item('debugging');
        $this->error_reporting = error_reporting();
        $this->template_dir = $CI->config->item('template_directory');
        $this->template_ext = $CI->config->item('template_ext');

        $this->assign('app_path', 'backend');
        $this->assign('app_url', base_url('backend'));

        $this->assign('base_url', base_url());
        $this->assign('ci', $CI);
        $this->assign('css_url', base_url($CI->config->item('css_path')));
        $this->assign('img_url', base_url($CI->config->item('img_path')));
        $this->assign('js_url', base_url($CI->config->item('js_path')));

        $this->assign('css_strat_url', base_url($CI->config->item('css_strat_path')));
        $this->assign('img_strat_url', base_url($CI->config->item('img_strat_path')));
        $this->assign('js_strat_url', base_url($CI->config->item('js_strat_path')));

        $this->disableSecurity();
    }

    public function disable_caching()
    {
        $this->caching = FALSE;
    }

    public function enable_caching()
    {
        $this->caching = TRUE;
    }

    public function fetch($template)
    {
        log_trace(__CLASS__, __FUNCTION__);
        return parent::fetch("$template.$this->template_ext");
    }
}

/* End of file Smarty.php */
/* Location: ./application/libraries/Smarty.php */