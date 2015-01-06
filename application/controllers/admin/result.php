<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function resultList(){
            $this->timeOut();

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_result');
            $array = array();

            $num = $this->m_result->getNum($array);
            $offset = $this->uri->segment(4);

            $data['result'] = $this->getResults($array, $offset);
            $config['base_url'] = base_url().'index.php/admin/result/resultList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/resultList', $data);
            $this->load->view('common/footer');
        }

        // 专利详细信息页面
        public function resultDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['result'] = $this->getResult($id);
            $show = '';
            if(strcmp($data['result']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/resultDetail', $data);
            $this->load->view('common/footer');
        }

        // 更改专利的状态
        public function updateResultState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = $this->uri->segment(5);
            $array = array('state' => $state);

            $this->load->model('m_result');
            $this->m_result->updateInfo($id, $array);

            $data['result'] = $this->getResult($id);

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/resultDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个专利信息
        function getResult($id){
            $this->timeOut();
            $this->load->model('m_result');
            $data = array();
            $result = $this->m_result->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
                $data->stateInfo = $this->m_result->getState($r->state);
            }
            return $data;
        }

        // 分页获取专利信息
        function getResults($array, $offset){
            $this->timeOut();
            $this->load->model('m_result');
            $data = array();
            $result = $this->m_result->getResults($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('resultId' => $r->resultId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'resultName' => $r->resultName,
                    'author' => $r->author, 'state' => $this->m_result->getState($r->state),
                    'opinion' => $r->opinion, 'time' => $r->time,
                    'workplace' => $r->workplace, 'remark' => $r->remark);
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