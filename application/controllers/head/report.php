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
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $data['title'] = '报告';
            $this->load->model('m_report');
            $array = array('state' => 2);

            $num = $this->m_report->getNum($array);
            $offset = $this->uri->segment(4);

            $data['report'] = $this->getReports($array, $offset);
            $config['base_url'] = base_url().'index.php/outside/report/reportList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('includes/header', $title);
            $this->load->view('includes/left');
            $this->load->view('outside/achievement/reportList', $data);
            $this->load->view('includes/center_foot');
            $this->load->view('includes/footer');
        }

        // 专利详细信息页面
        public function reportDetail(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $id = $this->uri->segment(4);
            $data['report'] = $this->getReport($id);

            $this->load->view('includes/header', $title);
            $this->load->view('outside/achievement/report', $data);
            $this->load->view('includes/footer');
        }

        // 获取单个专利信息
        function getReport($id){
            $this->load->model('m_report');
            $data = array();
            $result = $this->m_report->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }

        // 分页获取专利信息
        function getReports($array, $offset){
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
}
?>