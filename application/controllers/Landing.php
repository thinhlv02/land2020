<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Landing extends MY_Controller
{
    public static $LIMIT_COMMENT_PER_PAGE = 2;

    function __construct()
    {
        parent::__construct();
//        $this->load->model('recruitment_model');
        $this->load->model('product_model');
        $this->load->model('questions_model');
        $this->load->model('contact_model');
        $this->load->model('news_model');
        $this->load->model('ads_model');
        $this->load->model('district_model');
        $this->load->model('Ward_model');
        $this->load->model('user_model');
        //language load
    }

    function index()
    {
//        die('landing');
        $this->data['li_1'] = 1;
        $lstProvince = $this->_province;

//        $lstProvince_end = [];
//        $index = 0;
//        foreach ($lstProvince as $k => $val) {
//            $index++;
//            $lstProvince_end[$index] = new stdClass();
//            $lstProvince_end[$index]->id = $val->id;
//            $lstProvince_end[$index]->_name = $val->_name;
//            $lstProvince_end[$index]->_code = $val->_code;
//            $lstProvince_end[$index]->_area = $val->_area;

//
//            [id] => 1
//            [_name] => Hồ Chí Minh
//            [_code] => SG
//            [_area] => 3
//        }

//        pre_arr($lstProvince_end);

        $this->data['lstProvince'] = $lstProvince;

        $news = $this->news_model->get_list(array('limit' => array(11, 0)));
        $this->data['news'] = $news;

        $news_mb = $this->news_model->get_list(array('limit' => array(5, 0)));
        $this->data['news_mb'] = $news_mb;

        $news_mn = $this->news_model->get_list(array('limit' => array(5, 0)));
        $this->data['news_mn'] = $news_mn;

        //ads left
        $ads_left = $this->ads_model->get_list(array('where' => array('ads_left' => 1), 'limit' => array(13, 0)));
        $this->data['ads_left'] = $ads_left;

        //ads right
        $ads_right = $this->ads_model->get_list(array('where' => array('ads_right' => 1), 'limit' => array(13, 0)));
        $this->data['ads_right'] = $ads_right;

        //ads center
        $ads_center = $this->ads_model->get_list(array('where' => array('ads_center' => 1), 'limit' => array(24, 0)));
        $this->data['ads_center'] = $ads_center;

//        layer left
        $layer_left = $this->ads_model->get_list(array('where' => array('layer_left' => 1), 'limit' => array(8, 0)));
        $this->data['layer_left'] = $layer_left;

//        layer vip
        $layer_vip = $this->ads_model->get_list(array('where' => array('layer_vip' => 1), 'limit' => array(8, 0)));
        $this->data['layer_vip'] = $layer_vip;

//        layer right
        $layer_right = $this->ads_model->get_list(array('where' => array('layer_right' => 1), 'limit' => array(5, 0)));
        $this->data['layer_right'] = $layer_right;


        //ads nổi bật
//        $ads = $this->ads_model->get_list(array('where' => array('highlight' => 1), 'limit' => array(8, 0)));
//        $this->data['ads'] = $ads;

        //ads new
        $ads_new = $this->ads_model->get_list(array('order' => array('id', 'desc'), 'limit' => array(7, 0)));
        $this->data['ads_new'] = $ads_new;

        //ads mới cập nhật
//        $ads_new = $this->ads_model->get_list(array('order' => array('id', 'desc'), 'limit' => array(100, 0)));
//        $this->data['ads_new'] = $ads_new;

        // load header
        $header = array();
        $header['title'] = 'test';
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'home/home', $this->data);
        $this->_loadFooter();

//        $this->data['temp'] = $this->_template_f . 'home/home';
//        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function introduce($slug = '', $id = 0)
    {
        $this->data['li_2'] = 1;
        if (strlen($slug) > 0 && $id > 0)
        {
            $product = $this->product_model->get_info($id);
            if (!$product || create_slug($product->name) != $slug)
            {
                redirect(base_url('gioi-thieu-dich-vu.html'));
            }
            $this->data['product'] = $product;
        }
        else
        {
            $product = $this->product_model->get_list(array('order' => array('id', 'asc'), 'limit' => array(1, 0)));
            if (sizeof($product))
            {
                $this->data['product'] = $product[0];
            }
        }

        $this->data['active'] = $id;
        $this->data['temp'] = $this->_template_f . 'pages/introduce';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function support($type = 1)
    {
        $this->data['li_3'] = 1;

        if ($type == "ky-thuat-vien" || $type == "ky-thuat-vien.html")
        {
            $type = 2;
        }
        else if ($type == "cong-tac-vien" || $type == "cong-tac-vien.html")
        {
            $type = 3;
        }
        else if ($type != 1)
        {
            redirect(base_url('ho-tro.html'));
        }
        $categories = $this->questions_model->get_list(array('where' => array('parent_id' => 0, 'type' => $type), 'order' => array('id', 'asc')));

        $this->data['categories'] = $categories;
        $this->data['type'] = $type;
        $this->data['temp'] = $this->_template_f . 'pages/support_level_1';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function detail_support($slug = "", $id = 0)
    {
        $this->data['active'] = $id;
        $this->data['li_3'] = 1;
        if (strlen($slug) > 0 && $id > 0)
        {
            $question = $this->questions_model->get_info($id);
            if (!$question || create_slug($question->name) != $slug)
            {
                redirect(base_url('ho-tro.html'));
            }
            $categories = $this->questions_model->get_list(array('where' => array('parent_id' => 0, 'type' => $question->type)));
            $this->data['categories'] = $categories;
            $this->data['type'] = $question->type;
//            pre($question->type);

            if ($question->level == 1)
            {
                $questions = $this->questions_model->get_list(array('where' => array('parent_id' => $question->id), 'order' => array('id', 'asc')));
                $this->data['questions'] = $questions;
//                $this->data['active'] = $id;
                $this->data['temp'] = $this->_template_f . 'pages/support_level_2';
            }
            else
            {
                $this->data['question'] = $question;
//                $this->data['active'] = $id;
                $this->data['temp'] = $this->_template_f . 'pages/support_level_3';
            }
        }
        else
        {
            redirect(base_url('ho-tro.html'));
        }


        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function policy()
    {
        $this->data['li_4'] = 1;
        $this->data['active'] = 99;

        $policy = $this->contact_model->get_info(1)->policy;
        $this->data['title'] = "Điều khoản sử dụng";
        $this->data['page_content'] = $policy;
        $this->data['temp'] = $this->_template_f . 'policy/policy';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function privacy()
    {
        $this->data['active'] = 100;
        $this->data['li_4'] = 1;
        $privacy = $this->contact_model->get_info(1)->privacy;
        $this->data['title'] = "Chính sách bảo mật";
        $this->data['page_content'] = $privacy;
        $this->data['temp'] = $this->_template_f . 'policy/policy';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function contact()
    {
        $this->data['li_5'] = 1;
        $this->data['temp'] = $this->_template_f . 'contact/contact';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function download()
    {
//        $this->data['temp'] = $this->_template_f . 'contact/contact';
        $this->load->view($this->_template_f . 'pages/download', $this->data);
    }

    function news()
    {
        $per_page = 10;
        $offset = $this->uri->segment(2);
        $offset = intval($offset);
        $input = array();
        $input['where'] = array('highlight' => 0);
        $total_rows = $this->news_model->get_total($input);
        $lstPaging = getListPaging($per_page, 2, $total_rows, base_url('tin-tuc'));

        if ($offset >= 1)
        {
            $offset -= 1;
            $offset = $offset * $per_page;
        }

        $input['limit'] = array($per_page, $offset);
        $news = $this->news_model->get_list($input);

        $highlight = $this->news_model->get_list(array('where' => array('highlight' => 1)));

        $this->data['lstPaging'] = $lstPaging;
        $this->data['news'] = $news;
        $this->data['highlight'] = $highlight;

        $this->data['li_6'] = 1;
//        $news = $this->news_model->get_list();
        $this->data['news'] = $news;
        $this->data['temp'] = $this->_template_f . 'pages/news';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function news_detail($slug, $id)
    {
        $news = $this->news_model->get_info($id);
        if (!$news || create_slug($news->name) != $slug)
        {
            redirect(base_url('tin-tuc'));
        }
        $this->data['news'] = $news;

        $highlight = $this->news_model->get_list(array('where' => array('highlight' => 1)));
        $this->data['highlight'] = $highlight;

        $this->data['title'] = $news->document_title;
        $this->data['title'] = $news->title;
        $this->data['description'] = $news->meta_description;
        $this->data['image'] = public_url('images/news/' . $news->img);
        $this->data['page_url'] = base_url('tin-tuc/' . create_slug($news->name) . '-' . $news->id);
        $this->data['robots'] = $news->robots_meta;
        $this->data['canonical'] = $news->canonical_url;
        $this->data['keywords'] = $news->meta_keywords;

        $this->data['li_6'] = 1;
        $this->data['temp'] = $this->_template_f . 'pages/news_detail';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function ads()
    {
        $per_page = 10;
        $offset = $this->uri->segment(2);
        $offset = intval($offset);
        $input = array();
//        $input['where'] = array('highlight' => 0);
        $total_rows = $this->ads_model->get_total($input);
        $lstPaging = getListPaging($per_page, 2, $total_rows, base_url('rao-vat'));

        if ($offset >= 1)
        {
            $offset -= 1;
            $offset = $offset * $per_page;
        }

        $input['limit'] = array($per_page, $offset);
        $news = $this->ads_model->get_list($input);

        $highlight = $this->ads_model->get_list();

        $this->data['lstPaging'] = $lstPaging;
        $this->data['ads'] = $news;
        $this->data['highlight'] = $highlight;

        $this->data['li_6'] = 1;
//        $news = $this->ads_model->get_list();
        $this->data['ads'] = $news;
        $this->data['temp'] = $this->_template_f . 'ads/ads';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function ads_detail($slug, $id)
    {
        $ads = $this->ads_model->get_info($id);
        if (!$ads || create_slug($ads->title) != $slug)
        {
            redirect(base_url('tin-tuc'));
        }
        $this->data['ads'] = $ads;

//        $highlight = $this->ads_model->get_list(array('where' => array('highlight' => 1)));
        $highlight = $this->ads_model->get_list(array('limit' => array('10', '0')));
        $this->data['highlight'] = $highlight;

        //ads left
        $ads_left = $this->ads_model->get_list(array('where' => array('ads_left' => 1), 'limit' => array(13, 0)));
        $this->data['ads_left'] = $ads_left;

        //ads center
        $ads_center = $this->ads_model->get_list(array('where' => array('ads_center' => 1), 'limit' => array(30, 0)));
        $this->data['ads_center'] = $ads_center;

//        $this->data['title'] = $ads->document_title;
        $this->data['title'] = $ads->title;
        $this->data['description'] = $ads->meta_description;
        $this->data['image'] = public_url('images/ads/' . $ads->img);
        $this->data['page_url'] = base_url('rao-vat/' . create_slug($ads->title) . '-' . $ads->id);
//        $this->data['robots'] = $ads->robots_meta;
//        $this->data['canonical'] = $ads->canonical_url;
//        $this->data['keywords'] = $ads->meta_keywords;

        $this->data['li_6'] = 1;
//        $this->data['temp'] = $this->_template_f . 'ads/product_detail';
        $this->data['temp'] = $this->_template_f . 'ads/product_detail_hp';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }


    function product()
    {
        $product = $this->product_model->get_list();
        $this->data['li_product'] = 1;
        $this->data['product'] = $product;
        $this->data['temp'] = $this->_template_f . 'product/product';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function language()
    {
        $language = $this->uri->segment(1);
        $uri2 = $this->uri->segment(2);
        $uri3 = $this->uri->segment(3);
//        pre($uri2.'-'.$uri3);
        if ($language == 'vn')
        {
            $this->session->set_userdata('language', 'vn');
        }
        else if ($language == 'en')
        {
            $this->session->set_userdata('language', 'en');
        }
        if ($uri3)
        {
            redirect(base_url($uri2 . '/' . $uri3));
        }
        else if ($uri2)
        {
            redirect(base_url($uri2));
        }
        else
        {
            redirect(base_url());
        }
    }

    function agency()
    {
        $this->data['temp'] = $this->_template_f . 'pages/agency';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function sitemap()
    {
//        $data = $this->news_model->get_list(array('limit' => array(50, 0)));
//        header("Content-Type: text/xml;charset=iso-8859-1");
//        $data = array('news' => $news);
//        pre($data);
        $this->data['news'] = $this->news_model->get_list(array('limit' => array(50, 0)));
        $this->load->view("site/layout/sitemap", $this->data);
    }

    function update_view()
    {

        $id = $this->input->get('id');
        $ads = $this->ads_model->get_info($id);
        $view_old = $ads->view;
        $view_new = $view_old + 14;

        if ($ads)
        {
            $dataSubmit = array();
            $dataSubmit['view'] = $view_new;
//            var_dump($id. '-----');
//            var_dump($dataSubmit);
            $this->ads_model->update($id, $dataSubmit);
            echo $id . '=>' . $view_new;
        }
        else
        {
            echo 'not update';
        }

//        echo json_encode($res);

//        echo 'dcm';
//        die();

//        $id = $this->input->get('id');
//        echo $id;
    }

    function ajax_get_list_district()
    {
        $id = $this->input->get('id');
//        var_dump($id);
//        $selected = $this->input->post('selected');

        //get list tbl_gift_item_info_by_type


        $lst_district = $this->district_model->get_list(array('where' => array('_province_id' => $id)));
//        $lst_district = $this->district_model->get_list();
//        var_dump($lst_district);
//        die;

        $lst_district_end = [];
        foreach ($lst_district as $k => $value)
        {
            $lst_district_end[$value->id]['id'] = $value->id;
            $lst_district_end[$value->id]['_name'] = $value->_name;
        }
//        pre_arr($lst_district_end);

//        pre($lst_district_end);
        $this->data['lstdata'] = $lst_district_end;

        $this->load->view($this->_template_f . 'home/view_list_district', $this->data);
    }

    function ajax_get_list_ward()
    {
        $id = $this->input->get('id');
//        var_dump($id);
//        $selected = $this->input->post('selected');

        //get list tbl_gift_item_info_by_type

        $lst_ward = $this->Ward_model->get_list(array('where' => array('_district_id' => $id)));
//        $lst_ward = $this->District_model->get_list();
//        var_dump($lst_ward);
//        die;

        $lst_ward_end = [];
        foreach ($lst_ward as $k => $value)
        {
            $lst_ward_end[$value->id]['id'] = $value->id . '|' . $value->_district_id;
            $lst_ward_end[$value->id]['_name'] = $value->_name;
        }
//        pre_arr($lst_ward_end);

//        pre($lst_ward_end);
        $this->data['lstdata'] = $lst_ward_end;

        $this->load->view($this->_template_f . 'home/view_list_ward', $this->data);
    }

    function ajax_book()
    {
        echo 'aaaaaaaaa';
        die;
//        $server_cf = $this->_func_lst_server();
//        $server_name = $server_cf[$this->input->post('server')]['main'];
        $province = $this->input->get('province');
        $district = trim($this->input->get('district', true));
        $ward = trim($this->input->get('ward', true));// province=2&district=0&ward=0
//var_dump($province);
//var_dump($district);
//var_dump($ward);
//        echo $province;
//        die();


//        $txtFrom = date("Y-m-d", strtotime(trim($this->input->post('txtFrom', true))));;
//        $txtto = date("Y-m-d", strtotime(trim($this->input->post('txtTo', true))));;
//        $txtto = trim($this->input->post('txtTo', true));
//        echo $txtFrom;
//        echo $txtto;

        $input = '';
//        if ($type == 2) {
//            $input = "and date(time) between '" . $txtFrom . "' and '" . $txtto . "' ";
//        }

        $lst_data = $this->ads_model->get_list($input);
//        $lst_player_by_server = $this->player_get_all_by_server($server_name);

//        $lst_data_arr = [];

//        foreach ($lst_data as $k => $value) {
//            $lst_data_arr[$value->id]['id'] = $value->id;
//            $lst_data_arr[$value->id]['user_id'] = $value->user_id;
//            $lst_data_arr[$value->id]['nick'] = isset($lst_player_by_server[$value->user_id]) ? $lst_player_by_server[$value->user_id]['nick'] : 'dcm';
//            $lst_data_arr[$value->id]['info_id'] = $value->info_id;
//            $lst_data_arr[$value->id]['old_quantity'] = $value->old_quantity;
//            $lst_data_arr[$value->id]['new_quantity'] = $value->new_quantity;
//            $lst_data_arr[$value->id]['update_quantity'] = $value->update_quantity;
//            $lst_data_arr[$value->id]['description'] = $value->description;
//            $lst_data_arr[$value->id]['time'] = $value->time;
//        }

        $this->data['lstdata'] = $lst_data;
        $this->load->view($this->_template_f . 'home/view_list_search', $this->data);
//        $this->load->view($this->_template_f . 'tktaikhoan/view_book_table', $this->data);

    }

    // tìm kiếm
    function search()
    {
//        pre($_GET['province']);
//        die;
        $lstProvince = $this->_province;

        $province = $this->input->get('province');
        $province = $province != '' ? $province : '';
//        echo $province;
//        die;
        $district = $this->input->get('district');
        $ward = $this->input->get('ward');
        $code = $this->input->get('code');
        $this->data['code'] = $code;
        $input = array();
//        $input['like'] = array('code', $code);
        $input['like'] = array('phone', $code);
//        $input['or_like'] = array('phone', $code);
//          pre($input);

        $lstSearch = $this->ads_model->get_list($input);

        $this->data['lstSearch'] = $lstSearch;

        $this->data['li_6'] = 1;
        $this->data['province'] = $province;
        $this->data['lstProvince'] = $lstProvince;
        $this->data['temp'] = $this->_template_f . 'pages/search';
        $this->load->view($this->_template_f . 'layout/layout', $this->data);
    }

    function user_register()
    {
        $phone = $this->input->get('phone');
        $fullname = $this->input->get('fullname');
        $password = $this->input->get('password');
        $password = md5($password);

        $data = array(
            'phone' => $phone,
            'fullname' => $fullname,
            'password' => $password
        );

        $phone = trim(removeAllTags($phone));
        $phone = str_replace(' ', '', $phone);

        $this->data['err_phone'] = '';
        $this->data['exits_phone'] = '';
        if (!str_valid_phone($phone))
        {
            $this->data['err_phone'] = 'true';
        }

        $user_info = $this->user_model->get_list(array('where' => array('phone' => $phone)));
        if (!empty($user_info))
        {
            $this->data['exits_phone'] = 'true';
        }

        if ($this->data['err_phone'] != 'true' && $this->data['exits_phone'] != 'true')
        {

            if ($this->user_model->create($data))
            {
                $input = array();
                $input['where']['phone'] = $phone;
                $admin = $this->user_model->get_list($input);
                $this->session->set_userdata('user', $admin[0]);
                $this->data['ok'] = 'ok';
            }
            else
            {
                $this->data['failed'] = 'failed';
            }
        }

        echo json_encode($this->data);

    }

    function user_login()
    {
        $username = $this->input->get('username');
        $password = $this->input->get('password');

        $password = md5($password);

        $where = array('username' => $username, 'password' => $password);

        if ($this->user_model->check_exists($where))
        {

            $input = array();
            $input['where']['username'] = $username;
            $admin = $this->user_model->get_list($input);
            $this->session->set_userdata('user', $admin[0]);
            echo 'ok';
        }
        else echo 'failed';
    }

    function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('login');
        redirect(base_url());
    }

}