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
 * Article Object Class
 *
 * @package libraries/data_objects
 * @author Saroj Saengphongumphai
*/

class Article_object {
    protected $body = '';
    protected $category_id;
    protected $category_name;
    protected $category_slug;
    protected $created = NULL;
    protected $enabled = FALSE;
    protected $headline = '';
    protected $id = NULL;
    protected $language;
    protected $modified = NULL;
    protected $slug = '';
    protected $tag = '';
    protected $views;

    public function __construct($article_form = NULL)
    {
        log_trace(__CLASS__, __FUNCTION__);

        if ( ! empty($article_form))
        {
            $this->set_body($article_form->get_body());
            $this->set_category_id($article_form->get_category());
            $this->set_enabled($article_form->get_enabled());
            $this->set_headline($article_form->get_headline());
            $this->set_id($article_form->get_id());
            $this->set_slug($article_form->get_headline());
            $this->set_tag($article_form->get_tag());
        }
    }

    public function enable()
    {
        $this->enabled = TRUE;
    }

    public function disable()
    {
        $this->enabled = FALSE;
    }

    public function get_body()
    {
        return $this->body;
    }

    public function get_category_id()
    {
        return $this->category_id;
    }

    public function get_category_name()
    {
        return $this->category_name;
    }

    public function get_category_slug()
    {
        return $this->category_slug;
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
    }

    public function get_headline()
    {
        return htmlspecialchars($this->headline);
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_modified()
    {
        return $this->modified;
    }

    public function get_slug()
    {
        return $this->slug;
    }

    public function get_tag()
    {
        return htmlspecialchars($this->tag);
    }

    public function is_disabled()
    {
        return ! $this->enabled;
    }

    public function is_enabled()
    {
        return $this->enabled;
    }

    public function set_body($body)
    {
        $this->body = $body;
    }

    public function set_category_id($category_id)
    {
        $this->category_id = $category_id;
    }

    public function set_category_name($category_name)
    {
        $this->category_name = $category_name;
    }

    public function set_category_slug($category_slug)
    {
        $this->category_slug = $category_slug;
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

/* End of file article_object.php */
/* Location: ./application/libraries/data_objects/article_object.php */