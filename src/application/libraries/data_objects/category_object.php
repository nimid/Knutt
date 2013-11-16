<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package libraries/data_objects
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Category Object Class
 *
 * @package libraries/data_objects
 * @author Saroj Saengphongumphai
*/

class Category_object {
    private $created;
    private $enabled = TRUE;
    private $id;
    private $modified;
    private $name = '';
    private $number_of_article;
    private $slug;

    public function __construct()
    {
        log_trace(__CLASS__, __FUNCTION__);
    }

    public function enable()
    {
        $this->enabled = TRUE;
    }

    public function disable()
    {
        $this->enabled = FALSE;
    }

    public function get_created()
    {
        return $this->created;
    }

    public function get_enabled()
    {
        if ($this->enabled == TRUE)
        {
            return '1';
        }
        else
        {
            return '0';
        }

        return $this->enabled;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_modified()
    {
        return $this->modified;
    }

    public function get_name()
    {
        return htmlspecialchars($this->name);
    }

    public function get_number_of_article()
    {
    	return $this->number_of_article;
    }

    public function get_slug()
    {
        return htmlspecialchars($this->slug);
    }

    public function is_enabled()
    {
        return $this->enabled;
    }

    public function set_created($created)
    {
        $this->created = $created;
    }

    public function set_enabled($enabled)
    {
        if ($enabled == '1')
        {
            $this->enabled = TRUE;
        }
        else
        {
            $this->enabled = FALSE;
        }
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    private function set_modified($modified)
    {
        $this->modified = $modified;
    }

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function set_number_of_article($number_of_article)
    {
    	$this->number_of_article = $number_of_article;
    }

    public function set_slug($slug)
    {
        $this->slug = $slug;
    }
}

/* End of file category_object.php */
/* Location: ./application/libraries/data_objects/category_object.php */