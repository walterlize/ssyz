<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class WorkReport extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_workReport');
    }

    // 工作汇报列表页面
    public function reportList() {
        $this->timeOut();
        $this->load->model('m_subject');
        $type = $this->uri->segment(4);
        $level = $this->uri->segment(5);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('type' => $type, 'subjectId' => $subjectId);
        $num = $this->m_workReport->getNum($array, $level);
        $offset = $this->uri->segment(6);
        $data['workreports'] = $this->getReports($array, $offset, $level);
        $config['base_url'] = base_url() . 'index.php/ordinary/workReport/reportList/' . $type;
        $config['total_rows'] = $num;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $this->load->view('common/header3');
        switch ($type) {
            case "WeekReport":
                $this->load->view('ordinary/workReport/weekReport', $data);
                break;
            case "WorkReport":
                $this->load->view('ordinary/workReport/workReport', $data);
                break;
        }
        $this->load->view('common/footer');
    }

    // 公告管理详细信息页面
    public function reportDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['report'] = $this->getReport($id);
        $show = '';
        if (strcmp($data['report']->state, '审核通过') == 0) {
            $show = 'display:none';
        }
        $data['show'] = $show;

        $this->load->view('common/header3');
        $this->load->view('ordinary/workReport/reportDetail', $data);
        $this->load->view('common/footer');
    }

    // 公告管理编辑信息页面
    public function reportEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getReport($id);

        $this->load->view('common/header3');
        $this->load->view('ordinary/workReport/reportEdit', $data);
        $this->load->view('common/footer');
    }

    // 公告管理编辑信息页面
    public function reportNew() {
        $this->timeOut();
        $type = $this->uri->segment(4);
        $data['workReportId'] = 0;
        $data['subjectId'] = $this->session->userdata('subjectId');
        $data['subject']=$this->getSubject($data['subjectId']);
        $data['author'] = $this->session->userdata('userName');
        $data['subjectUnit']=$data['subject']->subjectUnit;
        $data['subjectName']=$data['subject']->subjectName;
        $data['type'] = $type;
        $data['title'] = '';
        //$data['author'] = '';
        $data['content'] = '';
        $data['show'] = 'display:none';
        $data['level'] = '';

        $subjectId = $this->session->userdata('subjectId');
        $data['subject'] = $this->getSubject($subjectId);
        $inherit = $data['subject']->inherit;
        $data['inherit'] = $inherit;

        $this->load->view('common/header3');
        $this->load->view('ordinary/workReport/reportEdit', $data);
        $this->load->view('common/footer');
    }

    // 删除工作汇报
    public function reportDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $type = $this->uri->segment(5);

        $this->load->model('m_workReport');
        $this->m_workReport->deleteReport($id);
        $level = 2;
        $subjectId = $this->session->userdata('subjectId');

        $data['subjectUnit'] = $this->session->userdata('subjectUnit');
        $array = array('type' => $type, 'subjectId' => $subjectId, 'level' => 2);

        $num = $this->m_workReport->getNum($array, $level);
        $offset = $this->uri->segment(5);

        $data['workreports'] = $this->getReports($array, $offset, $level);
        $config['base_url'] = base_url() . 'index.php/ordinary/workReport/reportList/' . $type;
        $config['total_rows'] = $num;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        switch ($type) {
            case "WeekReport":
                $this->load->view('ordinary/workReport/weekReport', $data);
                break;
            case "WorkReport":
                $this->load->view('ordinary/workReport/workReport', $data);
                break;
        }
        $this->load->view('common/footer');
    }

    // 更改工作汇报的状态
    public function updateReportState() {
        $this->timeOut();

        $id = $this->uri->segment(4);
        $state = 0;
        $array = array('state' => $state);

        $this->load->model('m_workReport');
        $this->m_workReport->updateReport($id, $array);

        $data['report'] = $this->getReport($id);

        $this->load->view('common/header3');
        $this->load->view('ordinary/workReport/reportDetail', $data);
        $this->load->view('common/footer');
    }

    // 获取单个课题信息
    function getReport($id) {
        $this->load->model('m_workReport');
        $data = array();
        $result = $this->m_workReport->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
           $data->state = $this->m_workReport->getState($r->state);
            //$data->subjectUnit = $this->session->userdata('subjectUnit');
            //$data->subjectName = $this->session->userdata('subjectName');
        }
        return $data;
    }

    // 保存公告动态信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_workReport');


        $id = $this->m_workReport->saveInfo();
        $data['report'] = $this->getReport($id);
        $data['show'] = '';

        $this->load->view('common/header3');
        $this->load->view('ordinary/workReport/reportDetail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部课题信息
    function getReports($array, $offset, $level) {
        $this->load->model('m_workReport');
        $data = array();
        $result = $this->m_workReport->getReports($array, PER_PAGE, $offset, $level);

        foreach ($result as $r) {
            $arr = array('workReportId' => $r->workReportId, 'subjectId' => $r->subjectId,
                'type' => $r->type, 'author' => $r->author,
                'year' => $r->year, 'title' => $r->title, 'month' => $r->month,'subjectUnit' => $r->subjectUnit,
                'content' => $r->content, 'state' => $this->m_workReport->getState($r->state),
                'remark' => $r->remark);
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

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 3) {
            $this->load->view('logout');
        }
    }

}

?>