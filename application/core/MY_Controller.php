<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class MY_Controller extends CI_Controller
{
    var $_template_f = '';
    public $data = array();

    var $_ads_type = '';
    var $_uid = '';
    var $_uname = '';
    var $_device_type = '';
    var $_province = '';
    protected $_langcode = '';

    // common lang
    protected $_common_lang = NULL;
    protected $_login_lang = NULL;
    protected $_function = '';
    protected $_content = '';
    protected $_contact = '';
    protected $_products = '';
    protected $_prices = '';
    protected $_agencies = '';
    protected $_user_login = '';

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $new_url = $this->uri->segment(1);

        $this->_ads_type = $this->_func_ads_type();
        $this->_uid = $this->_session_uid();
        $this->_uname = $this->_session_uname();
        $this->_device_type = $this->_func_device_type();
        $this->_province = $this->_func_province();

        $this->_template_f = TEMPLATE_FOLDER . $this->config->item('template_folder_root');

        switch ($new_url)
        {
            case 'admin' :
            {
                $this->_check_login();
                $this->data['admin'] = $this->session->userdata('admin');
                break;
            }

            default:
            {
                $this->load->model('contact_model');
                $this->load->model('product_model');
                $this->load->model('price_model');
                $this->load->model('agency_model');
                $this->load->model('content_model');
                $contact = $this->contact_model->get_info(1);
                $this->_contact = $contact;
                $products = $this->product_model->get_list(array('order' => array('id', 'asc')));
                $this->_products = $products;
                $prices = $this->price_model->get_list(array('order' => array('id', 'asc')));
                $this->_prices = $prices;
                $this->_content = $this->content_model->get_info(1);
                $this->_agencies = $this->agency_model->get_list(array('order' => array('id', 'asc')));
                $this->_user_login = $this->session->userdata('user_login');

                //fix sgc

                $language = $this->session->userdata('language');
                if (!$language)
                {
                    $this->session->set_userdata('language', 'vn');
                    $language = 'vn';
                }

                if ($language == 'vn')
                {
                    $this->_langcode = 'vietnamese';
                }
                else
                {
                    $this->_langcode = 'english';
                }
                $this->data['language'] = $language;
                $this->_language = $language;
                $this->lang->load($language, 'language');
                //fix sgc

                //load common lang
                $this->load->language('common', $this->_langcode);
                $this->load->language('login/login', $this->_langcode);

                $this->_common_lang = $this->lang->line('common_lang');
                $this->_login_lang = $this->lang->line('login_lang');

                $this->data['user'] = $this->session->userdata('user');

            }
        }

        // init and assign common value to view: language, common lang
        $preHeader = array();
        $preHeader['common_lang'] = $this->_common_lang;
        $preHeader['template_f'] = $this->_template_f;
        $preHeader['login_lang'] = $this->_login_lang;
        $preHeader['language'] = $this->_langcode;
        $preHeader['agencies'] = $this->_agencies;
        $preHeader['contact'] = $this->_contact;
        $preHeader['content'] = $this->_content;
        $preHeader['user_login'] = $this->_user_login;
        $preHeader['prices'] = $this->_prices;
        $preHeader['products'] = $this->_products;
        // assign all common param to view
        $this->load->view($this->_template_f . 'preheader_view', $preHeader);
    }

    private function _check_login()
    {
        $controller = $this->uri->rsegment('1');
        $controller = strtolower($controller);

        $login = $this->session->userdata('login');
        $currUrl = getCurrentUrl();

        //neu ma chua dang nhap,ma truy cap 1 controller khac login
        if (!$login && $controller != 'login')
        {
            dbClose();
            redirect(admin_url('login?url=' . urlencode($currUrl)));
            die();
        }
        //neu ma admin da dang nhap thi khong cho phep vao trang login nua.
        if ($login && $controller == 'login')
        {
            redirect(base_url('admin/ads'));
        }
    }

    protected function _loadHeader($data = NULL, $loadHeader = TRUE)
    {
        $header = array();
        $header['function'] = $this->_function;
        $header['title'] = isset($data['title']) ? $data['title'] : '';
        $header['image'] = isset($data['image']) ? $data['image'] : '';
        $header['banner_top'] = isset($data['banner_top']) ? $data['banner_top'] : '';
//        $header['metaTitle'] = isset($data['metaTitle']) ? $data['metaTitle'] : '';
//        $header['metaKeyword'] = isset($data['metaKeyword']) ? $data['metaKeyword'] : '';
//        $header['metaDesc'] = isset($data['metaDesc']) ? $data['metaDesc'] : '';
//        $header['metaImage'] = isset($data['metaImage']) ? $data['metaImage'] : '';
        $header['loadHeader'] = $loadHeader;

        // load header
        $this->load->view($this->_template_f . 'header_view', $header);
    }

    protected function _loadFooter()
    {
        $footerData = array();
        $footerData['function'] = $this->_function;
        $this->load->view($this->_template_f . 'footer_view', $footerData);
    }

    protected function _session_uid()
    {
        if ($this->session->userdata('admin'))
        {
            $_data = trim($this->session->userdata('admin')->id);
            return $_data;
        }
    }

    protected function _session_uname()
    {
        if ($this->session->userdata('admin'))
        {
            $_uid = trim($this->session->userdata('admin')->username);
            return $_uid;
        }
    }

    protected function _func_ads_type()
    {
        return $this->config->config["ads_type"];
    }

    protected function _func_device_type()
    {
        return $this->config->config["device_type"];
    }

    protected function _func_province()
    {
        $this->load->model('Province_model');
        $lstData = $this->Province_model->get_list(array('order' => array('_name', 'asc')));
        return $lstData;

    }
}