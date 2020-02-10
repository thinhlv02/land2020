<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Dashboard extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('gmail_model');
        $this->load->model('bank_model');
    }

    function index()
    {
        $lstData = $this->gmail_model->get_list();
        $this->data['lstData'] = $lstData;

        //bank
        $lstbank = $this->bank_model->get_list(array('where' => array('id < ' => '5'), 'order' => array('id', 'asc')));
        $this->data['lstBank'] = $lstbank;
        //bank

//        var_dump($lstData);
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['temp'] = 'admin/dashboard';
        $this->load->view('admin/layout', $this->data);
    }

}