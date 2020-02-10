<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

Class Recruitment extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('recruitment_model');
        $this->load->model('user_recruit_model');
        $this->load->model('contact_model');
        $this->load->model('email_recruit_model');
    }

    function index()
    {
        $recruitment = $this->recruitment_model->get_list();
        $this->data['recruitment'] = $recruitment;
        $this->data['temp'] = 'admin/tuyendung/index';
        $this->data['view'] = 'admin/tuyendung/recruitment';
        $this->load->view('admin/layout', $this->data);
    }

    function add()
    {
        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        if ($this->input->post('btnAddRecruitment'))
        {
            $content = $this->input->post('txtContent');
            $content_en = $this->input->post('txtContentEn');
            $expired_date = $this->input->post('txtExpired');
            $expired_date = new DateTime($expired_date);
            $department = $this->input->post('slDepartment');
            $title = $this->input->post('txtTitle');
            $title_en = $this->input->post('txtTitleEn');
            $created = new DateTime();
            $data_submit = array(
                'department' => $department,
                'expired_date' => $expired_date->getTimestamp(),
                'title' => $title,
                'title_en' => $title_en,
                'content' => $content,
                'content_en' => $content_en,
                'created' => $created->getTimestamp()
            );
//            pre($data_submit);
            $idAdd = $this->recruitment_model->create($data_submit);
//            pre($idAdd);
            if ($idAdd > 0)
            {
                $this->sendMail($idAdd, $title, $department - 1);
                $this->session->set_flashdata('message', 'Đăng bài thành công!');
                redirect(base_url('admin/recruitment/add'));
            }
            else
            {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại!');
                redirect(base_url('admin/recruitment/add'));
            }
        }
        $this->data['temp'] = 'admin/tuyendung/index';
        $this->data['view'] = 'admin/tuyendung/add';
        $this->load->view('admin/layout', $this->data);
    }

    private function sendMail($id, $title, $department)
    {
//        $link = base_url('tuyen-dung/tuyen-dung-lap-trinh-vien-javascript-4.html');
        $link = base_url('tuyen-dung/' . create_slug($title) . '-' . $id . '.html');
        $departments = array('Lập trình PHP', 'Lập trình .NET', 'Lập trình Javascript', 'Lập trình mobile',
            'Lập trình iOS', 'Lập trình Android', 'Vận hành', 'Kiểm thử', 'Kinh doanh');
        $phone_support = $this->contact_model->get_info(1)->phone;
        $email_recruit = $this->contact_model->get_info(1)->email_recruit;
        $pos = $departments[$department];
        $emails = $this->email_recruit_model->get_list(array('where' => array('status' => 1)));
        $list = array();
        foreach ($emails as $row)
        {
            $list[] = $row->email;
        }

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
        $this->email->to($list);
        $this->email->subject('SGC tuyển dụng vị trí ' . $pos);
        $this->email->message('Chào bạn, chúng tôi gửi thư này cho bạn từ phòng Nhân sự của công ty cổ phần truyền thông SGC Việt Nam.<br>
         Hiện tại công ty chúng tôi đang cần tuyển dụng nhân sự cho vị trí ' . $pos . ', chi tiết xem tại ' . $link . '.<br>
         Bạn có thể gửi thông tin ứng tuyển ngay trên <a href="' . base_url('tuyen-dung.html') . '">website</a> của chúng tôi 
         hoặc gửi CV về địa chỉ email ' . $email_recruit . '.<br>
         Số điện thoại hỗ trợ: ' . $phone_support . '<br>Xin cảm ơn!');

        if (!$this->email->send())
        {
            // Generate error
            echo $this->email->print_debugger();
        }
        else
        {
            echo 'Gửi email thành công';
        }
    }

    function edit()
    {
        $id = $this->uri->segment(4);
//        pre($id);
        $recruitment = $this->recruitment_model->get_info($id);
        if (!$recruitment)
        {
            echo 'Đường dẫn không hợp lệ';
            return;
        }
        $this->data['recruitment'] = $recruitment;

        $message = $this->session->flashdata('message');
        $this->data['message'] = $message;
        if ($this->input->post('btnUpdateRecruitment'))
        {
            $content = $this->input->post('txtContent');
            $content_en = $this->input->post('txtContentEn');
            $expired_date = $this->input->post('txtExpired');
            $expired_date = new DateTime($expired_date);
            $department = $this->input->post('slDepartment');
            $title = $this->input->post('txtTitle');
            $title_en = $this->input->post('txtTitleEn');
            $created = new DateTime();
            $data_submit = array(
                'department' => $department,
                'expired_date' => $expired_date->getTimestamp(),
                'title' => $title,
                'title_en' => $title_en,
                'content' => $content,
                'content_en' => $content_en,
                'created' => $created->getTimestamp()
            );
//            pre($data_submit);
            if ($this->recruitment_model->update($id, $data_submit))
            {
                $this->session->set_flashdata('message', 'Chỉnh sửa thành công!');
                redirect(base_url('admin/recruitment/edit/' . $id));
            }
            else
            {
                $this->session->set_flashdata('message', 'Có lỗi xảy ra, vui lòng thử lại!');
                redirect(base_url('admin/recruitment/edit/' . $id));
            }
        }

        $this->data['temp'] = 'admin/tuyendung/index';
        $this->data['view'] = 'admin/tuyendung/edit';
        $this->load->view('admin/layout', $this->data);
    }

    function del()
    {
        $id = $this->uri->segment(4);
        if ($this->recruitment_model->get_info($id))
        {
            $this->recruitment_model->delete($id);
            redirect(base_url('admin/recruitment'));
        }
        else
        {
            redirect(base_url('admin/recruitment'));
        }
    }

    function user_recruit()
    {
        $id_recruit = $this->uri->segment(4);
        $user_recruit = $this->user_recruit_model->get_list(array('where' => array('id_recruitment' => $id_recruit)));
        $this->data['user_recruit'] = $user_recruit;
        $this->data['id_recruit'] = $id_recruit;
        $this->data['name_recruit'] = $this->recruitment_model->get_info($id_recruit)->title;
        $this->data['temp'] = 'admin/tuyendung/index';
        $this->data['view'] = 'admin/tuyendung/user_recruit';
        $this->load->view('admin/layout', $this->data);
    }

    function download()
    {
        $filename = $this->uri->segment(4);
        $this->load->helper('download');
        $path = file_get_contents(base_url('upload/' . $filename));
        header('Pragma: public');
        header('Expires: 0');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . filesize($path));
        header('Content-Transfer-Encoding: binary');
        force_download($filename, $path);
    }

    function del_user_recruit()
    {
        $id = $this->uri->segment(5);
        $id_recruit = $this->uri->segment(4);
        if ($this->user_recruit_model->get_info($id))
        {
            $this->user_recruit_model->delete($id);
            redirect(base_url('admin/recruitment/user_recruit/' . $id_recruit));
        }
        else
        {
            redirect(base_url('admin/recruitment/user_recruit/' . $id_recruit));
        }
    }
}