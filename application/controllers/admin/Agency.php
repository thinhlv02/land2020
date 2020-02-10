<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Agency extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('agency_model');
    }

    function index()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $agencies = $this->agency_model->get_list();
        $this->data['agencies'] = $agencies;
        $this->data['tab'] = 1;
        $this->data['temp'] = 'admin/agency/index';
        $this->data['view'] = 'admin/agency/list';
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
                'address' => $this->input->post('txtAddress'),
            );
            if ($this->agency_model->create($data))
            {
                $this->session->set_flashdata('message', 'Thêm thành công');
                redirect(base_url('admin/agency'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }
        }
        $this->data['tab'] = 2;
        $this->data['temp'] = 'admin/agency/index';
        $this->data['view'] = 'admin/agency/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $agency = $this->agency_model->get_info($id);
        if (!$agency)
        {
            redirect(base_url('admin/agency'));
        }

        if ($this->input->post('btnEdit'))
        {
            $data = array(
                'name' => $this->input->post('txtName'),
                'phone' => $this->input->post('txtPhone'),
                'address' => $this->input->post('txtAddress'),
            );
            if ($this->agency_model->update($id, $data))
            {
                $this->session->set_flashdata('message', 'Cập nhật thành công');
                redirect(base_url('admin/agency'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }
        }
        $this->data['tab'] = 3;
        $this->data['agency'] = $agency;
        $this->data['temp'] = 'admin/agency/index';
        $this->data['view'] = 'admin/agency/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        $agency = $this->agency_model->get_info($id);
        if ($agency)
        {
            $this->agency_model->delete($id);
            $this->session->set_flashdata('message', 'Xoá thành công');
        }
        redirect(base_url('admin/agency'));
    }

    function highlight()
    {
        $id = $_POST['id'];
        $news = $this->news_model->get_info($id);
        $res = array("status" => 0);
        if ($news)
        {
            $res['status'] = 1;
            $dataSubmit = array();
            if ($news->highlight)
            {
                $res['class'] = 'fa-toggle-off';
                $dataSubmit['highlight'] = 0;
            }
            else
            {
                $res['class'] = 'fa-toggle-on';
                $dataSubmit['highlight'] = 1;
            }
            $this->news_model->update($id, $dataSubmit);
        }
        echo json_encode($res);
    }
}