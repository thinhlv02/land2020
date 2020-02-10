<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Register extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('recruitment_model');
    }

    function index()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        if ($this->input->post('btnUpdateRecruitment'))
        {
            $google_form = $this->input->post('txtGoogleForm');
            $data_submit = array(
                'google_form' => $google_form,
            );
            if ($this->recruitment_model->update(1, $data_submit))
            {
                $this->session->set_flashdata('message', 'Chỉnh sửa thành công!');
            }
            else
            {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại!');
            }
        }
        $google_form = $this->recruitment_model->get_info(1)->google_form;
//        pre($google_form);
        $this->data['google_form'] = $google_form;
        $this->data['temp'] = 'admin/google_form';
        $this->load->view('admin/layout', $this->data);
    }
}