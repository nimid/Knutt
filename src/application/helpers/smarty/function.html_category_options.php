<?php
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package helpers/smarty
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

function smarty_function_html_category_options($params, $template)
{
    require_once(SMARTY_PLUGINS_DIR . 'function.html_options.php');

    $CI =& get_instance();
    $CI->load->model('category_model');

    $categories = $CI->category_model->lists();

    $options[''] = '';
    $selected = '';

    if ( ! empty($categories))
    {
        foreach ($categories as $category)
        {
            $options[$category->get_id()] = $category->get_name();
        }
    }

    if (isset($params['selected']) && ! empty($params['selected']))
    {
        $selected = $params['selected'];
    }

    $params['options'] = $options;
    $params['selected'] = $selected;

    return smarty_function_html_options($params, '');
}
?>