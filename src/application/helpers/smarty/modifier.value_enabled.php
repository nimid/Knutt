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

function smarty_modifier_value_enabled($params)
{
    $CI = &get_instance();

    if ($params == '0')
    {
        return $CI->lang->line('disable');
    }
    else
    {
        return $CI->lang->line('enable');
    }
}
?>