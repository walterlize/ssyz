<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('file');
            $this->load->helper('form');
            $this->load->library('session');
	}

        // 课题详细信息页面
        public function upload(){
            // 设置上传路径
            $time = date('Ymd');
            $name = date("YmdHis").'_'.rand(10000, 99999);
            $dir = getcwd().'./upload/'.$time.'/';
            if(!is_dir($dir))
                mkdir ($dir);

            // 控制上传文件类型
            $config['allowed_types'] = 'doc|docx|pdf|jpg|gif|bmp|rar|zip|7z|caj';
            $config['upload_path'] = $dir;
            $config['overwrite'] = true;
            $config['max_size'] = '5120';
            $config['file_name'] = $name;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload()){
                $data = '<font color=#ff0000>文件未能成功上传！请检查文件类型和大小。</font>';
                $isUploaded = false;
            }

            // 上传文件成功才能保存到数据库中
            if($isUploaded){
                // 获取上传文件后的文件名
                $result_upload = $this->upload->data();
                $upload_name = $result_upload['file_name'];
                $upload_name = iconv("gbk","utf-8",$upload_name);
                $data = $result_upload['client_name'].$upload_name;
            }
            return $data;
        }

        // session中的role不存在的时候退出系统
        function timeOut(){
            $role = $this->session->userdata('roleId');

            if($role != 2){
                $this->load->view('logout');
            }
        }
}
?>