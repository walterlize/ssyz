<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frame extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
	}

	public function index(){
            $this->load->view('manager/frame');
	}

        public function menu(){
            $id = $this->session->userdata('subjectId');
            $subject = $this->getSubject($id);

            $this->load->view('common/header');
            $this->load->view('manager/left', $subject);
            $this->load->view('common/footer');
        }

        public function main(){
            //$this->load->view('common/header');
            $this->load->view('manager/main');
           // $this->load->view('common/footer');
        }

        // 获取单个课题信息
        public function getSubject($id){
            $this->load->model('m_subject');
            $data = array();
            $result = $this->m_subject->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }
}
?>