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
 * Admin Controller Class
 *
 * @package controllers
 * @author Saroj Saengphongumphai
*/

class Admin extends Solid_Controller {

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

    public function _authenticate()
    {
        $this->admin_form->input_post($this->input->post(NULL, TRUE));

        if ($this->admin_model->login($this->admin_form) === TRUE)
        {
            $this->admin_model->set_username($this->admin_form->get_username());
            $this->admin_object = $this->admin_model->retrieve();

            $this->admin_session->save($this->admin_object);

            return TRUE;
        }
        else
        {
            $this->form_validation->set_message('_authenticate', 'Login is invalid.');

            return FALSE;
        }
    }

    public function login()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $input = $this->input->post();

        if (empty($input))
        {
            $data['admin'] = $this->admin_form;
            $this->parser->parse('admin/login', $data);
        }
        else
        {
            if ($this->admin_form->is_valid_login())
            {
                redirect('backend/article');
            }
            else
            {
                $this->admin_form->repopulate();

                $data['admin'] = $this->admin_form;
                $data['validation_errors'] = validation_errors();

                $this->parser->parse('admin/login', $data);
            }
        }
    }

    public function logout()
    {
        log_trace(__CLASS__, __FUNCTION__);

        $this->admin_session->clear();
        redirect('/');
    }
}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */