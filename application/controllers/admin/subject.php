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
        $this->load->model('m_subject');
    }

    // 课题管理页面
    public function subjectManage() {
        $this->timeOut();
        $array = array('type' => 'Subject');
        $num = $this->m_subject->getNum($array);
        $offset = $this->uri->segment(4);
        $data['subject'] = $this->getSubjects($offset);
        $config['base_url'] = base_url() . 'index.php/admin/subject/subjectManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $this->load->view('common/header3');
        $this->load->view('admin/subject/subject', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息页面
    public function subjectDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getSubject($id);
       $this->load->view('common/header3');
        $this->load->view('admin/subject/subjectDetail', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息编辑页面
    public function subjectEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getSubject($id);

        $this->load->view('common/header3');
        $this->load->view('admin/subject/subjectEdit', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息新增页面
    public function subjectNew() {
        $this->timeOut();

        $data['subjectId'] = 0;
        $data['subjectNum'] = '';
        $data['inherit'] = '';
        $data['subjectUnit'] = '';
        $data['startDate'] = '';
        $data['endDate'] = '';
        $data['expert'] = '';
        $data['subjectName'] = '';
        $data['introduction'] = '';
        $data['content'] = '';
        $data['completion'] = '';
        $data['remark'] = '';
        $data['show'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('admin/subject/subjectEdit', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息删除过程
    public function subjectDelete() {
        $this->timeOut();

        $id = $this->uri->segment(4);
        $this->load->model('m_subject');
        $this->m_subject->delete($id);
        $array = array();
        $num = $this->m_subject->getNum($array);
        $offset = 0;

        $data['subject'] = $this->getSubjects($offset);
        $config['base_url'] = base_url() . 'index.php/admin/subject/subjectManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/subject/subject', $data);
        $this->load->view('common/footer');
    }

    // 保存课题信息
    public function save() {
        $this->timeOut();

        $id = $this->input->post('subjectId');
        $inherit = $id;
        $array = array('inherit' => $id, 'subjectName' => $this->input->post('subjectName'),
            'subjectNum' => $this->input->post('subjectNum'),
            'subjectUnit' => $this->input->post('subjectUnit'),
            'expert' => $this->input->post('expert'),
            'introduction' => $this->input->post('introduction'),
            'remark' => $this->input->post('remark'));

        $this->load->model('m_subject');
        if ($id == 0) {
            $id = $this->m_subject->saveInfo();
        } else {
            $this->m_subject->updateInfo($id, $array);
        }
        $data = $this->getSubject($id);

        $this->load->view('common/header3');
        $this->load->view('admin/subject/subjectDetail', $data);
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

    // 分页获取全部课题信息
    public function getSubjects($offset) {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getSubjects(PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('subjectId' => $r->subjectId, 'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit,
                'subjectName' => $r->subjectName, 'introduction' => $r->introduction, 'startDate' => $r->startDate, 'endDate' => $r->endDate,
                'content' => $r->content, 'completion' => $r->completion,
                'remark' => $r->remark, 'expert' => $r->expert);
            array_push($data, $arr);
        }
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