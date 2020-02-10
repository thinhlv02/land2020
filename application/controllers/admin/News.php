<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class News extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('news_model');
    }

    function index()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $input = array();
        $input['order'] = array('highlight', 'desc');
        $news = $this->news_model->get_list($input);
        $this->data['news'] = $news;
        $this->data['tab'] = 1;
        $this->data['temp'] = 'admin/news/index';
        $this->data['view'] = 'admin/news/list';
        $this->load->view('admin/layout', $this->data);
    }

    function add()
    {
        $lstProvince = $this->_province;
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        if ($this->input->post('btnAdd'))
        {
            $config['upload_path'] = './public/images/news';
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG';
            $this->load->library("upload", $config);
            if ($this->upload->do_upload('img_news'))
            {
                $file_data = $this->upload->data();
                $data = array(
                    'name' => $this->input->post('txtName'),
                    'intro' => $this->input->post('txtIntro'),
                    'content' => $this->input->post('txtContent'),
                    'province_id' => $this->input->post('province'),
                    'document_title' => $this->input->post('txtName'),
//                    'meta_description' => $this->input->post('txtMetaDescription'),
//                    'meta_keywords' => $this->input->post('txtMetaKeywords'),
//                    'canonical_url' => $this->input->post('txtCanonicalUrl'),
//                    'robots_meta' => implode(', ',$this->input->post('robots_meta')),
                    'img' => $file_data['file_name'],
                );
                if ($this->news_model->create($data))
                {
                    $this->session->set_flashdata('message', 'Thêm tin tức thành công');
                    redirect(base_url('admin/news'));
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
        $this->data['lstProvince'] = $lstProvince;
        $this->data['tab'] = 2;
        $this->data['temp'] = 'admin/news/index';
        $this->data['view'] = 'admin/news/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $lstProvince = $this->_province;
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $news = $this->news_model->get_info($id);
        if (!$news)
        {
            redirect(base_url('admin/news'));
        }

        if ($this->input->post('btnEdit'))
        {
            $data = array(
                'name' => $this->input->post('txtName'),
                'intro' => nl2br($this->input->post('txtIntro')),
                'content' => $this->input->post('txtContent'),
                'province_id' => $this->input->post('province'),
                'document_title' => $this->input->post('txtName'),
//                'meta_description' => $this->input->post('txtMetaDescription'),
//                'meta_keywords' => $this->input->post('txtMetaKeywords'),
//                'canonical_url' => $this->input->post('txtCanonicalUrl'),
//                'robots_meta' => implode(', ',$this->input->post('robots_meta')),
            );

            $config['upload_path'] = './public/images/news';
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG';
            $this->load->library("upload", $config);
            if ($this->upload->do_upload('img_news'))
            {
                $file_data = $this->upload->data();
                $data['img'] = $file_data['file_name'];
                unlink('./public/images/news/' . $news->img);
            }
            else
            {
                $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
            }
            if ($this->news_model->update($id, $data))
            {
                $this->session->set_flashdata('message', 'Cập nhật tin tức thành công');
                redirect(base_url('admin/news'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }
        }
        $this->data['lstProvince'] = $lstProvince;
        $this->data['tab'] = 3;
        $this->data['news'] = $news;
        $this->data['temp'] = 'admin/news/index';
        $this->data['view'] = 'admin/news/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        $news = $this->news_model->get_info($id);
        if ($news)
        {
            $this->news_model->delete($id);
            unlink('./public/images/news/' . $news->img);
        }
        redirect(base_url('admin/news'));
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