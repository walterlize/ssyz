<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demonstration extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function demonstrationList(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $data['title'] = '应用示范';
            $this->load->model('m_demonstration');
            $array = array('state' => 2);

            $num = $this->m_demonstration->getNum($array);
            $offset = $this->uri->segment(4);

            $data['demonstration'] = $this->getDemonstrations($array, $offset);
            $config['base_url'] = base_url().'index.php/outside/demonstration/demonstrationList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('includes/header', $title);
            $this->load->view('includes/left');
            $this->load->view('outside/achievement/demonstrationList', $data);
            $this->load->view('includes/center_foot');
            $this->load->view('includes/footer');
        }

        // 专利详细信息页面
        public function demonstrationDetail(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $id = $this->uri->segment(4);
            $data['demonstration'] = $this->getDemonstration($id);

            $this->load->view('includes/header', $title);
            $this->load->view('outside/achievement/demonstration', $data);
            $this->load->view('includes/footer');
        }

        // 获取单个专利信息
        function getDemonstration($id){
            $this->load->model('m_demonstration');
            $data = array();
            $demonstration = $this->m_demonstration->getOneInfo($id);
            foreach ($demonstration as $r){
                $data = $r;
            }
            return $data;
        }

        // 分页获取专利信息
        function getDemonstrations($array, $offset){
            $this->load->model('m_demonstration');
            $data = array();
            $demonstration = $this->m_demonstration->getDemonstrations($array, PER_PAGE, $offset);

            foreach ($demonstration as $r){
                $arr = array('demonstrationId' => $r->demonstrationId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'introduction' => $r->introduction,
                    'technique' => $r->technique, 'state' => $this->m_demonstration->getState($r->state),
                    'place' => $r->place, 'area' => $r->area, 'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }
}
?>