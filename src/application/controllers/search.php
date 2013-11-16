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
 * Search Controller Class
 *
 * @package controllers
 * @author Saroj Saengphongumphai
*/

class Search extends Solid_Controller {

    public function __construct()
    {
        parent::__construct();

        log_trace(__CLASS__, __FUNCTION__);

        $this->load->data_object('article_object');
        $this->load->library('pagination');
        $this->load->model('article_model');
        $this->load->model('category_model');
        $this->load->session('article_session');
    }

    public function index()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $search = $this->input->post('search', TRUE);
        $this->article_session->save_search_word($search);

        if (empty($search))
        {
            redirect('/');
        }

        $page_title = generate_page_title(array($search, lang('search_results')));

        $this->category_model->order_by_name_asc();
        $this->category_model->set_enable();
        $categories = $this->category_model->lists();

        $this->article_model->limit($this->config->item('frontend_article_per_page'));
        $this->article_model->order_by_created_desc();
        $this->article_model->set_enable();
        $this->article_model->search($search);
        $articles = $this->article_model->lists();

        if (empty($articles))
        {
            $pagination = '';
            $total_rows = 0;
        }
        else
        {
            $this->article_model->set_enable();
            $this->article_model->search($search);
            $total_rows = $this->article_model->count();
            $pagination = $this->pagination($total_rows);
        }

        $data['articles'] = $articles;
        $data['categories'] = $categories;
        $data['count_search_result'] = $total_rows;
        $data['page_title'] = $page_title;
        $data['pagination'] = $pagination;
        $data['search'] = $search;
        $this->parser->parse('article/search', $data);
    }

    public function page($page)
    {
        log_trace(__CLASS__, __FUNCTION__);

        $search = $this->article_session->get_search_word();

        if (empty($search))
        {
            redirect('/');
        }

        $page_title = generate_page_title(array($search, lang('search_results')));

        $this->category_model->order_by_name_asc();
        $this->category_model->set_enable();
        $categories = $this->category_model->lists();

        $this->article_model->limit($this->config->item('frontend_article_per_page')
                        , ($page - 1) * $this->config->item('frontend_article_per_page'));
        $this->article_model->order_by_created_desc();
        $this->article_model->set_enable();
        $this->article_model->search($search);
        $articles = $this->article_model->lists();

        if (empty($articles))
        {
            $pagination = '';
        }
        else
        {
            $this->article_model->set_enable();
            $this->article_model->search($search);
            $total_rows = $this->article_model->count();
            $pagination = $this->pagination($total_rows);
        }

        $data['articles'] = $articles;
        $data['categories'] = $categories;
        $data['count_search_result'] = $total_rows;
        $data['page_title'] = $page_title;
        $data['pagination'] = $pagination;
        $data['search'] = $search;
        $this->parser->parse('article/search', $data);
    }

    private function pagination($total_rows)
    {
        $config['base_url'] = base_url('search/page');
        $config['first_url'] = 1;
        $config['num_links'] = 5;
        $config['per_page'] = $this->config->item('frontend_article_per_page');
        $config['total_rows'] = $total_rows;
        $config['uri_segment'] = 3;
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }
}

/* End of file search.php */
/* Location: ./application/controllers/search.php */