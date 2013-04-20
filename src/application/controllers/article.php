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
 * Article Controller Class
 *
 * @package controllers
 * @author Saroj Saengphongumphai
*/

class Article extends Solid_Controller {

    public function __construct()
    {
        parent::__construct();

        log_trace(__CLASS__, __FUNCTION__);

        $this->load->data_object('article_object');
        $this->load->library('pagination');
        $this->load->model('article_model');
        $this->load->model('category_model');
    }

    public function index($slug = '')
    {
        log_trace(__CLASS__, __FUNCTION__);

        $page_title = $this->lang->line('site_title');

        $this->category_model->order_by_name_asc();
        $this->category_model->set_enable();
        $categories = $this->category_model->lists();

        $data['categories'] = $categories;

        $this->article_model->limit($this->config->item('frontend_article_per_page'));
        $this->article_model->order_by_created_desc();
        $this->article_model->set_enable();

        if ( ! empty($slug))
        {
            // $slug must be decoded with urldecode function, to prevent the non-English slug not found
            $this->article_model->set_slug(urldecode($slug));
            $article = $this->article_model->retrieve();

            if ( ! empty($article))
            {
                $page_title = $article->get_headline() . ' - ' . $page_title;

                $data['article'] = $article;
                $data['page_title'] = $page_title;
                $this->parser->parse('article/single', $data);
            }
            else
            {
                show_404();
            }
        }
        else
        {
            $articles = $this->article_model->lists();

            if (empty($articles))
            {
                $pagination = '';
            }
            else
            {
                $this->article_model->set_enable();
                $total_rows = $this->article_model->count();
                $pagination = $this->pagination($total_rows);
            }

            $data['articles'] = $articles;
            $data['page_title'] = $page_title;
            $data['pagination'] = $pagination;
            $this->parser->parse('article/index', $data);
        }
    }

    public function page($page)
    {
        log_trace(__CLASS__, __FUNCTION__);

        $page_title = $this->config->item('site_title');

        $this->category_model->order_by_name_asc();
        $this->category_model->set_enable();
        $categories = $this->category_model->lists();

        $data['categories'] = $categories;

        $this->article_model->limit($this->config->item('frontend_article_per_page')
                        , ($page - 1) * $this->config->item('frontend_article_per_page'));
        $this->article_model->order_by_created_desc();
        $this->article_model->set_enable();
        $articles = $this->article_model->lists();

        if (empty($articles))
        {
            $data['pagination'] = '';
        }
        else
        {
            $page_title = $this->lang->line('page_at_title_bar') . " $page - $page_title";

            $this->article_model->set_enable();
            $total_rows = $this->article_model->count();
            $data['pagination'] = $this->pagination($total_rows);
        }

        $data['articles'] = $articles;
        $data['page_title'] = $page_title;
        $this->parser->parse('article/index', $data);
    }

    private function pagination($total_rows)
    {
        $config['base_url'] = base_url('page');
        $config['first_url'] = 1;
        $config['num_links'] = 5;
        $config['per_page'] = $this->config->item('frontend_article_per_page');
        $config['total_rows'] = $total_rows;
        $config['uri_segment'] = 2;
        $config['use_page_numbers'] = TRUE;

        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }
}

/* End of file article.php */
/* Location: ./application/controllers/article.php */