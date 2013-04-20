<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package libraries/forms
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Category Form Class
 *
 * @package libraries/forms
 * @author Saroj Saengphongumphai
*/

class Category_form {
    CONST ENABLED = 'enabled';
    CONST ID = 'id';
    CONST NAME = 'name';
    CONST SLUG = 'slug';
    private $enabled = TRUE;
    private $id;
    private $name;
    private $slug;

    public function __construct()
    {
        log_trace(__CLASS__, __FUNCTION__);
    }

    public function disable()
    {
        $this->enabled = FALSE;
    }

    public function enable()
    {
        $this->enabled = TRUE;
    }

    public function get_rules()
    {
        $rules = array(
                        array(
                                        'field' => self::NAME,
                                        'label' => 'Name',
                                        'rules' => 'trim|required|min_length[1]|max_length[255]')
                        , array(
                                        'field' => self::SLUG,
                                        'label' => 'Slug',
                                        'rules' => 'trim|')
        );

        return $rules;
    }

    private function generate_slug($name, $slug)
    {
        $return_value = $slug;

        $return_value = strtolower($return_value);
        $return_value = preg_replace("/[^a-z0-9\s-\p{Thai}]+/u", " ", $return_value);
        $return_value = trim(preg_replace("/[\s-]+/", " ", $return_value));
        $return_value = trim(substr($return_value, 0, 255));
        $return_value = preg_replace("/\s/", "-", $return_value);

        if ( ! empty($return_value))
        {
            return $return_value;
        }

        $return_value = $name;

        $return_value = strtolower($return_value);
        $return_value = preg_replace("/[^a-z0-9\s-\p{Thai}]+/u", " ", $return_value);
        $return_value = trim(preg_replace("/[\s-]+/", " ", $return_value));
        $return_value = trim(substr($return_value, 0, 255));
        $return_value = preg_replace("/\s/", "-", $return_value);

        if ( ! empty($return_value))
        {
            return $return_value;
        }
    }

    public function input_post($post)
    {
        $this->set_enabled($post[self::ENABLED]);
        $this->set_id($post[self::ID]);
        $this->set_name($post[self::NAME]);
        $this->set_slug($this->generate_slug($post[self::ID]
                        , $post[self::NAME]
                        , $post[self::SLUG]));
    }

    public function is_valid()
    {
        $CI = &get_instance();
        $CI->form_validation->set_rules($this->get_rules());
        return $CI->form_validation->run();
    }

    public function repopulate()
    {
        $this->set_enabled(set_value(self::ENABLED));
        $this->set_name(set_value(self::NAME));
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
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_slug()
    {
        return $this->slug;
    }

    public function is_disabled()
    {
        if ($this->enabled == FALSE)
        {
            return 'checked="checked"';
        }
    }

    public function is_enabled()
    {
        if ($this->enabled == TRUE)
        {
            return 'checked="checked"';
        }
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

    public function set_name($name)
    {
        $this->name = $name;
    }

    public function set_slug($slug)
    {
        $this->slug = $slug;
    }
}

/* End of file category_form.php */
/* Location: ./libraries/forms/category_form.php */