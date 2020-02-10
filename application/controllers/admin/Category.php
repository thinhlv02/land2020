<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


Class Category extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('category_model');
    }

    function index()
    {
        $questions = $this->category_model->get_list(array('where' => array('type' => 1), 'order' => array('id', 'asc')));
//        pre($questions);
        $this->data['tab'] = 1;
        $this->data['ads_type'] = $this->_ads_type;
        $this->data['questions'] = $questions;
        $this->data['temp'] = 'admin/category/index';
        $this->data['view'] = 'admin/category/question';
        $this->load->view('admin/layout', $this->data);
    }

    function get_list_by_type()
    {
        $type = intval($_POST['type']);
        $questions = $this->category_model->get_list(array('where' => array('type' => $type)));
        $this->data['questions'] = $questions;
        $this->load->view('admin/category/table_question', $this->data);
    }

    function add()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['tab'] = 2;
        if ($this->input->post('btnAdd')) {
            $data_submit = array(
                'name' => $this->input->post('txtName'),
                'content' => '',
                'type' => intval($this->input->post('slType')),
            );
            if ($this->category_model->create($data_submit)) {
                $this->session->set_flashdata('message', 'Thêm thành công!');
                redirect(base_url('admin/category'));
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại!');
                redirect(base_url('admin/category/add'));
            }
        }
        $this->data['ads_type'] = $this->_ads_type;
        $this->data['temp'] = 'admin/category/index';
        $this->data['view'] = 'admin/category/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $question = $this->category_model->get_info($id);
        if (!$question) {
            redirect(admin_url('category'));
        }

        $questions = $this->category_model->get_list(array('where' => array('id' => $question->id)));
        $this->data['questions'] = $questions;
        $this->data['view'] = 'admin/category/edit_level_1';


        if ($this->input->post('btnEditLevel1')) {
            $data_submit = array(
                'name' => $this->input->post('txtName'),
                'routes' => $this->input->post('txtRoutes'),
            );
            if ($this->category_model->update($id, $data_submit)) {
                $this->session->set_flashdata('message', 'Cập nhật thành công!');
                redirect(base_url('admin/category/edit/' . $id));
            } else {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại!');
                redirect(base_url('admin/category/edit/' . $id));
            }
        }

        $this->data['tab'] = 3;
        $this->data['question'] = $question;
        $this->data['temp'] = 'admin/category/index';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
//        pre(1);
        $id = $this->uri->segment(4);
        $question = $this->category_model->get_info($id);
        if (!$question) {
            redirect(admin_url('category'));
        }
        $this->category_model->delete($id);
        $this->session->set_flashdata('message', 'Xoá thành công!');

        redirect(admin_url('category'));
    }
}