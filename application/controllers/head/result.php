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
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $data['title'] = '鉴定成果';
            
            $this->load->model('m_result');
            $array = array();

            $num = $this->m_result->getNum($array);
            $offset = $this->uri->segment(4);

            $data['result'] = $this->getResults($array, $offset);
            $config['base_url'] = base_url().'index.php/outside/result/resultList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('includes/header', $title);
            $this->load->view('includes/left');
            $this->load->view('outside/achievement/resultList', $data);
            $this->load->view('includes/center_foot');
            $this->load->view('includes/footer');
        }

        // 专利详细信息页面
        public function resultDetail(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $id = $this->uri->segment(4);
            $data['result'] = $this->getResult($id);

            $this->load->view('includes/header', $title);
            $this->load->view('outside/achievement/result', $data);
            $this->load->view('includes/footer');
        }

        // 获取单个专利信息
        function getResult($id){
            $this->load->model('m_result');
            $data = array();
            $result = $this->m_result->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }

        // 分页获取专利信息
        function getResults($array, $offset){
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
}
?>