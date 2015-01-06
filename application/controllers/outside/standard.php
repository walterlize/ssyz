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
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $data['title'] = '标准';
            $this->load->model('m_standard');
            $array = array('state' => 2);

            $num = $this->m_standard->getNum($array);
            $offset = $this->uri->segment(4);

            $data['standard'] = $this->getStandards($array, $offset);
            $config['base_url'] = base_url().'index.php/outside/standard/standardList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('includes/header', $title);
            $this->load->view('includes/left');
            $this->load->view('outside/achievement/standardList', $data);
            $this->load->view('includes/center_foot');
            $this->load->view('includes/footer');
        }

        // 专利详细信息页面
        public function standardDetail(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $id = $this->uri->segment(4);
            $data['standard'] = $this->getStandard($id);

            $this->load->view('includes/header', $title);
            $this->load->view('outside/achievement/standard', $data);
            $this->load->view('includes/footer');
        }

        // 获取单个专利信息
        function getStandard($id){
            $this->load->model('m_standard');
            $data = array();
            $result = $this->m_standard->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }

        // 分页获取专利信息
        function getStandards($array, $offset){
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
}
?>