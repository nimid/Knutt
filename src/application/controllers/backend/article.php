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
 * Article Controller Class
 *
 * @package controllers/backend
 * @author Saroj Saengphongumphai
*/

require_once APPPATH . 'controllers/backend/backend.php';

class Article extends Backend {

    public function __construct()
    {
        parent::__construct();

        log_trace(__CLASS__, __FUNCTION__);

        $this->load->data_object('article_object');
        $this->load->form('article_form');
        $this->load->library('form_validation');
        $this->load->model('article_model');
        $this->load->model('category_model');
    }

    private function create($article_form)
    {
    	log_trace(__CLASS__, __FUNCTION__);

        $this->article_model->create($article_form);

        if ($article_form->get_category() != '')
        {
            $this->category_model->update_number_of_article($article_form->get_category());
        }
    }

    public function delete($article_id)
    {
        log_trace(__CLASS__, __FUNCTION__);

        if ( ! empty($article_id))
        {
	        $this->article_model->set_id($article_id);
	        $article_object = $this->article_model->retrieve();

	        $this->article_model->delete($article_id);

	        if ($article_object->get_category_id() != '')
	        {
	        	$this->category_model->update_number_of_article($article_object->get_category_id());
	        }
        }

        redirect('backend/article');
    }

    public function form($article_id = '')
    {
        log_trace(__CLASS__, __FUNCTION__);

        $page_heading = 'Create Article';
        $page_title = $page_heading;

        if ( ! empty($article_id))
        {
            $this->article_model->set_id($article_id);
            $article_object = $this->article_model->retrieve();
            $this->article_form = new Article_form($article_object);

            $page_heading = 'Edit Article';
            $page_title = $page_heading . ' ID: '. $article_id;
        }

        $data['article'] = $this->article_form;
        $data['page_heading'] = $page_heading;
        $data['page_title'] = $page_title;
        $this->parser->parse('backend/article/form', $data);
    }

    public function index()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $data['articles'] = $this->article_model->lists();
        $data['page_title'] = 'Article';

        $this->parser->parse('backend/article/main', $data);
    }

    public function save()
    {
        log_trace(__CLASS__, __FUNCTION__);

        if ($this->article_form->is_valid())
        {
            $this->article_form->input_post($this->input->post(NULL, TRUE));

            if ($this->article_form->get_id() == '')
            {
                $this->create($this->article_form);
            }
            else
            {
                $this->update($this->article_form);
            }

            redirect('backend/article');
        }
        else
        {
            $this->article_form->repopulate();

            $data['article'] = $this->article_form;
            $data['page_heading'] = "Create Article";
            $data['page_title'] = "Save Article Error";
            $data['validation_errors'] = validation_errors();

            $this->parser->parse('backend/article/form', $data);
        }
    }

    private function update($article_form)
    {
        $this->article_model->set_id($article_form->get_id());
        $old_article = $this->article_model->retrieve();

        $this->article_model->update($article_form);

        if ($old_article->get_category_id() != '')
        {
            $this->category_model->update_number_of_article($old_article->get_category_id());
        }

        if ($article_form->get_category() != '')
        {
            $this->category_model->update_number_of_article($article_form->get_category());
        }
    }
}

/* End of file article.php */
/* Location: ./application/controllers/backend/article.php */