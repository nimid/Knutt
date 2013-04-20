<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package controllers/backend
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Category Controller Class
 *
 * @package controllers/backend
 * @author Saroj Saengphongumphai
*/

require_once APPPATH . 'controllers/backend/backend.php';

class Category extends Backend {

    public function __construct()
    {
        parent::__construct();

        log_trace(__CLASS__, __FUNCTION__);

        $this->load->data_object('category_object');
        $this->load->form('category_form');
        $this->load->library('form_validation');
        $this->load->model('category_model');
    }

    public function delete($category)
    {
        log_trace(__CLASS__, __FUNCTION__);

        if ($this->is_valid($category))
        {
            $this->category_model->delete($category);
        }

        redirect('backend/category');
    }

    public function form($category_id = '')
    {
        log_trace(__CLASS__, __FUNCTION__);

        $page_heading = 'Create Category';
        $page_title = $page_heading;

        if ( ! empty($category_id))
        {
            $this->category_model->set_id($category_id);
            $category_object = $this->category_model->retrieve();

            $this->category_form->set_enabled($category_object->get_enabled());
            $this->category_form->set_id($category_object->get_id());
            $this->category_form->set_name($category_object->get_name());
            $this->category_form->set_slug($category_object->get_slug());

            $page_heading = "Edit Category";
            $page_title = $page_heading;
        }

        $data['category'] = $this->category_form;
        $data['page_heading'] = $page_heading;
        $data['page_title'] = $page_title;
        $this->parser->parse('backend/category/form', $data);
    }

    public function index()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $data['categories'] = $this->category_model->lists();
        $data['page_title'] = 'Category';
        $this->parser->parse('backend/category/main', $data);
    }

    private function is_valid($variable)
    {
        if (empty($variable))
        {
            log_error('INPUT ERROR, delete the category that category input is empty');
            return FALSE;
        }

        // can't use is_int(), because input is "1" when is_int it's will false.
        if (intval($variable) <= 0)
        {
            log_error('INPUT ERROR, delete the category that category input is not integer ' . $variable);
            return FALSE;
        }

        return TRUE;
    }

    public function save()
    {
        log_trace(__CLASS__, __FUNCTION__);

        if ($this->category_form->is_valid())
        {
            $this->category_form->input_post($this->input->post(NULL, TRUE));

            if ($this->category_form->get_id() == '')
            {
                $this->category_model->create($this->category_form);
            }
            else
            {
                $this->category_model->update($this->category_form);
            }

            redirect('backend/category');
        }
        else
        {
            $this->category_form->repopulate();

            $data['category'] = $this->category_form;
            $data['page_heading'] = "Save Category Error";
            $data['page_title'] = $data['page_heading'];
            $data['validation_errors'] = validation_errors();

            $this->parser->parse('backend/category/form', $data);
        }
    }
}

/* End of file category.php */
/* Location: ./application/controllers/backend/category.php */