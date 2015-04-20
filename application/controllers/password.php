<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Password extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    function index() {
        $this->load->view('common/header3');
        $data = $this->get_emptyData();
        $this->load->view('index/password_find', $data);
        $this->load->view('common/foot_1');
    }

    // 找回密码
    function find() {
        $cardnumber = $this->input->post('cardnumber');
        $mail = $this->input->post('e_mail');
        $result = $this->mail_exist($mail);
        $data['result'] = '';
        $data['check_mail'] = '';
        $data['show'] = '';
        if (isset($result->email)) {
            $password = $result->password;
            $id = $result->gj_userid;
            $pass1 = $this->key(6);
            //$pass1 = 'guojijiaoliu';
            $pass = md5($pass1);
            $array1 = array('password' => $pass);
            $this->m_user->updateUserinfo($id, $array1);
            $pass = md5($password);
            $mail_info = "<h1>您的密码已经初始化为" . $pass1 . "，请尽快登录系统更改密码。</h1><br />本邮件由系统自动发送，请勿回复。";
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'smtp.163.com',
                'smtp_port' => 25,
                'smtp_user' => 'cauguojichu@163.com',
                'smtp_pass' => 'abc123',
                'mailtype' => 'html'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            $this->email->from('cauguojichu@163.com', '中国农业大学国际合作与交流处');
            $this->email->to($mail);
            $this->email->subject('密码找回');
            $this->email->message($mail_info);

            if ($this->email->send()) {
                $data['result'] = '<h4>您的密码已经发送至指定邮箱，请尽快查收并更改！</h4>';
                $data['show'] = 'display:none;';
                $data['show1'] = 'display;';
                $data['url'] = base_url();
            } else {
                $data['result'] = '<h4>邮件未能发送，请稍后重试！</h4>';
                $data['url'] = base_url();
                $data['show1'] = 'display;';
            }
        } else {
            $data['check_mail'] = '该邮箱地址不存在!';
        }
        $this->load->view('common/head_1');
        $this->load->view('index/find_message', $data);
        $this->load->view('common/foot1');
    }

    function key($length) {
        $returnStr = '';
        $pattern = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLOMNOPQRSTUVWXYZ';
        for ($i = 0; $i < $length; $i ++) {
            $returnStr .= $pattern {mt_rand(0, 61)}; //生成php随机数
        }
        return $returnStr;
    }

    function mail_exist($mail) {
        $this->load->model('m_user');
        $result = $this->m_user->mail_exist($mail);
        $data = '';
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    function get_emptyData() {
        $data['result'] = '';
        $data['check_mail'] = '';
        $data['show'] = '';
        $data['show1'] = 'dispay:none';
        return $data;
    }

}

?>