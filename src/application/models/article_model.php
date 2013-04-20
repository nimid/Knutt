<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package models
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Article Model Class
 *
 * @package models
 * @author Saroj Saengphongumphai
*/

class Article_model extends CI_Model {
    CONST TABLE_NAME = 'article';

    public function __construct()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->load->library('data_objects/article_object');
        $this->load->library('forms/article_form');
    }

    public function count()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->db->select('COUNT(*) AS count', FALSE);
        $this->db->where('deleted', '0');
        $query = $this->db->get(self::TABLE_NAME);

        if ($query->num_rows() > 0)
        {
            $result = $query->result();
            $row = $result[0];
            return $row->count;
        }
        else
        {
            return 0;
        }
    }

    public function create($article)
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->db->set('body', $article->get_body());
        $this->db->set('category', $article->get_category());
        $this->db->set('enabled', $article->get_enabled());
        $this->db->set('headline', $article->get_headline());
        $this->db->set('slug', $article->get_slug());
        $this->db->set('tag', $article->get_tag());
        $this->db->insert(self::TABLE_NAME);

        if ($article->get_slug() == '')
        {
            $insert_id = $this->db->insert_id();

            $this->db->set('slug', $insert_id);
            $this->db->where('id', $insert_id);
            $this->db->update(self::TABLE_NAME);
        }
    }

    public function delete($article_id)
    {
        log_trace(__CLASS__, __FUNCTION__);

        if ( ! empty($article_id))
        {
            $this->db->set('deleted', '1');
            $this->db->where('id', $article_id);
            $this->db->update(self::TABLE_NAME);
        }
    }

    public function get_table_name()
    {
        return self::TABLE_NAME;
    }

    public function limit($value, $offset = '')
    {
        $this->db->limit($value, $offset);
    }

    public function lists()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $articles = NULL;

        $this->db->select(self::TABLE_NAME . '.*');
        $this->db->select('category.id as category_id');
        $this->db->select('category.name as category_name');
        $this->db->select('category.slug as category_slug');
        $this->db->join('category'
                        , self::TABLE_NAME . '.category = category.id'
                        , 'left');
        $this->db->where(self::TABLE_NAME . '.' . 'deleted', '0');

        $query = $this->db->get(self::TABLE_NAME);

        foreach ($query->result() as $row)
        {
            $article = new Article_object();

            $article->set_body($row->body);
            $article->set_category_id($row->category_id);
            $article->set_category_name($row->category_name);
            $article->set_category_slug($row->category_slug);
            $article->set_created($row->created);
            $article->set_enabled($row->enabled);
            $article->set_headline($row->headline);
            $article->set_id($row->id);
            $article->set_slug($row->slug);
            $article->set_tag($row->tag);

            $articles[] = $article;
        }

        return $articles;
    }

    public function order_by_created_desc()
    {
        $this->db->order_by('created', 'desc');
    }

    public function retrieve()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $result = $this->lists();

        if (empty($result))
        {
            return NULL;
        }
        else
        {
            return $result[0];
        }
    }

    public function search($search)
    {
        $where = "(`headline` LIKE '%" . $this->db->escape_like_str($search) . "%'
                        OR `body` LIKE '%" . $this->db->escape_like_str($search) . "%')";
        $this->db->where($where);
    }

    public function set_category_enable()
    {
        $this->db->where('category.enabled', '1');
    }

    public function set_category_id($category_id)
    {
        $this->db->where(self::TABLE_NAME . '.' . 'category', $category_id);
    }

    public function set_enable()
    {
        $this->db->where(self::TABLE_NAME . '.' . 'enabled', '1');
    }

    public function set_headline($headline)
    {
        $this->db->like(self::TABLE_NAME . '.' . 'headline', $headline);
    }

    public function set_id($id)
    {
        $this->db->where(self::TABLE_NAME . '.' . 'id', $id);
    }

    public function set_slug($slug)
    {
        $this->db->where(self::TABLE_NAME . '.' . 'slug', $slug);
    }

    public function update($article)
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->db->set('body', $article->get_body());
        $this->db->set('category', $article->get_category());
        $this->db->set('enabled', $article->get_enabled());
        $this->db->set('headline', $article->get_headline());
        $this->db->set('modified', 'NOW()', FALSE);
        $this->db->set('slug', $article->get_slug());
        $this->db->set('tag', $article->get_tag());

        $this->db->where('id', $article->get_id());

        $this->db->update(self::TABLE_NAME);
    }
}

/* End of file article_model.php */
/* Location: ./application/models/article_model.php */