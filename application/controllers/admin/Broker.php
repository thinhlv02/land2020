<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Broker extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('broker_model');
    }

    function index()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $agencies = $this->broker_model->get_list();
        $this->data['agencies'] = $agencies;
        $this->data['tab'] = 1;
        $this->data['temp'] = 'admin/broker/index';
        $this->data['view'] = 'admin/broker/list';
        $this->load->view('admin/layout', $this->data);
    }

    function add()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        if ($this->input->post('btnAdd'))
        {
            $data = array(
                'name' => $this->input->post('txtName'),
                'phone' => $this->input->post('txtPhone'),
                'email' => $this->input->post('txtEmail'),
                'area' => $this->input->post('txtArea'),
                'address' => $this->input->post('txtAddress'),
                'intro' => $this->input->post('txtIntro'),
            );
            if ($this->broker_model->create($data))
            {
                $this->session->set_flashdata('message', 'Thêm thành công');
                redirect(base_url('admin/broker'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }
        }
        $this->data['tab'] = 2;
        $this->data['temp'] = 'admin/broker/index';
        $this->data['view'] = 'admin/broker/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $agency = $this->broker_model->get_info($id);
        if (!$agency)
        {
            redirect(base_url('admin/broker'));
        }

        if ($this->input->post('btnEdit'))
        {
            $data = array(
                'name' => $this->input->post('txtName'),
                'phone' => $this->input->post('txtPhone'),
                'email' => $this->input->post('txtEmail'),
                'area' => $this->input->post('txtAddress'),
                'address' => $this->input->post('txtAddress'),
                'intro' => $this->input->post('txtIntro'),
            );
            if ($this->broker_model->update($id, $data))
            {
                $this->session->set_flashdata('message', 'Cập nhật thành công');
                redirect(base_url('admin/broker'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }
        }
        $this->data['tab'] = 3;
        $this->data['agency'] = $agency;
        $this->data['temp'] = 'admin/broker/index';
        $this->data['view'] = 'admin/broker/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        $agency = $this->broker_model->get_info($id);
        if ($agency)
        {
            $this->broker_model->delete($id);
            $this->session->set_flashdata('message', 'Xoá thành công');
        }
        redirect(base_url('admin/broker'));
    }

}