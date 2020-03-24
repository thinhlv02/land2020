<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Home extends MY_Controller
{
    public static $LIMIT_COMMENT_PER_PAGE = 2;

    function __construct()
    {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->model('price_model');
        $this->load->model('questions_model');
        $this->load->model('contact_model');
        $this->load->model('news_model');
        $this->load->model('ads_model');
        $this->load->model('ads_link_model');
        $this->load->model('banner_model');
        $this->load->model('district_model');
        $this->load->model('Ward_model');
        $this->load->model('user_model');
        $this->load->model('broker_model');
        $this->load->model('feedback_model');
        $this->load->model('recruitment_model');
        //language load
    }

    function index()
    {
        $lstProvince = $this->_province;

        $this->data['lstProvince'] = $lstProvince;

        $news = $this->news_model->get_list(array('limit' => array(11, 0)));
        $this->data['news'] = $news;

        //load banner list show
        $banner_left = $this->banner_model->get_list(array('where' => array('highlight' => 1, 'ads_left' => 1, 'bsizeid' => 5), 'limit' => array('1', '0')));
        if ($banner_left)
        {
            $banner_left[0]->{'id'} = $this->ads_model->get_info($banner_left[0]->id_ads)->id;
            $banner_left[0]->{'title'} = $this->ads_model->get_info($banner_left[0]->id_ads)->title;
        }
        $banner_right = $this->banner_model->get_list(array('where' => array('highlight' => 1, 'ads_right' => 1, 'bsizeid' => 5), 'limit' => array('1', '0')));

        if ($banner_right)
        {
            $banner_right[0]->{'id'} = $this->ads_model->get_info($banner_right[0]->id_ads)->id;
            $banner_right[0]->{'title'} = $this->ads_model->get_info($banner_right[0]->id_ads)->title;
        }

        $banner_top = $this->banner_model->get_list(array('where' => array('highlight' => 1, 'ads_top' => 1, 'bsizeid' => 7), 'limit' => array('1', '0')));
        if ($banner_top)
        {
            $banner_top[0]->{'title'} = $this->ads_model->get_info($banner_top[0]->id_ads)->title;
        }

        $this->data['banner_left'] = $banner_left;
        $this->data['banner_right'] = $banner_right;
        $this->data['banner_top'] = $banner_top;

//        pre($banner_left);
//        pre($banner_right);
//        pre($banner_top);

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

        //ads new
        $ads_new = $this->ads_model->get_list(array('order' => array('id', 'desc'), 'limit' => array(7, 0)));
        $this->data['ads_new'] = $ads_new;

        // load header
        $header = array();
        $header['banner_top'] = $banner_top;
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'home/home', $this->data);

        $this->_loadFooter();

    }

    function service_info($slug = '', $id = 0)
    {
        $this->load->language('introduce/introduce', $this->_langcode);
        $this->data['introduce_lang'] = $this->lang->line('introduce_lang');
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

        // load header
        $header = array();
        $header['title'] = $this->data['introduce_lang']['title'];
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'introduce/introduce', $this->data);

        $this->_loadFooter();

    }

    function support($type = 1)
    {
        $this->load->language('support/support', $this->_langcode);
        $this->data['support_lang'] = $this->lang->line('support_lang');

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

        // load header
        $header = array();
        $header['title'] = $this->data['support_lang']['title'];
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'support/support_level_1', $this->data);
        $this->_loadFooter();

    }

    function detail_support($slug = "", $id = 0)
    {
        $this->data['active'] = $id;
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

            // load header
            $header = array();

            $this->_loadHeader($header);

            if ($question->level == 1)
            {
                $questions = $this->questions_model->get_list(array('where' => array('parent_id' => $question->id), 'order' => array('id', 'asc')));
                $this->data['questions'] = $questions;
//                $this->data['active'] = $id;
                $this->load->view($this->_template_f . 'support/support_level_2', $this->data);

            }
            else
            {
                $this->data['question'] = $question;
//                $this->data['active'] = $id;
                $this->load->view($this->_template_f . 'support/support_level_3', $this->data);

            }
        }
        else
        {
            redirect(base_url('ho-tro.html'));
        }

        $this->_loadFooter();

    }

    function policy()
    {
        $this->load->language('policy/policy', $this->_langcode);
        $this->data['policy_lang'] = $this->lang->line('policy_lang');
        $this->data['active'] = 99;

        $policy = $this->contact_model->get_info(1)->policy;
        $this->data['title'] = "Điều khoản sử dụng";
        $this->data['page_content'] = $policy;

        // load header
        $header = array();
        $header['title'] = $this->data['policy_lang']['title'];
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'policy/policy', $this->data);
        $this->_loadFooter();

    }

    function privacy()
    {
        $this->load->language('policy/policy', $this->_langcode);
        $this->data['policy_lang'] = $this->lang->line('policy_lang');

        $this->data['active'] = 100;
        $privacy = $this->contact_model->get_info(1)->privacy;
        $this->data['title'] = "Chính sách bảo mật";
        $this->data['page_content'] = $privacy;

        // load header
        $header = array();
        $header['title'] = $this->data['policy_lang']['title'];
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'policy/policy', $this->data);
        $this->_loadFooter();

    }

    function contact()
    {
        $this->load->language('contact/contact', $this->_langcode);
        $this->data['contact_lang'] = $this->lang->line('contact_lang');

        // load header
        $header = array();
        $header['title'] = $this->data['contact_lang']['title'];
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'contact/contact', $this->data);
        $this->_loadFooter();

    }

    function download()
    {
        $this->load->view($this->_template_f . 'pages/download', $this->data);
    }

    function news()
    {
        $this->load->language('news/news', $this->_langcode);
        $this->data['news_lang'] = $this->lang->line('news_lang');
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

//        $news = $this->news_model->get_list();
        $this->data['news'] = $news;

        // load header
        $header = array();
        $header['title'] = $this->data['news_lang']['title'];
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'news/news', $this->data);
        $this->_loadFooter();
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

//        $this->data['title'] = $news->title;
        $this->data['description'] = $news->meta_description;
        $this->data['image'] = public_url('images/news/' . $news->img);
        $this->data['page_url'] = base_url('tin-tuc/' . create_slug($news->name) . '-' . $news->id);
        $this->data['robots'] = $news->robots_meta;
        $this->data['canonical'] = $news->canonical_url;
        $this->data['keywords'] = $news->meta_keywords;

        // load header
        $header = array();
        $header['title'] = $news->title;
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'news/news_detail', $this->data);
        $this->_loadFooter();

    }

    function product()
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

//        $news = $this->ads_model->get_list();
        $this->data['ads'] = $news;
        // load header
        $header = array();

        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'ads/ads', $this->data);
        $this->_loadFooter();

    }

    function product_detail($slug, $id)
    {
        $ads = $this->ads_model->get_info($id);
        if (!$ads || create_slug($ads->title) != $slug)
        {
            redirect(base_url('tin-tuc'));
        }
        $this->data['ads'] = $ads;
        //check link post ads in table ads_link
        $checkLink = $this->ads_link_model->get_info_rule(array('id_ads' => $id));
        $show_ads_link = false;
        if ($checkLink)
        {
            $show_ads_link = true;
        }
        $this->data['show_ads_link'] = $show_ads_link;
        $ads_type_item = $ads->ads_type;

        $lstDataRelated = $this->ads_model->get_list(array('where' => array('ads_type' => $ads_type_item), 'limit' => array('10', '0')));
        $this->data['lstDataRelated'] = $lstDataRelated;

        //ads left
        $ads_left = $this->ads_model->get_list(array('where' => array('ads_left' => 1), 'limit' => array(13, 0)));
        $this->data['ads_left'] = $ads_left;

        //ads center
        $ads_center = $this->ads_model->get_list(array('where' => array('ads_center' => 1), 'limit' => array(30, 0)));
        $this->data['ads_center'] = $ads_center;

        $this->data['title'] = $ads->title;
        $this->data['description'] = $ads->meta_description;
        $this->data['image'] = public_url('images/ads/' . $ads->img);
        $this->data['page_url'] = base_url('rao-vat/' . create_slug($ads->title) . '-' . $ads->id);
//        $this->data['robots'] = $ads->robots_meta;
//        $this->data['canonical'] = $ads->canonical_url;
//        $this->data['keywords'] = $ads->meta_keywords;

//        $this->data['temp'] = $this->_template_f . 'ads/ads_detail';
        // load header
        $header = array();
        $header['title'] = $ads->title;
        $header['image'] = public_url('images/ads/' . $ads->img);
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'ads/ads_detail_hp', $this->data);
        $this->_loadFooter();

    }

    function ads_detail_link($slug, $id)
    {
        $ads = $this->ads_model->get_info($id);
        if (!$ads || create_slug($ads->title) != $slug)
        {
            redirect(base_url('tin-tuc'));
        }
        $this->data['ads'] = $this->ads_model->get_info($id);
        $this->data['ads_link'] = $this->ads_link_model->get_list(array('where' => array('id_ads' => $id), 'order' => array('id', 'desc')));
        $ads_link = $this->data['ads_link'];

        $ads_end = [];
        $index = 0;
        foreach ($ads_link as $key => $val)
        {
            $index++;
            $ads_end[$index] = new stdClass();
            $ads_end[$index]->id = $val->id;
            $ads_end[$index]->id_ads = $val->id_ads;
            $ads_end[$index]->created_at = date('d-m-Y H:i:s', strtotime($val->created_at));
            $ads_end[$index]->link_web = $val->link_web;
            $ads_end[$index]->link_facebook = $val->link_facebook;

        }

        $this->data['ads_end'] = $ads_end;

//        pre($ads_end);
//        die;

        $this->data['title'] = $ads->title;
        $this->data['description'] = $ads->meta_description;
        $this->data['image'] = public_url('images/ads/' . $ads->img);
        $this->data['page_url'] = base_url('rao-vat/' . create_slug($ads->title) . '-' . $ads->id);

        // load header
        $header = array();
        $header['title'] = $ads->title;
        $header['image'] = public_url('images/ads/' . $ads->img);
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'ads/ads_detail_link', $this->data);
        $this->_loadFooter();

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
        // load header
        $header = array();
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'agency/agency', $this->data);
//        $this->load->view($this->_template_f . 'agency/agency_w3', $this->data);
        $this->_loadFooter();
    }

    function broker()
    {
        $this->data['lstData'] = $this->broker_model->get_list();
        // load header
        $header = array();
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'broker/broker', $this->data);
        $this->_loadFooter();
    }

    function broker_detail($slug, $id)
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

        $this->data['title'] = $ads->title;
        $this->data['description'] = $ads->meta_description;
        $this->data['image'] = public_url('images/ads/' . $ads->img);
        $this->data['page_url'] = base_url('rao-vat/' . create_slug($ads->title) . '-' . $ads->id);
//        $this->data['robots'] = $ads->robots_meta;
//        $this->data['canonical'] = $ads->canonical_url;
//        $this->data['keywords'] = $ads->meta_keywords;

//        $this->data['temp'] = $this->_template_f . 'ads/ads_detail';
        // load header
        $header = array();
        $header['title'] = $ads->title;
        $header['image'] = public_url('images/ads/' . $ads->img);
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'ads/ads_detail_hp', $this->data);
        $this->_loadFooter();

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

    }

    function ajax_get_list_district()
    {
        $id = $this->input->get('id');

        $lst_district = $this->district_model->get_list(array('where' => array('_province_id' => $id)));

        $lst_district_end = [];
        foreach ($lst_district as $k => $value)
        {
            $lst_district_end[$value->id]['id'] = $value->id;
            $lst_district_end[$value->id]['_name'] = $value->_name;
        }

        $this->data['lstdata'] = $lst_district_end;

        $this->load->view($this->_template_f . 'home/view_list_district', $this->data);
    }

    function ajax_get_list_ward()
    {
        $id = $this->input->get('id');

        $lst_ward = $this->Ward_model->get_list(array('where' => array('_district_id' => $id)));

        $lst_ward_end = [];
        foreach ($lst_ward as $k => $value)
        {
            $lst_ward_end[$value->id]['id'] = $value->id . '|' . $value->_district_id;
            $lst_ward_end[$value->id]['_name'] = $value->_name;
        }

        $this->data['lstdata'] = $lst_ward_end;

        $this->load->view($this->_template_f . 'home/view_list_ward', $this->data);
    }

    // tìm kiếm
    function search()
    {
        $this->load->language('search/search', $this->_langcode);
        $this->data['search_lang'] = $this->lang->line('search_lang');
        $lstProvince = $this->_province;

        $province = $this->input->get('province');
        $province = $province != '' ? $province : '';

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

        $this->data['province'] = $province;
        $this->data['lstProvince'] = $lstProvince;

        // load header
        $header = array();
        $header['title'] = $this->data['search_lang']['title'];
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'pages/search', $this->data);
        $this->_loadFooter();

    }

    function user_register()
    {
        $phone = $this->input->get('phone');
        $fullname = $this->input->get('fullname');
        $password = $this->input->get('password');
        $password = md5($password);

        $data = array(
            'username' => $phone,
            'phone' => $phone,
            'fullname' => $fullname,
            'password' => $password,
            'password_txt' => $this->input->get('password')
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
                $this->session->set_userdata('user_login', $admin[0]);
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
            $this->session->set_userdata('user_login', $admin[0]);
            echo 'ok';
        }
        else echo 'failed';
    }

    function logout()
    {
        $this->session->unset_userdata('user_login');
        $this->session->unset_userdata('login');
        redirect(base_url());
    }

    function user_page()
    {
        $user_info = $this->_user_login;
        $this->load->language('user_page/user_page', $this->_langcode);
        $this->data['user_page_lang'] = $this->lang->line('user_page_lang');
        $phone = trim(removeAllTags($user_info->phone));
        $phone = str_replace(' ', '', $phone);
        $this->data['lstData'] = $this->ads_model->get_list(array('where' => array('phone' => $phone)));

        // load header
        $header = array();
        $header['title'] = $this->data['user_page_lang']['title'];
        $this->_loadHeader($header);
        $this->load->view($this->_template_f . 'user/user_view', $this->data);
        $this->_loadFooter();
    }

    function user_page_detail($slug, $id)
    {
        $ads = $this->ads_model->get_info($id);
        if (!$ads || create_slug($ads->title) != $slug)
        {
            redirect(base_url('tin-tuc'));
        }
        $this->data['ads'] = $ads;
        // load header
        $header = array();
        $header['title'] = $ads->title;
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'user/user_view_detail', $this->data);
        $this->_loadFooter();
    }

    function price_postvn()
    {
//        echo 'bang gia';
        // load header
        $header = array();
        $header['title'] = 'Báo Giá';
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'price/price_vipost', $this->data);

        $this->_loadFooter();
    }

    function price($slug = '', $id = 0)
    {
//        die('aaaaaaa');
        $this->load->language('price/price', $this->_langcode);
        $this->data['price_lang'] = $this->lang->line('price_lang');
        if (strlen($slug) > 0 && $id > 0)
        {
            $price = $this->price_model->get_info($id);
            if (!$price || create_slug($price->name) != $slug)
            {
                redirect(base_url('bao-gia.html'));
            }
            $this->data['price'] = $price;
        }
        else
        {
            $price = $this->price_model->get_list(array('order' => array('id', 'asc'), 'limit' => array(1, 0)));
            if (sizeof($price))
            {
                $this->data['price'] = $price[0];
            }
        }

        $this->data['active'] = $id;

        // load header
        $header = array();
        $header['title'] = $this->data['price_lang']['title'];
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'price/price_view', $this->data);

        $this->_loadFooter();
    }

    function faq()
    {
        // load header
        $header = array();
        $header['title'] = '';
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'faq/front-end', $this->data);

        $this->_loadFooter();

    }

    function land_canban()
    {
        $this->load->language('news/news', $this->_langcode);
        $this->data['news_lang'] = $this->lang->line('news_lang');
        $per_page = 12;
        $offset = $this->uri->segment(2);
        $offset = intval($offset);
        $input = array();
        $input['where'] = array('ads_type' => 1);
        $total_rows = $this->ads_model->get_total($input);
        $lstPaging = getListPaging($per_page, 2, $total_rows, base_url('can-ban'));

        if ($offset >= 1)
        {
            $offset -= 1;
            $offset = $offset * $per_page;
        }

        $input['limit'] = array($per_page, $offset);
        $news = $this->ads_model->get_list($input);
        $this->data['lstPaging'] = $lstPaging;
        $this->data['ads_center'] = $news;

        // load header
        $header = array();
        $header['title'] = 'Nhà đất cần bán';
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'product_type/index_view', $this->data);
        $this->_loadFooter();

    }

    function land_chothue()
    {
        $this->load->language('news/news', $this->_langcode);
        $this->data['news_lang'] = $this->lang->line('news_lang');
        $per_page = 12;
        $offset = $this->uri->segment(2);
        $offset = intval($offset);
        $input = array();
        $input['where'] = array('ads_type' => 2);
        $total_rows = $this->ads_model->get_total($input);
        $lstPaging = getListPaging($per_page, 2, $total_rows, base_url('cho-thue'));

        if ($offset >= 1)
        {
            $offset -= 1;
            $offset = $offset * $per_page;
        }

        $input['limit'] = array($per_page, $offset);
        $news = $this->ads_model->get_list($input);
        $this->data['lstPaging'] = $lstPaging;
        $this->data['ads_center'] = $news;

        // load header
        $header = array();
        $header['title'] = 'Nhà đất cho thuê';
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'product_type/index_view', $this->data);
        $this->_loadFooter();

    }

    function land_canmua()
    {
        $this->load->language('news/news', $this->_langcode);
        $this->data['news_lang'] = $this->lang->line('news_lang');
        $per_page = 12;
        $offset = $this->uri->segment(2);
        $offset = intval($offset);
        $input = array();
        $input['where'] = array('ads_type' => 3);
        $total_rows = $this->ads_model->get_total($input);
        $lstPaging = getListPaging($per_page, 2, $total_rows, base_url('can-mua'));

        if ($offset >= 1)
        {
            $offset -= 1;
            $offset = $offset * $per_page;
        }

        $input['limit'] = array($per_page, $offset);
        $news = $this->ads_model->get_list($input);
        $this->data['lstPaging'] = $lstPaging;
        $this->data['ads_center'] = $news;

        // load header
        $header = array();
        $header['title'] = 'Nhà đất cần mua';
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'product_type/index_view', $this->data);
        $this->_loadFooter();
    }

    function land_canthue()
    {
        $this->load->language('news/news', $this->_langcode);
        $this->data['news_lang'] = $this->lang->line('news_lang');
        $per_page = 12;
        $offset = $this->uri->segment(2);
        $offset = intval($offset);
        $input = array();
        $input['where'] = array('ads_type' => 4);
        $total_rows = $this->ads_model->get_total($input);
        $lstPaging = getListPaging($per_page, 2, $total_rows, base_url('can-thue'));

        if ($offset >= 1)
        {
            $offset -= 1;
            $offset = $offset * $per_page;
        }

        $input['limit'] = array($per_page, $offset);
        $news = $this->ads_model->get_list($input);
        $this->data['lstPaging'] = $lstPaging;
        $this->data['ads_center'] = $news;

        // load header
        $header = array();
        $header['title'] = 'Nhà đất cần thuê';
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'product_type/index_view', $this->data);
        $this->_loadFooter();

    }


    public function feedback()
    {
        $name = $this->input->post('name');
        $email = $this->input->post('email');
        $message = $this->input->post('message');
        if ($name && $email && $message)
        {

            $feedback = array(
                'name' => $name,
                'email' => $email,
                'message' => $message,
                'created' => date('Y-m-d H:i:s')
            );

            $check = $this->feedback_model->create($feedback);

            if ($check)
            {
                echo true;
            }
            else
            {
                echo false;
            }
        }
        else
        {
            echo false;
        }
    }

    public function recruit()
    {
        $input = array();
        $type = $this->uri->segment(2);
        if ($type)
        {
            $arr = array();
            if ($type == 'ky-thuat.html')
            {
                $arr = array(1, 2, 3, 4, 5, 6);//php, .net, js, mobile, ios, android
            }
            else if ($type == 'van-hanh-kiem-thu.html')
            {
                $arr = array(7, 8);
            }
            else if ($type == 'kinh-doanh.html')
            {
                $arr = array(9);
            }
            $recruitment = $this->recruitment_model->get_list_by_department($arr);
        }
        else
        {
            $recruitment = $this->recruitment_model->get_list();
        }


//        $recruitmentWeb = array();
//        $recruitmentMobile = array();
//        $recruitmentTest = array();
//        foreach ($recruitment as $row){
//            if($row->department == 1){
//                $recruitmentWeb[] = $row;
//            }
//            else if($row->department == 2){
//                $recruitmentMobile[] = $row;
//            }
//            else{
//                $recruitmentTest[] = $row;
//            }
//        }
//        $this->data['recruitmentWeb'] = $recruitmentWeb;
//        $this->data['recruitmentMobile'] = $recruitmentMobile;
//        $this->data['recruitmentTest'] = $recruitmentTest;


        $this->data['recruitment'] = $recruitment;
        $this->data['li_recruitment'] = 1;
        $this->data['js'] = ['bootstrap-datepicker.js'];
        $this->data['recruit_temp'] = $this->_template_f . 'recruit/list';

        // load header
        $header = array();
        $header['title'] = 'Page recruiment';
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'recruit/recruit', $this->data);
        $this->_loadFooter();

//        $this->data['temp'] = 'site/recruit/recruit';
//        $this->load->view('site/layout/layout', $this->data);
    }

    public function detailRecruit($slug = '', $id = -1)
    {
        $detail = $this->recruitment_model->get_info($id);
        if ($detail)
        {
            $this->data['detail'] = $detail;
        }
        else
        {
            redirect(base_url('tuyen-dung.html'));
        }
        $this->data['li_recruitment'] = 1;
        $this->data['recruit_temp'] = $this->_template_f . 'recruit/detail';

        // load header
        $header = array();
        $header['title'] = ' Detail recruiment';
        $this->_loadHeader($header);

        $this->load->view($this->_template_f . 'recruit/recruit', $this->data);
        $this->_loadFooter();

//        $this->data['temp'] = 'site/recruit/recruit';
//        $this->load->view('site/layout/layout', $this->data);
    }


}