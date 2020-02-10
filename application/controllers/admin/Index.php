<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Index extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
//        $this->load->model('event_model');
//        $this->load->model('notice_model');
//        $this->load->model('guide_model');
//        $this->load->model('redeem_model');
//        $this->load->model('intro_model');
//        $this->load->model('download_model');
    }

    function index()
    {
        $this->data['temp'] = 'admin/home';
        $this->load->view('admin/layout', $this->data);
    }

    function logout()
    {
//        pre('logout');
        $this->session->unset_userdata('admin');
        $this->session->unset_userdata('login');
        redirect(base_url('admin/login'));
    }
}