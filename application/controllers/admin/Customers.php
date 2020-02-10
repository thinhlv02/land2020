<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');


Class Customers extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('customers_model');
    }

    function index()
    {
//        var_dump($this->_device_type);
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;

        $input = array();
        $input['order'] = array('id', 'desc');
        $devices = $this->customers_model->get_list($input);


//        echo '<pre>',print_r($devices_end,1),'</pre>';

        $this->data['customers'] = $devices;
        $this->data['device_type'] = $this->_device_type;
        $this->data['tab'] = 1;
        $this->data['temp'] = 'admin/customers/index';
        $this->data['view'] = 'admin/customers/list';
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
                'created_by' => $this->_uid,
            );
            if ($this->customers_model->create($data))
            {
                $this->session->set_flashdata('message', 'Thêm thành công');
                redirect(base_url('admin/customers'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }

        }
        $this->data['tab'] = 2;
        $this->data['device_type'] = $this->_device_type;
        $this->data['temp'] = 'admin/customers/index';
        $this->data['view'] = 'admin/customers/add';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $devices = $this->customers_model->get_info($id);
        if (!$devices)
        {
            redirect(base_url('admin/customers'));
        }

        if ($this->input->post('btnEdit'))
        {
            $data = array(
                'name' => $this->input->post('txtName'),
                'phone' => $this->input->post('txtPhone'),
                'address' => $this->input->post('txtAddress')
            );

            if ($this->customers_model->update($id, $data))
            {
                $this->session->set_flashdata('message', 'Cập nhật thành công');
                redirect(base_url('admin/customers'));
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
        $this->data['temp'] = 'admin/customers/index';
        $this->data['view'] = 'admin/customers/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        $devices = $this->customers_model->get_info($id);
        if ($devices)
        {
            $this->customers_model->delete($id);
            unlink('./public/images/devices/' . $devices->img);
        }
        redirect(base_url('admin/customers'));
    }


}