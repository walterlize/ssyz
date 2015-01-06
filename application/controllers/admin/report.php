<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function reportList(){
            $this->timeOut();

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_report');
            $array = array();

            $num = $this->m_report->getNum($array);
            $offset = $this->uri->segment(4);

            $data['report'] = $this->getReports($array, $offset);
            $config['base_url'] = base_url().'index.php/admin/report/reportList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/reportList', $data);
            $this->load->view('common/footer');
        }

        // 专利详细信息页面
        public function reportDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['report'] = $this->getReport($id);
            $show = '';
            if(strcmp($data['report']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/reportDetail', $data);
            $this->load->view('common/footer');
        }

        // 更改专利的状态
        public function updateReportState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = $this->uri->segment(5);
            $array = array('state' => $state);

            $this->load->model('m_report');
            $this->m_report->updateInfo($id, $array);

            $data['report'] = $this->getReport($id);

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/reportDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个专利信息
        function getReport($id){
            $this->timeOut();
            $this->load->model('m_report');
            $data = array();
            $result = $this->m_report->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
                $data->stateInfo = $this->m_report->getState($r->state);
            }
            return $data;
        }

        // 分页获取专利信息
        function getReports($array, $offset){
            $this->timeOut();
            $this->load->model('m_report');
            $data = array();
            $result = $this->m_report->getReports($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('reportId' => $r->reportId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'reportName' => $r->reportName,
                    'author' => $r->author, 'state' => $this->m_report->getState($r->state),
                    'time' => $r->time, 'workplace' => $r->workplace, 'type' => $r->type,
                    'remark' => $r->remark);
                array_push($data, $arr);
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