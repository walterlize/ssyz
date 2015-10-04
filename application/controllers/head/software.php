<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Software extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function softwareList(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $data['title'] = '软件著作权';
            $this->load->model('m_software');
            $array = array('state' => 2);

            $num = $this->m_software->getNum($array);
            $offset = $this->uri->segment(4);

            $data['software'] = $this->getSoftwares($array, $offset);
            $config['base_url'] = base_url().'index.php/outside/software/softwareList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            $this->load->view('index/head', $title);
            $this->load->view('outside/achievement/left');
            $this->load->view('outside/achievement/softwareList', $data);
            $this->load->view('index/footer');
        }

        // 专利详细信息页面
        public function softwareDetail(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $id = $this->uri->segment(4);
            $data['software'] = $this->getSoftware($id);

            $this->load->view('index/head', $title);
            $this->load->view('outside/achievement/software', $data);
            $this->load->view('index/footer_1');
        }

        // 获取单个专利信息
        function getSoftware($id){
            $this->load->model('m_software');
            $data = array();
            $result = $this->m_software->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }

        // 分页获取专利信息
        function getSoftwares($array, $offset){
            $this->load->model('m_software');
            $data = array();
            $result = $this->m_software->getSoftwares($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('softwareId' => $r->softwareId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'softwareName' => $r->softwareName,
                    'author' => $r->author, 'state' => $this->m_software->getState($r->state),
                    'authorizeNum' => $r->authorizeNum, 'time' => $r->time,
                    'workplace' => $r->workplace, 'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }
}
?>