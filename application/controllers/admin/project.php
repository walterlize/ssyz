<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Project extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 项目详细信息页面
        public function projectDetail(){
            $this->timeOut();
            $data = $this->getProject();

            $this->load->view('common/header3');
            $this->load->view('admin/subject/projectIntroduce', $data);
            $this->load->view('common/footer');
        }

        // 项目详细信息编辑页面
        public function projectEdit(){
            $this->timeOut();
            $data = $this->getProject();

            $this->load->view('common/header3');
            $this->load->view('admin/subject/projectIntroduceEdit', $data);
            $this->load->view('common/footer');
        }

        // 保存课题信息
        public function projectSave(){
            $this->timeOut();

            $this->load->model('m_projectIntroduce');
            $id = $this->m_projectIntroduce->saveInfo();
            $data = $this->getProject();

            $this->load->view('common/header3');
            $this->load->view('admin/subject/projectIntroduce', $data);
            $this->load->view('common/footer');
        }

        // 获取全部项目信息
        public function getProject(){
            $this->load->model('m_projectIntroduce');
            $data = array();
            $result = $this->m_projectIntroduce->getProjectIntroduces();

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