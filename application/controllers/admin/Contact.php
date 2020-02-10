<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


Class Contact extends MY_Controller
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
        if ($this->input->post('btnUpdateContact'))
        {
            $company = $this->input->post('txtCompany');
            $phone = $this->input->post('txtPhone');
            $address = $this->input->post('txtAddress');
            $slogan = $this->input->post('txtSlogan');
            $slogan_en = $this->input->post('txtSloganEn');
//            $zalo = $this->input->post('txtZalo');
            $email = $this->input->post('txtEmail');
            if ($phone && $address)
            {
                $contact_submit = array(
                    'company' => $company,
                    'phone' => $phone,
                    'address' => $address,
                    'email' => $email,
                    'slogan' => $slogan,
                    'slogan_en' => $slogan_en,
                );
                $this->contact_model->update(1, $contact_submit);
                $this->session->set_flashdata('message', 'Cập nhật thông tin thành công!');
                redirect(base_url('admin/contact'));
            }
        }
        $contact = $this->contact_model->get_info(1);
//        $contact = array(
//            'address' => 'Số 18, Lô 5, Đền Lừ 2, Tổ 44, Phường Hoàng văn Thụ, Quận Hoàng Mai, Thành Phố Hà Nội',
//            'office' => 'Tầng 3, Số 206, đường Đê La Thành, P. Thổ Quan, Q.Đống Đa, TP. Hà Nội.'
//        );
        $this->data['contact'] = $contact;
        $this->data['temp'] = 'admin/contact/contact';
        $this->load->view('admin/layout', $this->data);
    }

}