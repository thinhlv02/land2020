<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Login extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        //begin admarket2020.code

        $currUrl = removeAllTags($this->input->get('url'));
        // validate current url for redirect
        if ($currUrl != '')
        {
            // check is url
            if (isUrl($currUrl))
            {
                // check domain of url
                $currUrl = strtolower(getDomainFromUrl($currUrl)) == strtolower($_SERVER['HTTP_HOST']) ? $currUrl : '';

            }
            else
            {
                $currUrl = '';
            }
        }
        $currUrl = $currUrl != '' ? $currUrl : base_url('admin/dashboard');

        //End admarket2020.code

        $this->load->library('form_validation');
        $this->load->helper('form');
        if ($this->input->post())
        {
            $this->form_validation->set_rules('login', 'login', 'callback_check_login');
            if ($this->form_validation->run())
            {
                $this->session->set_userdata('login', true);

                redirect($currUrl);

            }
        }

        $this->load->view('admin/login');
    }

    /*
     * Kiem tra username va password co chinh xac khong
     */
    function check_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $password = md5($password);

        $this->load->model('admin_model');
        $where = array('username' => $username, 'password' => $password);
        if ($this->admin_model->check_exists($where))
        {
            $this->load->model('admin_model');
            $input = array();
            $input['where']['username'] = $username;
            $admin = $this->admin_model->get_list($input);
            $this->session->set_userdata('admin', $admin[0]);
            return true;

        }

        $this->form_validation->set_message(__FUNCTION__, ' <p style="color:red"> Login Failed. Please try again. </p>');

        return false;
    }
}