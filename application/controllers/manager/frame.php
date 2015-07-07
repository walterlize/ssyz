<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Frame extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('manager/frame');
    }

    public function menu() {
        $id = $this->session->userdata('subjectId');
        $subject = $this->getSubject($id);

        $this->load->view('common/header');
        $this->load->view('manager/left', $subject);
        $this->load->view('common/footer');
    }

    public function main() {
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId,'state'=>'3');
        $this->load->model('m_baoxiao');
        $this->load->model('m_travel');
        $this->load->model('m_borrow');
        $this->load->model('m_laowu');
        $data['num1'] = $this->m_baoxiao->getNumManage($array);
        $data['num2'] = $this->m_travel->getNumManage($array);
        $data['num3'] = $this->m_borrow->getNumManage($array);
        $data['num4'] = $this->m_borrow->getNumManage($array);



        //$this->load->view('common/header');
        $this->load->view('manager/main',$data);
        // $this->load->view('common/footer');
    }

    // 获取单个课题信息
    public function getSubject($id) {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

}

?>