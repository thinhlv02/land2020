<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


Class Banner extends MY_Controller
{
    public $_lstBannerSize = '';
    public $_lstAds = '';

    function __construct()
    {
        parent::__construct();
        $this->load->model('ads_model');
        $this->load->model('banner_model');
        $this->load->model('banner_size_model');
        $this->_lstBannerSize = $this->banner_size_model->get_list();
        $this->_lstAds = $this->ads_model->get_list();
    }

    function index()
    {
//        var_dump($this->_device_type);
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $input = array();
        $input['order'] = array('id', 'desc');
        $lstSizeBanner = $this->_lstBannerSize;
//        pre($lstSizeBanner);

        $devices = $this->banner_model->get_list($input);

        $devices_end = [];
        $index = 0;
        foreach ($devices as $key => $val) {
            $ads_info = $this->ads_model->get_info($val->id_ads);
            $bsize_info = $this->banner_size_model->get_info($val->bsizeid);
            $index++;
            $devices_end[$index] = new stdClass();
            $devices_end[$index]->id = $val->id;
            $devices_end[$index]->img = $val->img;
            $devices_end[$index]->id_ads = $val->id_ads;
            $devices_end[$index]->title = $ads_info->title;
            $devices_end[$index]->type_name = $bsize_info->bsize_name;
            $devices_end[$index]->created_by = $val->created_by;
            $devices_end[$index]->created_at = $val->created_at;
            $devices_end[$index]->highlight = $val->highlight;
            $devices_end[$index]->ads_left = $val->ads_left;
            $devices_end[$index]->ads_right = $val->ads_right;
            $devices_end[$index]->ads_top = $val->ads_top;
        }

        $this->data['devices'] = $devices_end;
        $this->data['device_type'] = $this->_device_type;
        $this->data['tab'] = 1;
        $this->data['temp'] = 'admin/banner/index';
        $this->data['view'] = 'admin/banner/list';
        $this->load->view('admin/layout', $this->data);
    }

    function add()
    {
        $lstSizeBanner = $this->_lstBannerSize;
        $lstAds = $this->_lstAds;
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        if ($this->input->post('btnAdd')) {
            $config['upload_path'] = './public/images/banner';
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG';
            $this->load->library("upload", $config);
            if ($this->upload->do_upload('img_news')) {
                $file_data = $this->upload->data();
                $data = array(
                    'id_ads' => $this->input->post('txtAds'),
                    'bsizeid' => $this->input->post('bsizeid'),
                    'created_by' => $this->_uid,
                    'img' => $file_data['file_name'],
                );
                if ($this->banner_model->create($data)) {
                    $this->session->set_flashdata('message', 'Thêm thành công');
                    redirect(base_url('admin/banner'));
                } else {
                    $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
                }
            } else {
                $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
            }
        }
        $this->data['tab'] = 2;
//        pre($lstSizeBanner);
        $this->data['lstAds'] = $lstAds;
        $this->data['lstSizeBanner'] = $lstSizeBanner;
        $this->data['temp'] = 'admin/banner/index';
        $this->data['view'] = 'admin/banner/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $lstAds = $this->_lstAds;

        $lstSizeBanner = $this->_lstBannerSize;

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $devices = $this->banner_model->get_info($id);
        if (!$devices) {
            redirect(base_url('admin/banner'));
        }

        if ($this->input->post('btnEdit')) {
            $data = array(
                'id_ads' => $this->input->post('txtAds'),
                'bsizeid' => $this->input->post('bsizeid'),
            );

            $config['upload_path'] = './public/images/banner';
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG';
            $this->load->library("upload", $config);
            if ($this->upload->do_upload('img_news')) {
                $file_data = $this->upload->data();
                $data['img'] = $file_data['file_name'];
                unlink('./public/images/banner/' . $devices->img);
            } else {
                $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
            }
            if ($this->banner_model->update($id, $data)) {
                $this->session->set_flashdata('message', 'Cập nhật thành công');
                redirect(base_url('admin/banner'));
            } else {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }
        }
        $this->data['tab'] = 3;
        $this->data['lstSizeBanner'] = $lstSizeBanner;
        $this->data['lstAds'] = $lstAds;
        $this->data['devices'] = $devices;
//        var_dump($devices);
        $this->data['device_type'] = $this->_device_type;
        $this->data['temp'] = 'admin/banner/index';
        $this->data['view'] = 'admin/banner/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        $devices = $this->banner_model->get_info($id);
        if ($devices) {
            $this->banner_model->delete($id);
            unlink('./public/images/banner/' . $devices->img);
        }
        redirect(base_url('admin/banner'));
    }

    function highlight()
    {
        $id = $_POST['id'];
        $news = $this->banner_model->get_info($id);
        $res = array("status" => 0);
        if ($news) {
            $res['status'] = 1;
            $dataSubmit = array();
            if ($news->highlight) {
                $res['class'] = 'fa-toggle-off';
                $dataSubmit['highlight'] = 0;
            } else {
                $res['class'] = 'fa-toggle-on';
                $dataSubmit['highlight'] = 1;
            }
            $this->banner_model->update($id, $dataSubmit);
        }
        echo json_encode($res);
    }

    function ads_left()
    {
        $id = $_POST['id'];
        $news = $this->banner_model->get_info($id);
        $res = array("status" => 0);
        if ($news) {
            $res['status'] = 1;
            $dataSubmit = array();
            if ($news->ads_left) {
                $res['class'] = 'fa-toggle-off';
                $dataSubmit['ads_left'] = 0;
            } else {
                $res['class'] = 'fa-toggle-on';
                $dataSubmit['ads_left'] = 1;
            }
            $this->banner_model->update($id, $dataSubmit);
        }
        echo json_encode($res);
    }

    function ads_right()
    {
        $id = $_POST['id'];
        $news = $this->banner_model->get_info($id);
        $res = array("status" => 0);
        if ($news) {
            $res['status'] = 1;
            $dataSubmit = array();
            if ($news->ads_right) {
                $res['class'] = 'fa-toggle-off';
                $dataSubmit['ads_right'] = 0;
            } else {
                $res['class'] = 'fa-toggle-on';
                $dataSubmit['ads_right'] = 1;
            }
            $this->banner_model->update($id, $dataSubmit);
        }
        echo json_encode($res);
    }

    function ads_top()
    {
        $id = $_POST['id'];
        $news = $this->banner_model->get_info($id);
        $res = array("status" => 0);
        if ($news) {
            $res['status'] = 1;
            $dataSubmit = array();
            if ($news->ads_top) {
                $res['class'] = 'fa-toggle-off';
                $dataSubmit['ads_top'] = 0;
            } else {
                $res['class'] = 'fa-toggle-on';
                $dataSubmit['ads_top'] = 1;
            }
            $this->banner_model->update($id, $dataSubmit);
        }
        echo json_encode($res);
    }
}