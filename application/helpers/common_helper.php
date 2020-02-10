<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

function public_url($url = '')
{
    return base_url('public/' . $url);
}

function admin_url($url = '')
{
    return base_url('admin/' . $url);
}

function admin_theme($url = '')
{
    return base_url('public/admin_temp/' . $url);
}

//function pre($list, $exit = true)
//{
//    echo "<pre>";
//    print_r($list);
//
//    if ($exit) {
//        die();
//    }
//}

function create_slug($string)
{
    $search = array(
        '#(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)#',
        '#(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)#',
        '#(ì|í|ị|ỉ|ĩ)#',
        '#(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)#',
        '#(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)#',
        '#(ỳ|ý|ỵ|ỷ|ỹ)#',
        '#(đ)#',
        '#(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)#',
        '#(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)#',
        '#(Ì|Í|Ị|Ỉ|Ĩ)#',
        '#(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)#',
        '#(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)#',
        '#(Ỳ|Ý|Ỵ|Ỷ|Ỹ)#',
        '#(Đ)#',
        "/[^a-zA-Z0-9\-\_]/",
    );
    $replace = array('a', 'e', 'i', 'o', 'u', 'y', 'd', 'A', 'E', 'I', 'O', 'U', 'Y', 'D', '-',);
    $string = preg_replace($search, $replace, $string);
    $string = preg_replace('/(-)+/', '-', $string);
    $string = strtolower($string);
    return $string;
}

function getListPaging($per_page = 10, $uri_segment = 1, $total_rows = 0, $base_url = '')
{
    //phan trang
    $ci =& get_instance();
    $ci->load->library("pagination");
    $config['base_url'] = $base_url;
    $config['total_rows'] = $total_rows;
    $config['per_page'] = $per_page;
    $config['prev_link'] = '<span class="button-pre"></span>';
    $config['next_link'] = '<span class="button-next"></span>';
    $config['last_link'] = 'Cuối';
    $config['first_link'] = 'Đầu';
    $config['use_page_numbers'] = TRUE;

    $config['full_tag_open'] = "<ul class='pagination pagination_cus card-body'>";
    $config['full_tag_close'] = "</ul>";
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
    $config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";

    $config['uri_segment'] = $uri_segment;
    $ci->pagination->initialize($config);
    $lstPaging = $ci->pagination->create_links();

    return $lstPaging;
}

function getListPagingV2($per_page = 10, $uri_segment = 1, $total_rows = 0, $base_url = '')
{
    //custom by template Remarketing
    $ci =& get_instance();
    $ci->load->library('pagination');
    $config['base_url'] = 'http://example.com/index.php/test/page/';
    $config['total_rows'] = 200;
    $config['per_page'] = 20;

    $ci->pagination->initialize($config);
    return $ci->pagination->create_links();
}

function getCurrentURL()
{
    $currentURL = (@$_SERVER["HTTPS"] == "on") ? "https://" : "http://";
    $currentURL .= $_SERVER["SERVER_NAME"];

    if ($_SERVER["SERVER_PORT"] != "80" && $_SERVER["SERVER_PORT"] != "443")
    {
        $currentURL .= ":" . $_SERVER["SERVER_PORT"];
    }

    $currentURL .= $_SERVER["REQUEST_URI"];
    return $currentURL;
}

function isUrl($url)
{
    return (preg_match('/^(http|https):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i',
        $url)) ? TRUE : FALSE;
}

// define common function
function getDomainFromUrl($strUrl)
{
    $parse = parse_url($strUrl);
    $domain = isset($parse['host']) ? $parse['host'] : '';
    $domain = mb_strtolower($domain, 'UTF-8');
    if (preg_match('/^www\./i', $domain))
    {
        $domain = substr($domain, 4);
    }
    return $domain;
}

function getLastUri()
{
    $url = getCurrentURL();
    $url = str_replace(base_url(), '', $url);
    return $url;
}

function generateRandomString($length)
{
//    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $characters = '0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++)
    {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function getFirstLastMonth($type, $date)
{

// First day of the month.
    $firstday = date('Y-m-01', strtotime($date));

// Last day of the month.
    $lastday = date('Y-m-t', strtotime($date));

    if ($type == 1)
    {
        return $firstday;
    }
    else if ($type == 2)
    {
        return $lastday;
    }
}

function str_valid_phone($strNumber)
{
    $strNumber = trim($strNumber);
    $chk = FALSE;
    $len = strlen($strNumber);
    if ((
            ($len == 10 && substr($strNumber, 0, 2) == '09') ||
            ($len == 10 && substr($strNumber, 0, 3) == '088') ||
            ($len == 10 && substr($strNumber, 0, 3) == '086') ||
            ($len == 10 && substr($strNumber, 0, 3) == '089') ||
            //($len == 10 && substr($strNumber, 0, 3) == '061') ||
            //($len == 11 && substr($strNumber, 0, 2) == '01') ||
            ($len == 10 && substr($strNumber, 0, 3) == '032') ||
            ($len == 10 && substr($strNumber, 0, 3) == '033') ||
            ($len == 10 && substr($strNumber, 0, 3) == '034') ||
            ($len == 10 && substr($strNumber, 0, 3) == '035') ||
            ($len == 10 && substr($strNumber, 0, 3) == '036') ||
            ($len == 10 && substr($strNumber, 0, 3) == '037') ||
            ($len == 10 && substr($strNumber, 0, 3) == '038') ||
            ($len == 10 && substr($strNumber, 0, 3) == '039') ||

            ($len == 10 && substr($strNumber, 0, 3) == '070') ||
            ($len == 10 && substr($strNumber, 0, 3) == '076') ||
            ($len == 10 && substr($strNumber, 0, 3) == '077') ||
            ($len == 10 && substr($strNumber, 0, 3) == '078') ||
            ($len == 10 && substr($strNumber, 0, 3) == '079') ||

            ($len == 10 && substr($strNumber, 0, 3) == '081') ||
            ($len == 10 && substr($strNumber, 0, 3) == '082') ||
            ($len == 10 && substr($strNumber, 0, 3) == '083') ||
            ($len == 10 && substr($strNumber, 0, 3) == '084') ||
            ($len == 10 && substr($strNumber, 0, 3) == '085') ||

            ($len == 10 && substr($strNumber, 0, 3) == '056') ||
            ($len == 10 && substr($strNumber, 0, 3) == '058') ||

            ($len == 10 && substr($strNumber, 0, 3) == '059'))
        && !preg_match("/[^0-9]/", $strNumber)
    )
    {
        $chk = TRUE;
    }

    return $chk;
}

function removeAllTags($text)
{
    $text = rawurldecode($text);
    $text = htmlspecialchars_decode(html_entity_decode($text, ENT_QUOTES | ENT_IGNORE, "UTF-8"),
        ENT_QUOTES | ENT_IGNORE);
    $text = trim($text);
    // PHP's strip_tags() function will remove tags, but it
    // doesn't remove scripts, styles, and other unwanted
    // invisible text between tags.  Also, as a prelude to
    // tokenizing the text, we need to insure that when
    // block-level tags (such as <p> or <div>) are removed,
    // neighboring words aren't joined.
    $text = preg_replace(
        array(
            // Remove invisible content
            '@<head[^>]*?>.*?</head>@siu',
            '@<style[^>]*?>.*?</style>@siu',
            '@<script[^>]*?.*?</script>@siu',
            '@<object[^>]*?.*?</object>@siu',
            '@<embed[^>]*?.*?</embed>@siu',
            '@<applet[^>]*?.*?</applet>@siu',
            '@<noframes[^>]*?.*?</noframes>@siu',
            '@<noscript[^>]*?.*?</noscript>@siu',
            '@<noembed[^>]*?.*?</noembed>@siu',

            // Add line breaks before & after blocks
            '@<((br)|(hr))@iu',
            '@</?((address)|(blockquote)|(center)|(del))@iu',
            '@</?((div)|(h[1-9])|(ins)|(isindex)|(p)|(pre))@iu',
            '@</?((dir)|(dl)|(dt)|(dd)|(li)|(menu)|(ol)|(ul))@iu',
            '@</?((table)|(th)|(td)|(caption))@iu',
            '@</?((form)|(button)|(fieldset)|(legend)|(input))@iu',
            '@</?((label)|(select)|(optgroup)|(option)|(textarea))@iu',
            '@</?((frameset)|(frame)|(iframe))@iu',
        ),
        array(
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            ' ',
            "\n\$0",
            "\n\$0",
            "\n\$0",
            "\n\$0",
            "\n\$0",
            "\n\$0",
            "\n\$0",
            "\n\$0",
        ),
        $text);
    $text = preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $text);
    // Remove all remaining tags and comments and return.
    return strip_tags($text);
}

function realEmail($email)
{
    $chk = false;
    $email = trim($email);
    if ($email == '')
    {
        return $chk;
    }
    if (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    {
        return $chk;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return $chk;
    }

    list($userName, $mailDomain) = explode("@", $email);
    $mailDomain = trim($mailDomain);
    if (!checkdnsrr($mailDomain, "MX"))
    {
        return $chk;
    }
    /*
    $arr = dns_get_record($mailDomain);
    if(empty($arr))
    {
        return $chk;
    }
    else
    {
        if(isset($arr[1]) && isset($arr[1]['target']) && strtolower(trim($arr[1]['target'])) == 'thongbao.vnnic.vn')
        {
            return $chk;
        }
    }
    */
    return true;
}


function sendmail($data, $langcode = '')
{
    /* data array
    $data = array(
        'to' => '',
        'cc' => '',
        'bcc' => '',
        'subject' => '',
        'body' => ''
    );
    */

    $langcode = trim($langcode);
    if ($langcode == '')
    {
//        $langcode = get_langcode();
    }
    $config = array();
    $config['mailtype'] = 'html';
    $config['protocol'] = 'smtp';
    $config['smtp_crypto'] = '';

    $ci = &get_instance();
    $ci->load->library('email', $config);

    $mail_from = $ci->config->item('serving_email');
    $from_name = $ci->config->item('serving_email_name');
//    $from_name = $from_name[$langcode];
    $from_name = $from_name['vietnamese'];

    $ci->email->set_newline("\r\n");
    $ci->email->from($mail_from, $from_name);
    //Check if email is list
    $result = true;

    if (strpos($data['to'], ','))
    {
//        echo 1;
        $emailList = explode(',', $data['to']);
        foreach ($emailList as $eL)
        {
            if (($eL != '') && !(realEmail($eL)))
            {
                $result = false;
                exit;
            }
        }
    }
    else
    {
//        echo 2;
        $result = realEmail($data['to']);
    }

//    echo '33';

//    var_dump($result);

    if ($result)
    {
//        echo 'dcm';
        $ci->email->to($data['to']);
        var_dump($data['to']);
        if (array_key_exists('cc', $data)) $ci->email->cc($data['cc']);
        if (array_key_exists('bcc', $data)) $ci->email->bcc($data['bcc']);
        $ci->email->subject($data['subject']);
        $ci->email->message($data['body']);
        if (SENDMAIL)
        {
            if ($ci->email->send())
            {
                $ci->email->clear();
                echo 'true';
                return true;
            }
            else
            {
                echo 'false222222222';
                return false;
            }
        }
    }
    return false;
}

function pre($data)
{
    echo '<pre>', print_r($data, 1), '</pre>';
}

function getListAdmin()
{
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('Admin_model');
//    $this->load->Admin_model();
    $data = $CI->Admin_model->get_list();

    $i = 0;
    $admin_arr = [];
    foreach ($data as $key => $value)
    {
        $i++;
        $admin_arr[$value->id] = new stdClass();
        $admin_arr[$value->id]->id = $value->id;
        $admin_arr[$value->id]->name = $value->fullname;
    }

    return $admin_arr;

}

//get list employee
function getListEmp($type)
{
    //code here
    // Get a reference to the controller object
    $CI = get_instance();

    // You may need to load the model if it hasn't been pre-loaded
    $CI->load->model('employees_model');
//    $this->load->Admin_model();
    $data = $CI->employees_model->get_list(array('where' => array('type' => $type)));

    $i = 0;
    $admin_arr = [];
    foreach ($data as $key => $value)
    {
        $i++;
        $admin_arr[$value->id] = new stdClass();
        $admin_arr[$value->id]->id = $value->id;
        $admin_arr[$value->id]->name = $value->name;
    }

    return $admin_arr;
}