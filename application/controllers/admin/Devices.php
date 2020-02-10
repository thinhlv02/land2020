<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Devices extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('devices_model');
    }

    function index()
    {
//        var_dump($this->_device_type);
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $input = array();
        $input['order'] = array('id', 'desc');
        $devices = $this->devices_model->get_list($input);

        $devices_end = [];
        $index = 0;
        foreach ($devices as $key => $val)
        {
            $index++;
            $devices_end[$index] = new stdClass();
            $devices_end[$index]->id = $val->id;
            $devices_end[$index]->img = $val->img;
            $devices_end[$index]->name = $val->name;
            $devices_end[$index]->imei = $val->imei;
            $devices_end[$index]->type = $val->type;
            $devices_end[$index]->type_name = isset($this->_device_type[$val->type]) ? $this->_device_type[$val->type] : 'dcm';
            $devices_end[$index]->price = $val->price;
            $devices_end[$index]->description = $val->description;
            $devices_end[$index]->created_by = $val->created_by;
            $devices_end[$index]->created_at = $val->created_at;
//            $devices_end[$key]->id = $val->id;
        }
//        echo '<pre>',print_r($devices_end,1),'</pre>';

        $this->data['devices'] = $devices_end;
        $this->data['device_type'] = $this->_device_type;
        $this->data['tab'] = 1;
        $this->data['temp'] = 'admin/devices/index';
        $this->data['view'] = 'admin/devices/list';
        $this->load->view('admin/layout', $this->data);
    }

    function add()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        if ($this->input->post('btnAdd'))
        {
            $config['upload_path'] = './public/images/devices';
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG';
            $this->load->library("upload", $config);
            if ($this->upload->do_upload('img_news'))
            {
                $file_data = $this->upload->data();
                $data = array(
                    'name' => $this->input->post('txtName'),
                    'imei' => $this->input->post('imei'),
                    'type' => $this->input->post('type'),
                    'description' => $this->input->post('txtDes'),
                    'price' => $this->input->post('txtPrice'),
                    'created_by' => $this->_uid,
                    'img' => $file_data['file_name'],
                );
                if ($this->devices_model->create($data))
                {
                    $this->session->set_flashdata('message', 'Thêm thành công');
                    redirect(base_url('admin/devices'));
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
        $this->data['tab'] = 2;
        $this->data['device_type'] = $this->_device_type;
        $this->data['temp'] = 'admin/devices/index';
        $this->data['view'] = 'admin/devices/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $devices = $this->devices_model->get_info($id);
        if (!$devices)
        {
            redirect(base_url('admin/devices'));
        }

        if ($this->input->post('btnEdit'))
        {
            $data = array(
                'name' => $this->input->post('txtName'),
                'imei' => $this->input->post('imei'),
                'type' => $this->input->post('type'),
                'price' => $this->input->post('txtPrice'),
                'description' => $this->input->post('txtDes'),
            );

            $config['upload_path'] = './public/images/devices';
            $config['allowed_types'] = 'jpg|png|jpeg|JPEG';
            $this->load->library("upload", $config);
            if ($this->upload->do_upload('img_news'))
            {
                $file_data = $this->upload->data();
                $data['img'] = $file_data['file_name'];
                unlink('./public/images/devices/' . $devices->img);
            }
            else
            {
                $this->session->set_flashdata('message', $this->upload->display_errors('', ''));
            }
            if ($this->devices_model->update($id, $data))
            {
                $this->session->set_flashdata('message', 'Cập nhật thành công');
                redirect(base_url('admin/devices'));
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
        $this->data['temp'] = 'admin/devices/index';
        $this->data['view'] = 'admin/devices/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        $devices = $this->devices_model->get_info($id);
        if ($devices)
        {
            $this->devices_model->delete($id);
            unlink('./public/images/devices/' . $devices->img);
        }
        redirect(base_url('admin/devices'));
    }


}