<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Transaction extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('ads_model');
    }

    function index()
    {
        $date = date('Y-m-d');
        $firstday = date('Y-m-d', strtotime(getFirstLastMonth(1, $date)));
        $lastday = date('Y-m-d', strtotime(getFirstLastMonth(2, $date)));

        $lstEmps = getListEmp(1);
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $input['where'] = array();

        if ($this->input->post('btnAddSearch'))
        {
            $txtDate = trim($this->input->post('daterange'));
            $txtDateExp = explode(' - ', $txtDate);

            $firstday = date('Y-m-d', strtotime(str_replace('/', '-', $txtDateExp[0])));
            $lastday = date('Y-m-d', strtotime(str_replace('/', '-', $txtDateExp[1])));

            $make_money_by = $this->input->post('make_money_by');
            $check_money = $this->input->post('check_money');

            if ($make_money_by != 99)
            {
                $input['where'] += array('make_money_by' => $make_money_by);
            }

            if ($check_money != -1)
            {
                if ($check_money == 1)
                {
                    $input['where'] += array('service_money > ' => 0);
                }

                if ($check_money == 0) //service_money
                {
                    $input['where'] += array('service_money = ' => 0);
                }
            }
        }

        $input['where'] += array(
            'created_at >=' => $firstday,
            'created_at <=' => $lastday
        );

        $input['order'] = array('id', 'desc');

        $ads = $this->ads_model->get_list($input);

        $ads_end = [];
        $index = 0;
        foreach ($ads as $key => $value)
        {
            $index++;
            $ads_end[$index] = new stdClass();
            $ads_end[$index]->id = $value->id;
            $ads_end[$index]->code = $value->code;
            $ads_end[$index]->img = $value->img;
            $ads_end[$index]->title = $value->title;
            $ads_end[$index]->price = $value->price;
            $ads_end[$index]->acreage = $value->acreage;
            $ads_end[$index]->area = $value->area;
            $ads_end[$index]->service_money = $value->service_money;
            $ads_end[$index]->make_money_by = $value->make_money_by;
            $ads_end[$index]->pay_time = $value->pay_time != '0000-00-00' ? date('d/m/Y', strtotime($value->pay_time)) : '';
            $ads_end[$index]->created_at = $value->created_at;

            if ($value->make_money_by > 0)
            {
                $ads_end[$index]->name_emp = isset($lstEmps[$value->make_money_by]) ? $lstEmps[$value->make_money_by]->name : 'dcm111111111';
            }
            else
            {
                $ads_end[$index]->name_emp = '';
            }

        }

        $this->data['ads'] = $ads_end;

        $this->data['firstday'] = $firstday;
        $this->data['lastday'] = $lastday;

        $this->data['_uid'] = $this->_uid;
        $this->data['lstEmps'] = $lstEmps;
        $this->data['tab'] = 1;
        $this->data['temp'] = 'admin/transaction/index';
        $this->data['view'] = 'admin/transaction/list';
        $this->load->view('admin/layout', $this->data);
    }

    function edit()
    {
        $this->data['lstEmps'] = getListEmp(1);
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        $id = $this->uri->segment(4);
        $ads = $this->ads_model->get_info($id);
        $pay_time = $ads->pay_time;
        if ($pay_time == '0000-00-00')
        {
            $pay_time = date('d-m-Y');
        }
        else
        {
            $pay_time = date('d-m-Y', strtotime($ads->pay_time));
        }

        if (!$ads)
        {
            redirect(base_url('admin/transaction'));
        }

        $date = $this->input->post('date');
        $date = date('Y-m-d', strtotime($date));

        $price = str_replace(',', '', $this->input->post('service_money'));
        $price = (is_numeric($price) && $price > 0) ? $price : 0;

        if ($this->input->post('btnEdit'))
        {
            $data = array(
                'service_money' => $price,
                'make_money_by' => $this->input->post('make_money_by'),
                'pay_time' => $date,
            );

            if ($this->ads_model->update($id, $data))
            {
                $this->session->set_flashdata('message', 'Cập nhật  thành công');
                redirect(base_url('admin/transaction'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Lỗi thao tác cơ sở dữ liệu');
            }
        }
        $this->data['tab'] = 3;
        $this->data['pay_time'] = $pay_time;
        $this->data['ads'] = $ads;
        $this->data['temp'] = 'admin/transaction/index';
        $this->data['view'] = 'admin/transaction/edit';
        $this->load->view('admin/layout', $this->data);
    }
}