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

function smarty_modifier_article_created_date($params)
{
    $CI = &get_instance();

    return date($CI->config->item('frontend_datetime_format')
                    , strtotime($params));
}
?>