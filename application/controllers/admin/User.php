<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class User extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
    }

    function index()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $input = array();
        $input['order'] = array('id', 'desc');
        $devices = $this->user_model->get_list($input);

        $this->data['customers'] = $devices;
        $this->data['device_type'] = $this->_device_type;
        $this->data['tab'] = 1;
        $this->data['temp'] = 'admin/user/index';
        $this->data['view'] = 'admin/user/list';
        $this->load->view('admin/layout', $this->data);
    }

    function add()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        if ($this->input->post('btnAdd'))
        {

            $data = array(
                'username' => $this->input->post('txtName'),
                'fullname' => $this->input->post('txtFullName'),
                'phone' => $this->input->post('txtPhone'),
                'password' => md5($this->input->post('txtPassword')),
                'password_txt' => $this->input->post('txtPassword')
            );

            if ($this->user_model->create($data))
            {
                $this->session->set_flashdata('message', 'Thêm thành công');
                redirect(base_url('admin/user'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }

        }
        $this->data['tab'] = 2;
        $this->data['device_type'] = $this->_device_type;
        $this->data['temp'] = 'admin/user/index';
        $this->data['view'] = 'admin/user/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $devices = $this->user_model->get_info($id);
        if (!$devices)
        {
            redirect(base_url('admin/user'));
        }

        if ($this->input->post('btnEdit'))
        {
            $data = array(
                'username' => $this->input->post('txtName'),
                'fullname' => $this->input->post('txtFullName'),
                'phone' => $this->input->post('txtPhone'),
                'password' => md5($this->input->post('txtPassword')),
                'password_txt' => $this->input->post('txtPassword')
            );

            if ($this->user_model->update($id, $data))
            {
                $this->session->set_flashdata('message', 'Cập nhật thành công');
                redirect(base_url('admin/user'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }
        }
        $this->data['tab'] = 3;
        $this->data['devices'] = $devices;
//        var_dump($devices);
        $this->data['device_type'] = $this->_device_type;
        $this->data['temp'] = 'admin/user/index';
        $this->data['view'] = 'admin/user/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        $devices = $this->user_model->get_info($id);
        if ($devices)
        {
            $this->user_model->delete($id);
        }
        redirect(base_url('admin/user'));
    }

}