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

function smarty_modifier_article_category_name($params)
{
    return htmlspecialchars($params);
}
?>