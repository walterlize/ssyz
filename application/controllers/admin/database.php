<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Database extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 项目详细信息页面
        public function databaseDetail(){
            $this->timeOut();
            $data = $this->getDatabase();

            $this->load->view('common/header3');
            $this->load->view('admin/subject/databaseIntroduce', $data);
            $this->load->view('common/footer');
        }

        // 项目详细信息编辑页面
        public function databaseEdit(){
            $this->timeOut();
            $data = $this->getDatabase();

            $this->load->view('common/header3');
            $this->load->view('admin/subject/databaseIntroduceEdit', $data);
            $this->load->view('common/footer');
        }

        // 保存课题信息
        public function databaseSave(){
            $this->timeOut();

            $this->load->model('m_databaseIntroduce');
            $id = $this->m_databaseIntroduce->saveInfo();
            $data = $this->getDatabase();

            $this->load->view('common/header3');
            $this->load->view('admin/subject/databaseIntroduce', $data);
            $this->load->view('common/footer');
        }

        // 获取全部项目信息
        public function getDatabase(){
            $this->timeOut();
            $this->load->model('m_databaseIntroduce');
            $data = array();
            $result = $this->m_databaseIntroduce->getDatabaseIntroduces();

            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }

        // session中的role不存在的时候退出系统
        function timeOut(){
            $role = $this->session->userdata('roleId');

            if($role != 1){
                $this->load->view('logout');
            }
        }
}
?>