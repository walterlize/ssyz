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

        // 报告列表页面
        public function reportList(){
            $this->timeOut();

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_report');
            $roleId=$this->session->userdata('roleId');
            if($roleId==2){
                $array = array('inherit' => $subjectId);
            }elseif($roleId==3){
                $array=array('subjectId'=>$subjectId);
            }else{
                echo '报告页面有误,请联系管理员处理';
            }
            $num = $this->m_report->getNum($array);
            $offset = $this->uri->segment(4);

            $data['report'] = $this->getReports($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/report/reportList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/reportList', $data);
            $this->load->view('common/footer');
        }

        // 报告详细信息页面
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
            $this->load->view('manager/achievement/reportDetail', $data);
            $this->load->view('common/footer');
        }

        // 报告信息页面
        public function reportEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data = $this->getReport($id);

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/reportEdit', $data);
            $this->load->view('common/footer');
        }

        // 报告新增页面
        public function reportNew(){
            $this->timeOut();
            //$type = $this->uri->segment(4);
            $data['reportId'] = 0;
            $data['subjectId'] = $this->session->userdata('subjectId');
            $data['state'] = '';
            $data['reportName'] = '';            
            $data['author'] = '';
            $data['time'] = '';
            $data['workplace'] = '';
            $data['type'] = '';
            $data['remark'] = '';
            $data['show'] = 'display:none';
            $data['types'] = $this->getTypes();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/reportEdit', $data);
            $this->load->view('common/footer');
        }

        // 删除报告信息
        public function reportDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);

            $this->load->model('m_report');
            $this->m_report->delete($id);

            $subjectId = $this->session->userdata('subjectId');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_report->getNum($array);
            $offset = 0;

            $data['report'] = $this->getReports($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/report/reportList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/reportList', $data);
            $this->load->view('common/footer');
        }

        // 更改报告的状态
        public function updateReportState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = 0;
            $array = array('state' => $state);

            $this->load->model('m_report');
            $this->m_report->updateInfo($id, $array);

            $data['report'] = $this->getReport($id);
            $show = '';
            if(strcmp($data['report']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/reportDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个报告信息
        function getReport($id){
            $this->timeOut();
            $this->load->model('m_report');
            $data = array();
            $result = $this->m_report->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
                $data->state = $this->m_report->getState($r->state);
                $data->types = $this->getTypes();
            }
            return $data;
        }

        // 保存报告信息
        public function save(){
            $this->timeOut();

            $this->load->model('m_report');
            $id = $this->m_report->saveInfo();
            $data['report'] = $this->getReport($id);
            $data['show'] = '';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/reportDetail', $data);
            $this->load->view('common/footer');
        }

        // 分页获取报告信息
        function getReports($array, $offset){
            $this->timeOut();
            $this->load->model('m_report');
            $data = array();
            $result = $this->m_report->getReports($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('reportId' => $r->reportId, 'subjectId' => $r->subjectId,
                    'state' => $r->state, 'reportName' => $r->reportName,
                    'author' => $r->author, 'state' => $this->m_report->getState($r->state),
                    'time' => $r->time, 'workplace' => $r->workplace, 'type' => $r->type,
                    'subjectUnit' => $r->subjectUnit,'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }

        // 获取报告类型
        function getTypes(){
            $this->load->model('common');
            $data = $this->common->getReportType();
            return $data;
        }

        // session中的role不存在的时候退出系统
        function timeOut(){
            $role = $this->session->userdata('roleId');

            if($role != 2) {
                if ($role != 3) {
                    $this->load->view('logout');

                }
            }
        }
}
?>