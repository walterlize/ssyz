<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Subject extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
    }

    // 课题详细信息页面
    public function subjectDetail() {
        $this->timeOut();
        $id = $this->session->userdata('subjectId');
        $data['inherit'] = $this->getSubject($id);
        $subjectId = $data['inherit']->inherit;
        $data['subject'] = $this->getSubject($subjectId);
        $this->load->view('common/header3');
        $this->load->view('ordinary/subject/subjectDetail', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息编辑页面
    public function subjectEdit() {
        $this->timeOut();
        $id = $this->session->userdata('subjectId');
        $data = $this->getSubject($id);

        $this->load->view('common/header3');
        $this->load->view('ordinary/subject/subjectEdit', $data);
        $this->load->view('common/footer');
    }

    // 保存课题信息
    public function save() {
        $this->timeOut();

        $id = $this->input->post('subjectId');
        $array = array('expert' => $this->input->post('expert'),
            'content' => $this->input->post('content'),
            'completion' => $this->input->post('completion'),
            'remark' => $this->input->post('remark'));

        $this->load->model('m_subject');
        $this->m_subject->updateInfo($id, $array);
       


        $id = $this->session->userdata('subjectId');
        $data['inherit'] = $this->getSubject($id);
        $subjectId = $data['inherit']->inherit;
        $data['subject'] = $this->getSubject($subjectId);

        $this->load->view('common/header3');
        $this->load->view('ordinary/subject/subjectDetail', $data);
        $this->load->view('common/footer');
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

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 3) {
            $this->load->view('logout');
        }
    }

}

?>