<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Email extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('email_recruit_model');
    }

    function index()
    {
        $emails = $this->email_recruit_model->get_list();
        $this->data['emails'] = $emails;
        $this->data['temp'] = 'admin/email';
        $this->load->view('admin/layout', $this->data);
    }

    function lock(){
        $id = $this->uri->segment(4);
        $status = $this->uri->segment(5);
        if($status == 1){
            $this->email_recruit_model->update($id, array('status'=>2));
        }
        else if($status == 2){
            $this->email_recruit_model->update($id, array('status'=>1));
        }
        redirect(base_url('admin/email'));
    }

    private function send(){
        $link = base_url('tuyen-dung/tuyen-dung-lap-trinh-vien-javascript-4.html');
        $department = 'Lập trình viên mobile';
        $phone_support = '02462 532 635';
        $email_recruit = 'tuyendung.sgcvietnam@gmail.com';

        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => $email_recruit, // change it to yours
            'smtp_pass' => 'a1234567@', // change it to yours
            'mailtype' => 'html',
            'charset' => "utf-8",
            'newline' => "\r\n",
            'wordwrap' => TRUE
        );

        $this->load->library('email', $config);

        $this->email->from($email_recruit, 'Tuyển dụng SGC');
        $list = array('tungnt93@gmail.com');
        $this->email->to($list);
        $this->email->subject('SGC tuyển dụng '.$department);
        $this->email->message('Chào bạn, chúng tôi gửi thư này cho bạn từ phòng Nhân sự của công ty cổ phần truyền thông SGC Việt Nam.<br>
         Hiện tại công ty chúng tôi đang cần tuyển dụng nhân sự cho vị trí '.$department.', chi tiết xem tại '.$link.'.<br>
         Bạn có thể gửi thông tin ứng tuyển ngay trên <a href="'.base_url('tuyen-dung').'">website</a> của chúng tôi 
         hoặc gửi CV về địa chỉ email '.$email_recruit.'.<br>
         Số điện thoại hỗ trợ: '.$phone_support.'<br>Xin cảm ơn!');

        if ( ! $this->email->send()){
            // Generate error
            echo $this->email->print_debugger();
        }else{
            echo 'Gửi email thành công';
        }
    }
}