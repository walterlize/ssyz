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

    public function index() {
        $title['title'] = '设施养殖数字化智能管理技术设备研究';

        $data['title'] = '课题设置';

        $this->load->model('m_subject');
        $num = $this->m_subject->getNum();
        $offset = $this->uri->segment(4);

        $data['subject'] = $this->getSubjects($offset);
        $config['base_url'] = base_url() . 'index.php/outside/subject/index';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('index/head', $title);
        //$this->load->view('includes/left');
        //$this->load->view('outside/subjectList', $data);
        $this->load->view('includes/center_foot');
        $this->load->view('includes/footer');
    }

    // 项目简介
    public function project() {
        $title['title'] = '设施养殖数字化智能管理技术设备研究';

        $data['title'] = '课题简介';
        $id=$this->uri->segment(4);
        $data['project'] = $this->getProject($id);
        $this->load->view('index/head', $title);
        //$this->load->view('index/left');
        $this->load->view('index/project', $data);
        $this->load->view('index/footer');

        }

    // 项目执行专家组简介
    public function expert() {
        $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
        $data['title'] = '项目执行专家组';

        $this->load->model('m_expert');
        $num = $this->m_expert->getNum(array());
        $offset = $this->uri->segment(4);

        $data['expert'] = $this->getExperts($offset);
        $config['base_url'] = base_url() . 'index.php/outside/subject/expert';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('includes/header', $title);
        $this->load->view('includes/left');
        $this->load->view('outside/expertList', $data);
        $this->load->view('includes/center_foot');
        $this->load->view('includes/footer');
    }

    // 课题介绍
    public function subjectDetail() {
        $title['title'] = '设施养殖数字化智能管理技术设备研究';

        $id = $this->uri->segment(4);
        $data['subject'] = $this->getSubject($id);

        $this->load->view('includes/header', $title);
        $this->load->view('outside/subject', $data);
        $this->load->view('includes/footer');
    }

    // 获取全部项目信息
    public function getProject($id) {
        $this->load->model('m_projectIntroduce');
        $data = array();
        $result = $this->m_projectIntroduce->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取全部项目执行专家信息
    public function getExperts($offset) {
        $this->load->model('m_expert');
        $data = array();
        $result = $this->m_expert->getExperts($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $name = '';
            $subject = $this->getSubject($r->subjectId);
            if (isset($subject->subjectName))
                $name = $subject->subjectName;
            $arr = array('expertId' => $r->expertId, 'name' => $r->name,
                'firm' => $r->firm, 'subjectName' => $name,
                'subjectId' => $r->subjectId);
            array_push($data, $arr);
        }
        return $data;
    }

    // 分页获取全部课题信息
    public function getSubjects($offset) {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getSubjects(PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('subjectId' => $r->subjectId, 'subjectNum' => $r->subjectNum,
                'subjectName' => $r->subjectName, 'introduction' => $r->introduction,
                'content' => $r->content, 'completion' => $r->completion,
                'remark' => $r->remark, 'expert' => $r->expert);
            array_push($data, $arr);
        }
        return $data;
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