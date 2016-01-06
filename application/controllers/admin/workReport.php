<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class WorkReport extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('m_workReport');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('array');
        $this->load->library('table');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');

        $tmpl = array(
            'table_open' => '<table cellspacing="0" rules="all" border="1" style="width:100%;border-codellapse:collapse;font-size:12px">',
            'row_start' => '<tr align="center">',
            'row_alt_start' => '<tr align="center">',
        );
        $this->table->set_template($tmpl);
    }

    // 工作汇报列表页面
    public function reportList() {
        $this->timeOut();
        $this->load->model('m_workReport');
        $type = $this->uri->segment(4);
        $level = $this->uri->segment(5);

        $year = $this->uri->segment(6);
        if (strcmp($year, 'all') == 0) {
            $array = array('type' => $type);
        } else {
            $array = array('year' => $year, 'type' => $type);
        }

        $num = $this->m_workReport->getNum($array, $level);
        $offset = $this->uri->segment(7);

        $data['workreports'] = $this->getReports($array, $offset, $level);
        if ($type == 'WeekReport') {
            $data['title'] = '工作月报列表';
            $config['base_url'] = base_url() . 'index.php/admin/workReport/reportList/WeekReport/1/all';
        } elseif ($type == 'WorkReport') {
            $data['title'] = '工作简报列表';
            $config['base_url'] = base_url() . 'index.php/admin/workReport/reportList/WorkReport/1/all';
        }
        $config['total_rows'] = $num;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['year'] = $year;
        $data['Year'] = $this->get_year();
        $data['Month'] = $this->get_month();

        $data['type'] = $type;
        $this->load->view('common/header3');
        $this->load->view('admin/workReport/search', $data);
        switch ($type) {
            case "WeekReport":
                $this->load->view('admin/workReport/weekReport', $data);
                break;
            case "WorkReport":
                $this->load->view('admin/workReport/workReport', $data);
                break;
        }
        $this->load->view('common/footer');
    }

    // 工作汇报详细信息页面
    public function reportDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['report'] = $this->getReport($id);

        $this->load->view('common/header3');
        $this->load->view('admin/workReport/reportDetail', $data);
        $this->load->view('common/footer');
    }

    // 更改工作汇报的状态
    public function updateReportState() {
        $this->timeOut();

        $id = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $array = array('state' => $state);

        $this->load->model('m_workReport');
        $this->m_workReport->updateReport($id, $array);

        $data['report'] = $this->getReport($id);

        $this->load->view('common/header3');
        $this->load->view('admin/workReport/reportDetail', $data);
        $this->load->view('common/footer');
    }

    // 获取单个课题信息
    function getReport($id) {
        $this->timeOut();
        $this->load->model('m_workReport');
        $data = array();
        $result = $this->m_workReport->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
            $data->state = $this->m_workReport->getState($r->state);
        }
        return $data;
    }

    // 分页获取全部课题信息
    function getReports($array, $offset, $level) {
        $this->timeOut();
        $this->load->model('m_workReport');
        $data = array();
        $result = $this->m_workReport->getReports($array, PER_PAGE, $offset, $level);

        foreach ($result as $r) {
            $arr = array('workReportId' => $r->workReportId, 'subjectId' => $r->subjectId,
                'subjectUnit' => $r->subjectUnit,'subjectName' => $r->subjectName,
                'type' => $r->type, 'author' => $r->author,
                'year' => $r->year, 'month' => $r->month, 'title' => $r->title,
                'content' => $r->content, 'state' => $this->m_workReport->getState($r->state),
                'remark' => $r->remark);
            array_push($data, $arr);
        }
        return $data;
    }

    function getReports1($array, $offset, $level) {
        $this->timeOut();
        $this->load->model('m_workReport');
        $data = array();
        $result = $this->m_workReport->getReports($array, PER_PAGE, $offset, $level);

        foreach ($result as $r) {
            $arr = array('workReportId' => $r->workReportId, 'subjectId' => $r->subjectId,
                'subjectUnit' => $r->subjectUnit,
                'type' => $r->type, 'author' => $r->author,
                'year' => $r->year, 'month' => $r->month, 'title' => $r->title,
                'content' => $r->content, 'state' => $this->m_workReport->getState($r->state),
                'remark' => $r->remark);
            array_push($data, $arr);
        }
        return $data;
    }

    function change() {

        extract($_REQUEST);


        $type = $this->uri->segment(4);
        $level = $this->uri->segment(5);


        if (strcmp($year, 'all') == 0) {
            if (strcmp($month, 'all') == 0) {
                $array = array('type' => $type);
            } else {
                $array = array('month' => $month, 'type' => $type);
            }
        } else {
            if (strcmp($month, 'all') == 0) {
                $array = array('year' => $year, 'type' => $type);
            } else {
                $array = array('year' => $year,
                    'month' => $month, 'type' => $type);
            }
        }

        $num = $this->m_workReport->getNum($array, $level);
        $offset = $this->uri->segment(6);

        $data['workreports'] = $this->getReports($array, $offset, $level);
        $config['uri_segment'] = 3;
        $config['base_url'] = base_url() . 'index.php/admin/workReport/change';
        $config['total_rows'] = $num;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $data['year'] = $year;
        $data['Year'] = $this->get_year();
        $data['Month'] = $this->get_month();
        $data['type'] = $type;
        /*  switch ($type) {
          case "WeekReport":
          $this->load->view('admin/workReport/weekReport', $data);
          break;
          case "WorkReport":
          $this->load->view('admin/workReport/workReport', $data);
          break;
          } */
     
   
        if ($type == 'WeekReport') {
            $this->load->view('admin/workReport/weekReport', $data);
        } elseif ($type == 'WorkReport') {
            $this->load->view('admin/workReport/workReport', $data);
        }
    }

    public function search() {
        $this->timeOut();
        $type = $this->uri->segment(4);
        $level = $this->uri->segment(5);
        $year = $this->uri->segment(6);
        $offset = $this->uri->segment(7);
        if (strcmp($year, 'all') == 0) {
            $array = array('type' => $type);
        } else {
            $array = array('year' => $year, 'type' => $type);
        }

        $searchterm = trim($_POST['searchterm']);
        if ($searchterm == null) {
            echo '请输入要查询的姓名！';
            exit;
        }
        if ($type == 'WeekReport') {
            $data['title'] = '工作月报列表';
        } elseif ($type == 'WorkReport') {
            $data['title'] = '工作简报列表';
        }

        if (!get_magic_quotes_gpc()) {

            $searchterm = addslashes($searchterm);
        }
        $data['workreports'] = $this->getReports2($array, $offset, $searchterm, $level);
        if ($data['workreports'] == null) {
            
        }
        $num = $this->m_workReport->getNum($array, $level);
        $config['base_url'] = base_url() . 'index.php/admin/workReport/search/.$type./1/.$year.';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        //$data['suggestion'] = "display:none";
        $data['year'] = $year;
        $data['Year'] = $this->get_year();
        $data['Month'] = $this->get_month();
        $data['type'] = $type;
        $this->load->view('common/header3');
        $this->load->view('admin/workReport/search', $data);
        switch ($type) {
            case "WeekReport":
                $this->load->view('admin/workReport/weekReport', $data);
                break;
            case "WorkReport":
                $this->load->view('admin/workReport/workReport', $data);
                break;
        }
        $this->load->view('common/footer');
     
    }

    function getReports2($array, $offset, $searchterm, $level) {
        $this->timeOut();
        $this->load->model('m_workReport');
        $data = array();
        $result = $this->m_workReport->search(PER_PAGE, $offset, $array, $searchterm, $level);

        foreach ($result as $r) {
            $arr = array('workReportId' => $r->workReportId, 'subjectId' => $r->subjectId,
                'subjectUnit' => $r->subjectUnit,'subjectName' => $r->subjectName,
                'type' => $r->type, 'author' => $r->author,
                'year' => $r->year, 'month' => $r->month, 'title' => $r->title,
                'content' => $r->content, 'state' => $this->m_workReport->getState($r->state),
                'remark' => $r->remark);
            array_push($data, $arr);
        }
        return $data;
    }

    function get_year() {
        $this->load->model('common');
        $data = $this->common->getYear();
        return $data;
    }

    function get_month() {
        $this->load->model('common');
        $data = $this->common->getMonth();
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