<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package controllers
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Category Controller Class
 *
 * @package controllers
 * @author Saroj Saengphongumphai
*/

class Category extends Solid_Controller {

    public function __construct()
    {
        parent::__construct();

        log_trace(__CLASS__, __FUNCTION__);

        $this->load->data_object('article_object');
        $this->load->data_object('category_object');
        $this->load->model('article_model');
        $this->load->model('category_model');
    }

    public function _remap($method_name, $param_arr = array())
    {
        log_trace(__CLASS__, __FUNCTION__);

        if (method_exists($this, $method_name))
        {
            return call_user_func_array(array($this, $method_name), $param_arr);
        }
        else
        {
            $this->index($method_name);
        }
    }

    public function index($slug = '')
    {
        log_trace(__CLASS__, __FUNCTION__);

        if (empty($slug))
        {
            show_404();
        }

        $this->category_model->set_enable();
        $this->category_model->set_slug(urldecode($slug));
        $category = $this->category_model->retrieve();

        if (empty($category))
        {
            show_404();
        }

        $this->category_model->order_by_name_asc();
        $this->category_model->set_enable();
        $categories = $this->category_model->lists();

        $this->article_model->order_by_created_desc();
        $this->article_model->set_enable();
        $this->article_model->set_category_id($category->get_id());
        $articles = $this->article_model->lists();

        $page_title = generate_page_title($category->get_name());

        $data['articles'] = $articles;
        $data['category'] = $category;
        $data['categories'] = $categories;
        $data['page_title'] = $page_title;
        $this->parser->parse('article/category', $data);
    }
}

/* End of file category.php */
/* Location: ./application/controllers/category.php */