<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Sendmail extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

        $createUinfo = [];

        $create_request_uname = isset($createUinfo['username']) ? $createUinfo['username'] : '';
        $create_request_email = isset($createUinfo['email']) ? $createUinfo['email'] : 'phucthinhcorp1411@gmail.com';

//        $receive_uname = isset($receive_uInfo['username']) ? $receive_uInfo['username'] : '';
//        $receive_email = isset($receive_uInfo['email']) ? $receive_uInfo['email'] : '';

        //Gui email cho nguoi yeu cau
//        $email_lang = $this->lang->line('email_tpl_lang');
        $email = array();

        $email['langcode'] = $this->_langcode;
        $email['link'] = array(
            'imagepath' => base_url() . 'images/cpc/',
            'home' => base_url(),
            'login' => site_url('login', $this->_langcode)
        );
//        $email['common_lang'] = $email_lang['common'];
        $email['to'] = $create_request_email;
//        $email['cc'] = EMAIL_KETOAN . ',' . EMAIL_SUPPORT;
        $email['subject'] = 'Subject Demo CI';
        $email['username_request'] = $create_request_uname;
        $email['content'] = 'email_content_request';
//        $email['content'] = str_replace('[amount]',number_format($amount),$email['content']);
//        $email['content'] = str_replace('[for_user]', $receive_uname, $email['content']);
//        $email['email_lang'] = $email_lang;
//        $email['email_lang']['request_deposit'] = $email_lang['request_deposit'];
        $email['body'] = $this->load->view($this->_template_f . 'emailtpl/email_payment', $email, true);

        sendmail($email);

    }
}
