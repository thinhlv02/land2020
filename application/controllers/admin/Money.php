<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Money extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('money_model');
    }

    function index()
    {
        $date = date('Y-m-d');
        $firstday = date('Y-m-d', strtotime(getFirstLastMonth(1, $date)));
        $lastday = date('Y-m-d', strtotime(getFirstLastMonth(2, $date)));
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $input['where'] = [];

        if ($this->input->post('btnAddSearch'))
        {
            $txtDate = trim($this->input->post('daterange'));
            $txtDateExp = explode(' - ', $txtDate);

            $firstday = date('Y-m-d', strtotime(str_replace('/', '-', $txtDateExp[0])));
            $lastday = date('Y-m-d', strtotime(str_replace('/', '-', $txtDateExp[1])));

        }

        $input['where'] = array(
            'created_at >=' => $firstday,
            'created_at <=' => $lastday
        );

        $input['order'] = array('id', 'desc');
        $money_lost_end = $this->money_model->get_list($input);

        $this->data['money_lost'] = $money_lost_end;

        $this->data['firstday'] = $firstday;
        $this->data['lastday'] = $lastday;
        $this->data['tab'] = 1;
        $this->data['lstAdmin'] = getListAdmin();
        $this->data['temp'] = 'admin/money/index';
        $this->data['view'] = 'admin/money/list';
        $this->load->view('admin/layout', $this->data);
    }

    function add()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        if ($this->input->post('btnAdd'))
        {
            $created_at = $this->input->post('created_at');
            $created_at = date('Y-m-d', strtotime($created_at));

            $price = str_replace(',', '', $this->input->post('txtPrice'));
            $price = (is_numeric($price) && $price > 0) ? $price : 0;

            $data = array(
                'name' => $this->input->post('txtName'),
                'description' => $this->input->post('txtDes'),
                'price' => $price,
                'created_at' => $created_at,
                'created_by' => $this->_uid
            );
            if ($this->money_model->create($data))
            {
                $this->session->set_flashdata('message', 'Thêm thành công');
                redirect(base_url('admin/money'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }

        }
        $this->data['tab'] = 2;
        $this->data['device_type'] = $this->_device_type;
        $this->data['temp'] = 'admin/money/index';
        $this->data['view'] = 'admin/money/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $money_lost = $this->money_model->get_info($id);
        if (!$money_lost)
        {
            redirect(base_url('admin/money'));
        }

        if ($this->input->post('btnEdit'))
        {
            $created_at = $this->input->post('created_at');
            $created_at = date('Y-m-d', strtotime($created_at));
            $price = str_replace(',', '', $this->input->post('txtPrice'));
            $price = (is_numeric($price) && $price > 0) ? $price : 0;
            $data = array(
                'name' => $this->input->post('txtName'),
                'price' => $price,
                'created_at' => $created_at,
                'description' => $this->input->post('txtDes'),
            );

            if ($this->money_model->update($id, $data))
            {
                $this->session->set_flashdata('message', 'Cập nhật thành công');
                redirect(base_url('admin/money'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }
        }
        $this->data['tab'] = 3;
        $this->data['money_lost'] = $money_lost;
//        var_dump($money_lost);
        $this->data['device_type'] = $this->_device_type;
        $this->data['temp'] = 'admin/money/index';
        $this->data['view'] = 'admin/money/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        $money_lost = $this->money_model->get_info($id);
        if ($money_lost)
        {
            $this->money_model->delete($id);
        }
        redirect(base_url('admin/money'));
    }

}