<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Feedback extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('comment_model');
        $this->load->model('product_model');
        $this->load->model('feedback_model');
    }

    function index()
    {
        $feedback = $this->feedback_model->get_list();
        $this->data['feedback'] = $feedback;
        $this->data['temp'] = 'admin/feedback';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        if ($this->feedback_model->get_info($id))
        {
            $this->feedback_model->delete($id);
            redirect(base_url('admin/feedback'));
        }
        else
        {
            redirect(base_url('admin/feedback'));
        }
    }
}