<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manage extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
          $this->load->model('m_manage');
        $this->load->library('session');
        $this->load->library('pagination');
    }

    // 课题管理页面
    public function manageList() {
        $this->timeOut();

      
        $num = $this->m_manage->getNum();
        $offset = $this->uri->segment(4);

        $data['manage'] = $this->getManages($offset);
        $config['base_url'] = base_url() . 'index.php/admin/manage/manageList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/subject/manage', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息页面
    public function manageDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getManage($id);

        $this->load->view('common/header3');
        $this->load->view('admin/subject/manageDetail', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息编辑页面
    public function manageEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['manage'] = $this->getManage($id);
        $data['subject'] = $this->getSubjects();
        $data['types'] = $this->getType();

        $this->load->view('common/header3');
        $this->load->view('admin/subject/manageEdit', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息新增页面
    public function manageNew() {
        $this->timeOut();

        @$manage->manageId = 0;
        $manage->name = '';
        $manage->type = '';
        $manage->firm = '';
        $manage->title = '';
        $manage->email = '';
        $manage->subjectId = 0;
        $manage->subjectName = '';
        $manage->remark = '';
        $data['manage'] = $manage;
        $data['subject'] = $this->getSubjects();
        $data['types'] = $this->getType();
        $data['show'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/subject/manageEdit', $data);
        $this->load->view('common/footer');
    }

    public function manageDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_manage');
        $this->m_manage->delete($id);

        $num = $this->m_manage->getNum();
        $offset = 0;

        $data['manage'] = $this->getManages($offset);
        $config['base_url'] = base_url() . 'index.php/admin/manage/manageList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/subject/manage', $data);
        $this->load->view('common/footer');
    }

    // 保存课题信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_manage');
        $id = $this->m_manage->saveInfo();
        $data = $this->getManage($id);

        $this->load->view('common/header3');
        $this->load->view('admin/subject/manageDetail', $data);
        $this->load->view('common/footer');
    }

    // 获取单个课题信息
    public function getManage($id) {
        $this->timeOut();
        $this->load->model('m_manage');
        $data = array();
        $result = $this->m_manage->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
            $data->manageType = $this->m_manage->getType($r->type);
            $data->subjectName = $this->getSubjectName($r->subjectId);
        }
        return $data;
    }

    // 分页获取全部课题信息
    public function getManages($offset) {
        $this->timeOut();
        $this->load->model('m_manage');
        $data = array();
        $result = $this->m_manage->getManages($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('manageId' => $r->manageId, 'name' => $r->name, 'type' => $this->m_manage->getType($r->type),
                'firm' => $r->firm, 'subjectName' => $this->getSubjectName($r->subjectId));
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取课题信息
    public function getSubjects() {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getSubject($data);
        return $result;
    }

    // 获取课题名称
    public function getSubjectName($id) {
        $this->load->model('m_subject');
        $result = $this->m_subject->getOneInfo($id);
        $name = '';
        foreach ($result as $r) {
            $name = $r->subjectName;
        }
        return $name;
    }

    public function getType() {
        $this->load->model('common');
        $data = $this->common->getExpertType();
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 1) {
            $this->load->view('logout');
        }
    }

}

?>