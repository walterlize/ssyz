<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Award extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function awardList(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $data['title'] = '报奖材料';
            $this->load->model('m_award');
            $array = array('state' => 2);

            $num = $this->m_award->getNum($array);
            $offset = $this->uri->segment(4);

            $data['award'] = $this->getAwards($array, $offset);
            $config['base_url'] = base_url().'index.php/head/award/awardList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('index/head', $title);
            $this->load->view('outside/achievement/left');
            $this->load->view('outside/achievement/awardList', $data);
            $this->load->view('index/footer');
        }

        // 专利详细信息页面
        public function awardDetail()
        {
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $id = $this->uri->segment(4);
            $data['award'] = $this->getAward($id);

            $this->load->view('index/head', $title);
            $this->load->view('outside/achievement/award', $data);
            $this->load->view('index/footer_1');
        }

        // 获取单个专利信息
        function getAward($id){
            $this->load->model('m_award');
            $data = array();
            $result = $this->m_award->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }

        // 分页获取专利信息
        function getAwards($array, $offset){
            $this->load->model('m_award');
            $data = array();
            $result = $this->m_award->getAwards($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('awardId' => $r->awardId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'awardName' => $r->awardName,
                    'author' => $r->author, 'state' => $this->m_award->getState($r->state),
                    'grade' => $r->grade, 'level' => $r->level, 'awardState' => $r->awardState,
                    'processWorkplace' => $r->processWorkplace, 'issueDepart' => $r->issueDepart,
                    'organizationDepart' => $r->organizationDepart,
                    'workplace' => $r->workplace, 'type' => $r->type,
                    'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }
}
?>