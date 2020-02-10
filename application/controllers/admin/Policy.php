<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Policy extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('contact_model');
    }

    function index()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        if ($this->input->post('btnUpdate'))
        {
            $policy = $this->input->post('txtPolicy');
            $privacy = $this->input->post('txtPrivacy');
            $contact_submit = array(
                'policy' => $policy,
                'privacy' => $privacy,
            );
            $this->contact_model->update(1, $contact_submit);
            $this->session->set_flashdata('message', 'Cập nhật thông tin thành công!');
            redirect(base_url('admin/policy'));

        }
        $contact = $this->contact_model->get_info(1);
        $this->data['contact'] = $contact;
        $this->data['temp'] = 'admin/policy';
        $this->load->view('admin/layout', $this->data);
    }

}