<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patent extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function patentList(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $data['title'] = '专利';

            $this->load->model('m_patent');
            $array = array('state' => 2);

            $num = $this->m_patent->getNum($array);
            $offset = $this->uri->segment(4);

            $data['patent'] = $this->getPatents($array, $offset);
            $config['base_url'] = base_url().'index.php/outside/patent/patentList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('includes/header', $title);
            $this->load->view('includes/left');
            $this->load->view('outside/achievement/patentList', $data);
            $this->load->view('includes/center_foot');
            $this->load->view('includes/footer');
        }

        // 专利详细信息页面
        public function patentDetail(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $id = $this->uri->segment(4);
            $data['patent'] = $this->getPatent($id);

            $this->load->view('includes/header', $title);
            $this->load->view('outside/achievement/patent', $data);
            $this->load->view('includes/footer');
        }

        // 获取单个专利信息
        function getPatent($id){
            $this->load->model('m_patent');
            $data = array();
            $result = $this->m_patent->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }

        // 分页获取专利信息
        function getPatents($array, $offset){
            $this->load->model('m_patent');
            $data = array();
            $result = $this->m_patent->getPatents($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('patentId' => $r->patentId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'patentName' => $r->patentName,
                    'patentNum' => $r->patentNum, 'author' => $r->author,
                    'patentState' => $r->patentState, 'state' => $this->m_patent->getState($r->state),
                    'applyTime' => $r->applyTime, 'authorizeTime' => $r->authorizeTime,
                    'workplace' => $r->workplace, 'type' => $r->type,
                    'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }
}
?>