<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Standard extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function standardList(){
            $this->timeOut();

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_standard');
            $array = array();

            $num = $this->m_standard->getNum($array);
            $offset = $this->uri->segment(4);

            $data['standard'] = $this->getStandards($array, $offset);
            $config['base_url'] = base_url().'index.php/admin/standard/standardList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/standardList', $data);
            $this->load->view('common/footer');
        }

        // 专利详细信息页面
        public function standardDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['standard'] = $this->getStandard($id);
            $show = '';
            if(strcmp($data['standard']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/standardDetail', $data);
            $this->load->view('common/footer');
        }

        // 更改专利的状态
        public function updateStandardState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = $this->uri->segment(5);
            $array = array('state' => $state);

            $this->load->model('m_standard');
            $this->m_standard->updateInfo($id, $array);

            $data['standard'] = $this->getStandard($id);

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/standardDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个专利信息
        function getStandard($id){
            $this->timeOut();
            $this->load->model('m_standard');
            $data = array();
            $result = $this->m_standard->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
                $data->stateInfo = $this->m_standard->getState($r->state);
            }
            return $data;
        }

        // 分页获取专利信息
        function getStandards($array, $offset){
            $this->timeOut();
            $this->load->model('m_standard');
            $data = array();
            $result = $this->m_standard->getStandards($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('standardId' => $r->standardId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'standardName' => $r->standardName,
                    'author' => $r->author, 'state' => $this->m_standard->getState($r->state),
                    'type' => $r->type, 'time' => $r->time, 'introduction' => $r->introduction,
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