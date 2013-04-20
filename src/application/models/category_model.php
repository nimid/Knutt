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
 * Category Model Class
 *
 * @package models
 * @author Saroj Saengphongumphai
*/

class Category_model extends CI_Model {
    CONST TABLE_NAME = 'category';

    public function __construct()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->load->library('data_objects/category_object');
        $this->load->library('forms/category_form');
        $this->load->model('article_model');
    }

    public function create($category)
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->db->set('enabled', $category->get_enabled());
        $this->db->set('name', $category->get_name());
        $this->db->set('slug', $category->get_slug());
        $this->db->insert(self::TABLE_NAME);
    }

    public function delete($category)
    {
        log_trace(__CLASS__, __FUNCTION__);

        if ( ! empty($category))
        {
            $this->db->where('id', $category);
            $this->db->delete(self::TABLE_NAME);

            $this->db->set('category', 0);
            $this->db->where('category', $category);
            $this->db->update($this->article_model->get_table_name());
        }
    }

    public function limit($value, $offset = '')
    {
        $this->db->limit($value, $offset);
    }

    public function lists()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $categories = NULL;
        $query = $this->db->get(self::TABLE_NAME);

        foreach ($query->result() as $row)
        {
            $category = new Category_object();

            $category->set_created($row->created);
            $category->set_enabled($row->enabled);
            $category->set_id($row->id);
            $category->set_name($row->name);
            $category->set_slug($row->slug);

            $categories[] = $category;
        }

        return $categories;
    }

    public function number_of_article_over_zero()
    {
        $this->db->where('number_of_article > ', 0);
    }

    public function order_by_name_asc()
    {
        $this->db->order_by('name', 'asc');
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

    public function set_disable()
    {
        $this->db->where(self::TABLE_NAME . '.enabled', '0');
    }

    public function set_enable()
    {
        $this->db->where(self::TABLE_NAME . '.enabled', '1');
    }

    public function set_id($id)
    {
        $this->db->where(self::TABLE_NAME . '.id', $id);
    }

    public function set_slug($slug)
    {
        $this->db->where(self::TABLE_NAME . '.slug', $slug);
    }

    public function update($category)
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->db->set('enabled', $category->get_enabled());
        $this->db->set('modified', 'NOW()', FALSE);
        $this->db->set('name', $category->get_name());
        $this->db->set('slug', $category->get_slug());
        $this->db->where('id', $category->get_id());
        $this->db->update(self::TABLE_NAME);
    }

    public function update_number_of_article($category_id)
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->article_model->set_category_id($category_id);
        $number_of_article = $this->article_model->count();

        $this->article_model->set_category_id($category_id);
        $this->article_model->set_enable();
        $number_of_enabled_article = $this->article_model->count();

        if ($number_of_enabled_article > 0)
        {
            $this->db->set('enabled', '1');
        }
        else
        {
            $this->db->set('enabled', '0');
        }

        $this->db->set('number_of_article', $number_of_article);
        $this->db->where('id', $category_id);
        $this->db->update(self::TABLE_NAME);
    }
}

/* End of file category_model.php */
/* Location: ./application/models/category_model.php */