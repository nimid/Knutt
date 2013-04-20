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
 * Admin Model Class
 *
 * @package models
 * @author Saroj Saengphongumphai
*/

class Admin_model extends CI_Model {
    CONST TABLE_NAME = 'administrator';

    public function __construct()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->load->library('encrypt');
        $this->load->library('data_objects/admin_object');
        $this->load->library('forms/admin_form');
    }

    public function is_valid_current_password($id, $password)
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->db->where('id', $id);
        $query = $this->db->get(self::TABLE_NAME);

        if ($query->num_rows() == 0)
        {
            return FALSE;
        }

        $row = $query->row();

        if ($password === $this->encrypt->decode($row->password))
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function login($admin)
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->db->where('enabled', '1');
        $this->db->where('username', $admin->get_username());
        $query = $this->db->get(self::TABLE_NAME);

        if ($query->num_rows() != 1)
        {
            log_error('login with invalid username: ' . $admin->get_username());
            return FALSE;
        }

        $row = $query->row();

        if ($admin->get_password() === $this->encrypt->decode($row->password))
        {
            $this->db->set('last_login', 'NOW()', FALSE);
            $this->db->where('id', $row->id);
            $this->db->update(self::TABLE_NAME);

            return TRUE;
        }
        else
        {
            log_error('login with invalid password');
            return FALSE;
        }
    }

    public function retrieve()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $query = $this->db->get(self::TABLE_NAME);
        $result = $query->result();

        if (empty($result))
        {
            return NULL;
        }
        else
        {
            $row = $result[0];

            $admin = new Admin_object();
            $admin->set_id($row->id);
            $admin->set_username($row->username);

            return $admin;
        }
    }

    public function set_id($id)
    {
        $this->db->where(self::TABLE_NAME . '.' . 'id', $id);
    }

    public function set_username($username)
    {
        $this->db->where(self::TABLE_NAME . '.' . 'username', $username);
    }

    public function update($admin)
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->db->set('password', $this->encrypt->encode($admin->get_new_password()));
        $this->db->where('id', $admin->get_id());
        $this->db->update(self::TABLE_NAME);
    }
}

/* End of file admin_model.php */
/* Location: ./application/models/admin_model.php */