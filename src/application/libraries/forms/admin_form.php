<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Knutt
 *
 * An open source content management system.
 *
 * @package libraries/forms
 * @author Saroj Saengphongumphai
 * @copyright © 2013 Saroj Saengphongumphai
 * @license http://creativecommons.org/licenses/by-sa/3.0/
*/

// ------------------------------------------------------------------------

/**
 * Admin Form Class
 *
 * @package libraries/forms
 * @author Saroj Saengphongumphai
*/

class Admin_form {
    CONST CONFIRM_NEW_PASSWORD = 'confirm_new_password';
    CONST ID = 'id';
    CONST NEW_PASSWORD = 'new_password';
    CONST OLD_PASSWORD = 'old_password';
    CONST PASSWORD = 'password';
    CONST USERNAME = 'username';
    private $confirm_new_password;
    private $id;
    private $new_password;
    private $old_password;
    private $password;
    private $username;

    public function __construct($admin_object = NULL)
    {
        log_trace(__CLASS__, __FUNCTION__);

        if ( ! empty($admin_object))
        {
            $this->set_id($admin_object->get_id());
            $this->set_username($admin_object->get_username());
        }
    }

    public function get_login_rules()
    {
        $password = array(
                        'field' => self::PASSWORD,
                        'label' => 'Password',
                        'rules' => 'trim|required');
        $username = array(
                        'field' => self::USERNAME,
                        'label' => 'Username',
                        'rules' => 'trim|required|callback__authenticate');

        return array($password, $username);
    }

    public function get_update_rules()
    {
        $confirm_new_password = array(
                        'field' => self::CONFIRM_NEW_PASSWORD,
                        'label' => 'Confirm New Password',
                        'rules' => 'trim|required|matches[' . self::NEW_PASSWORD . ']');
        $new_password = array(
                        'field' => self::NEW_PASSWORD,
                        'label' => 'New Password',
                        'rules' => 'trim|required');
        $old_password = array(
                        'field' => self::OLD_PASSWORD,
                        'label' => 'Old Password',
                        'rules' => 'trim|required|callback__check_old_password');

        return array($old_password, $confirm_new_password, $new_password);
    }

    public function input_post($post)
    {
        if ( ! empty($post[self::CONFIRM_NEW_PASSWORD]))
        {
            $this->set_confrim_new_password($post[self::CONFIRM_NEW_PASSWORD]);
        }

        if ( ! empty($post[self::ID]))
        {
            $this->set_id($post[self::ID]);
        }

        if ( ! empty($post[self::NEW_PASSWORD]))
        {
            $this->set_new_password($post[self::NEW_PASSWORD]);
        }

        if ( ! empty($post[self::OLD_PASSWORD]))
        {
            $this->set_old_password($post[self::OLD_PASSWORD]);
        }

        if ( ! empty($post[self::PASSWORD]))
        {
            $this->set_password($post[self::PASSWORD]);
        }

        if ( ! empty($post[self::USERNAME]))
        {
            $this->set_username($post[self::USERNAME]);
        }
    }

    public function is_valid_login()
    {
        $CI = &get_instance();
        $CI->form_validation->set_rules($this->get_login_rules());
        return $CI->form_validation->run();
    }

    public function is_valid_update()
    {
        $CI = &get_instance();
        $CI->form_validation->set_rules($this->get_update_rules());
        return $CI->form_validation->run();
    }

    public function repopulate()
    {
        $this->set_id(set_value(self::ID));
        $this->set_username(set_value(self::USERNAME));
    }

    public function get_confirm_new_password()
    {
        return $this->confirm_new_password;
    }

    public function get_id()
    {
        return $this->id;
    }

    public function get_new_password()
    {
        return $this->new_password;
    }

    public function get_old_password()
    {
        return $this->old_password;
    }

    public function get_password()
    {
        return $this->password;
    }

    public function get_username()
    {
        return $this->username;
    }

    public function set_confrim_new_password($confirm_new_password)
    {
        $this->confirm_new_password = $confirm_new_password;
    }

    public function set_id($id)
    {
        $this->id = $id;
    }

    public function set_new_password($new_password)
    {
        $this->new_password = $new_password;
    }

    public function set_old_password($old_password)
    {
        $this->old_password = $old_password;
    }

    public function set_password($password)
    {
        $this->password = $password;
    }

    public function set_username($username)
    {
        $this->username = $username;
    }
}

/* End of file admin_form.php */
/* Location: ./libraries/forms/admin_form.php */