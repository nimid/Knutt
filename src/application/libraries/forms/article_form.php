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
 * Article Form Class
 *
 * @package libraries/forms
 * @author Saroj Saengphongumphai
*/

class Article_form {
    CONST BODY = 'body';
    CONST CATEGORY = 'category';
    CONST ENABLED = 'enabled';
    CONST HEADLINE = 'headline';
    CONST ID = 'id';
    CONST SLUG = 'slug';
    CONST TAG = 'tag';
    private $body;
    private $category;
    private $enabled;
    private $headline;
    private $id;
    private $slug;
    private $tag;

    public function __construct($article_object = NULL)
    {
        log_trace(__CLASS__, __FUNCTION__);

        if ( ! empty($article_object))
        {
            $this->set_body($article_object->get_body());
            $this->set_category($article_object->get_category_id());
            $this->set_headline($article_object->get_headline());
            $this->set_enabled($article_object->get_enabled());
            $this->set_id($article_object->get_id());
            $this->set_slug($article_object->get_slug());
            $this->set_tag($article_object->get_tag());
        }
    }

    public function get_rules()
    {
        $rules = array(
                        array(
                                        'field' => self::BODY,
                                        'label' => 'Body',
                                        'rules' => 'trim|required'),
                        array(
                                        'field' => self::CATEGORY,
                                        'label' => 'Category',
                                        'rules' => 'trim|is_natural_no_zero'),
                        array(
                                        'field' => self::ENABLED,
                                        'label' => 'Status',
                                        'rules' => 'trim|required'),
                        array(
                                        'field' => self::HEADLINE,
                                        'label' => 'Headline',
                                        'rules' => 'trim|required|min_length[1]|max_length[255]'),
                        array(
                                        'field' => self::ID,
                                        'label' => '',
                                        'rules' => 'trim|is_natural_no_zero'),
                        array(
                                        'field' => self::SLUG,
                                        'label' => 'Slug',
                                        'rules' => ''),
                        array(
                                        'field' => self::TAG,
                                        'label' => 'Tags',
                                        'rules' => 'trim|max_length[255]')
        );

        return $rules;
    }

    private function generate_slug($headline, $slug)
    {
        if ( ! empty($slug))
        {
            $return_value = $slug;
        }
        else
        {
            $return_value = $headline;
        }

        $return_value = strtolower($return_value);

        $return_value = preg_replace("/[^a-z0-9\s-\p{Thai}]+/u", " ", $return_value);
        $return_value = trim(preg_replace("/[\s-]+/", " ", $return_value));
        $return_value = trim(substr($return_value, 0, 255));
        $return_value = preg_replace("/\s/", "-", $return_value);

        return $return_value;
    }

    public function input_post($post)
    {
        $this->set_body($post[self::BODY]);
        $this->set_category($post[self::CATEGORY]);
        $this->set_enabled($post[self::ENABLED]);
        $this->set_headline($post[self::HEADLINE]);
        $this->set_id($post[self::ID]);
        $this->set_slug($this->generate_slug(
                        $post[self::HEADLINE], $post[self::SLUG]));
        $this->set_tag($post[self::TAG]);
    }

    public function is_valid()
    {
        $CI = &get_instance();
        $CI->form_validation->set_rules($this->get_rules());
        return $CI->form_validation->run();
    }

    public function repopulate()
    {
        $this->set_body(set_value(self::BODY));
        $this->set_category(set_value(self::CATEGORY));
        $this->set_enabled(set_value(self::ENABLED));
        $this->set_headline(set_value(self::HEADLINE));
        $this->set_id(set_value(self::ID));
        $this->set_slug(set_value(self::SLUG));
        $this->set_tag(set_value(self::TAG));
    }

    public function get_body()
    {
        return $this->body;
    }

    public function get_category()
    {
        return $this->category;
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

    public function get_headline()
    {
        return $this->headline;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_slug()
    {
        return $this->slug;
    }

    public function get_tag()
    {
        return $this->tag;
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

    public function set_body($body)
    {
        $this->body = $body;
    }

    public function set_category($category)
    {
        $this->category = $category;
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

    public function set_headline($headline)
    {
        $this->headline = $headline;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function set_slug($slug)
    {
        $this->slug = $slug;
    }

    public function set_tag($tag)
    {
        $this->tag = $tag;
    }
}

/* End of file article_form.php */
/* Location: ./libraries/forms/article_form.php */