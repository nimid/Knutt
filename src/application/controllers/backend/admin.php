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
 * Admin Controller Class
 *
 * @package controllers/backend
 * @author Saroj Saengphongumphai
*/

require_once APPPATH . 'controllers/backend/backend.php';

class Admin extends Backend {

    public function __construct()
    {
        parent::__construct();

        log_trace(__CLASS__, __FUNCTION__);

        $this->load->data_object('admin_object');
        $this->load->form('admin_form');
        $this->load->library('form_validation');
        $this->load->model('admin_model');
        $this->load->session('admin_session');
    }

    public function _check_old_password()
    {
        if ($this->admin_model->is_valid_current_password(
                $this->admin_session->get_id(), $this->admin_form->get_old_password()))
        {
            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('_check_old_password', 'Old Password is invalid.');
            return FALSE;
        }
    }

    public function form()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $page_heading = 'Change Password';
        $page_title = $page_heading;

        $data['page_heading'] = $page_heading;
        $data['page_title'] = $page_title;
        $this->parser->parse('backend/admin/form', $data);
    }

    public function save()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->admin_form->input_post($this->input->post(NULL, TRUE));

        if ($this->admin_form->is_valid_update())
        {
            $this->admin_form->set_id($this->admin_session->get_id());
            $this->admin_model->update($this->admin_form);
            redirect('backend/admin/form');
        }
        else
        {
            $data['validation_errors'] = validation_errors();
        }

        $data['admin'] = $this->admin_form;
        $data['page_heading'] = 'Change Password';
        $data['page_title'] = 'Change Password';
        $this->parser->parse('backend/admin/form', $data);
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/backend/admin.php */