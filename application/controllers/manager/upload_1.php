<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class upload_1 extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->library('session');
    }

    // 课题详细信息页面
    public function index() {
        $userName = $this->session->userdata('userName');

        // 设置上传路径
        $time = date('Ymd');
        $name = date("YmdHis") . '_' . rand(10000, 99999);
        $dir = getcwd() . './upload/' . $time . '/';
        if (!is_dir($dir))
            mkdir($dir);

        // 控制上传文件类型
        $config['allowed_types'] = 'doc|docx|pdf|jpg|gif|bmp|rar|zip|7z|caj';
        $config['upload_path'] = $dir;
        $config['overwrite'] = true;
        $config['max_size'] = '102400';
        $config['file_name'] = $name;
        $config['file_name'] = date('Y_m_d', time()) . '_' . sprintf('%02d', rand(0, 99));
        //$config['max_size'] = '5000';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $data = '<font color=#ff0000>文件未能成功上传！请检查文件类型和大小。</font>';
            $isUploaded = false;
        } else {

            // 上传文件成功才能保存到数据库中
            //$result_upload = $this->upload->data();
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('common/upload_success', $data);
        }
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 2) {
            $this->load->view('logout');
        }
    }

}

?>