<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Content extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('content_model');
    }

    function index()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $content = $this->content_model->get_info(1);
        $this->data['banner'] = $content->banner;

        if ($this->input->post('btnUpdateBanner'))
        {
            $config['upload_path'] = './public/images';
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG';
            $this->load->library("upload", $config);
            if ($this->upload->do_upload('img'))
            {
                $file_data = $this->upload->data();
                $data['banner'] = $file_data['file_name'];
                if ($this->content_model->update(1, $data))
                {
                    $this->session->set_flashdata('message', 'Cập nhật thành công');
                    unlink('./public/images/' . $content->banner);
                    redirect(base_url('admin/content'));
                }
                else
                {
                    $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
                }
            }
            else
            {
                $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
            }
        }

        $this->data['temp'] = 'admin/content/index';
        $this->load->view('admin/layout', $this->data);
    }

}