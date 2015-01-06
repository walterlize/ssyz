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

// 课题管理页面
    public function subjectManage() {
        $this->timeOut();

        $this->load->model('m_subject');
        $subjectId = $this->session->userdata('subjectId');
        $array = array('type' => 'Ordinary', 'inherit' => $subjectId);
        $num = $this->m_subject->getNum($array);
        $offset = $this->uri->segment(4);

        $data['subject'] = $this->getSubjects($offset, $array);
        $config['base_url'] = base_url() . 'index.php/manager/subject/subjectManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('manager/subject/subject', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息页面
    public function subjectDetail() {
        $this->timeOut();
        $id = $this->session->userdata('subjectId');
        $data = $this->getSubject($id);

        $this->load->view('common/header3');
        $this->load->view('manager/subject/subjectDetail', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息新增页面
    public function subjectNew() {
        $this->timeOut();

        $data['subjectId'] = 0;

        $data['subjectNum'] = '';
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
        $data['inherit'] = $this->session->userdata('subjectId');
        $this->load->view('common/header3');
        $this->load->view('manager/subject/ziSubjectEdit', $data);
        $this->load->view('common/footer');
    }

    // 子课题详细信息编辑页面
    public function ziSubjectEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getSubject($id);
        $inherit = $this->session->userdata('subjectId');
        $this->load->view('common/header3');
        $this->load->view('manager/subject/ziSubjectEdit', $data, $inherit);
        $this->load->view('common/footer');
    }

    // 课题详细信息编辑页面
    public function subjectEdit() {
        $this->timeOut();
        $id = $this->session->userdata('subjectId');
        $data = $this->getSubject($id);

        $this->load->view('common/header3');
        $this->load->view('manager/subject/subjectEdit', $data);
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
        $data = $this->getSubject($id);

        $this->load->view('common/header3');
        $this->load->view('manager/subject/subjectDetail', $data);
        $this->load->view('common/footer');
    }

    // 保存课题信息
    public function ziSave() {
        $this->timeOut();

        $id = $this->input->post('subjectId');
        $array = array('subjectName' => $this->input->post('subjectName'),
            'subjectNum' => $this->input->post('subjectNum'), 'inherit' => $this->input->post('inherit'),
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
        $this->load->view('manager/subject/ziSubjectDetail', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息页面
    public function ziSubjectDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);

        $data = $this->getSubject($id);

        $this->load->view('common/header3');
        $this->load->view('manager/subject/ziSubjectDetail', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息删除过程
    public function subjectDelete() {
        $this->timeOut();

        $id = $this->uri->segment(4);
        $this->load->model('m_subject');
        $this->m_subject->delete($id);
        $array = array('type' => 'Ordinary', 'inherit' => $subjectId);
        $num = $this->m_subject->getNum($array);
        $offset = 0;

        $data['subject'] = $this->getSubjects($offset);
        $config['base_url'] = base_url() . 'index.php/manager/subject/subjectManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('manager/subject/subject', $data);
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
    public function getSubjects($offset, $array) {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getSubjects2(PER_PAGE, $offset, $array);

        foreach ($result as $r) {
            $arr = array('subjectId' => $r->subjectId, 'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit,'subjectName' => $r->subjectName,
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

        if ($role != 2) {
            $this->load->view('logout');
        }
    }

}

?>