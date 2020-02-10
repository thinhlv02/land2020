<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Price extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('price_model');
    }

    function index()
    {
        $product = $this->price_model->get_list();
        $this->data['tab'] = 1;
        $this->data['product'] = $product;
        $this->data['temp'] = 'admin/price/index';
        $this->data['view'] = 'admin/price/product';
        $this->load->view('admin/layout', $this->data);
    }

    function add()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $this->data['tab'] = 2;
        if ($this->input->post('btnAddProduct'))
        {


            $data_submit = array(
                'name' => $this->input->post('txtName'),
                'content' => $this->input->post('txtContent'),
                'intro' => $this->input->post('txtIntro'),
            );
            if ($this->price_model->create($data_submit))
            {
                $this->session->set_flashdata('message', 'Đăng bài thành công!');
                redirect(base_url('admin/price/add'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại!');
                redirect(base_url('admin/price/add'));
            }

        }
        $this->data['temp'] = 'admin/price/index';
        $this->data['view'] = 'admin/price/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $product = $this->price_model->get_info($id);
        if (!$product)
        {
            echo 'Đường dẫn không đúng!';
            return;
        }
        if ($this->input->post('btnEditProduct'))
        {
            $data_submit = array(
                'name' => $this->input->post('txtName'),
                'content' => $this->input->post('txtContent'),
                'intro' => $this->input->post('txtIntro'),
            );

            $config['upload_path'] = './public/images/products';
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG';
            $this->load->library("upload", $config);
            if ($this->upload->do_upload('img_product'))
            {
                $file_data = $this->upload->data();
                $data_submit['img'] = $file_data['file_name'];
            }
            else
            {
                $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
            }
            if ($this->price_model->update($id, $data_submit))
            {
                $this->session->set_flashdata('message', 'Cập nhật thành công!');
                redirect(base_url('admin/price/edit/' . $id));
            }
            else
            {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại!');
                redirect(base_url('admin/price/edit/' . $id));
            }
        }
        $this->data['product'] = $product;
        $this->data['tab'] = 3;
        $this->data['temp'] = 'admin/price/index';
        $this->data['view'] = 'admin/price/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        if ($this->price_model->get_info($id))
        {
            $this->price_model->delete($id);
            redirect(base_url('admin/price'));
        }
        else
        {
            redirect(base_url('admin/price'));
        }
    }
}