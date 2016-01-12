<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Other extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function otherList(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $data['title'] = '其他';
            $this->load->model('m_other');
            $array = array('state' => 2);

            $num = $this->m_other->getNum($array);
            $offset = $this->uri->segment(4);

            $data['other'] = $this->getOthers($array, $offset);
            $config['base_url'] = base_url().'index.php/head/other/otherList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('index/head', $title);
            $this->load->view('outside/achievement/left');
            $this->load->view('outside/achievement/otherList', $data);
            $this->load->view('index/footer');
        }

        // 专利详细信息页面
        public function otherDetail(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $id = $this->uri->segment(4);
            $data['other'] = $this->getOther($id);

            $this->load->view('index/head', $title);
            $this->load->view('outside/achievement/other', $data);
            $this->load->view('index/footer_1');
        }

        // 获取单个专利信息
        function getOther($id){
            $this->load->model('m_other');
            $data = array();
            $other = $this->m_other->getOneInfo($id);
            foreach ($other as $r){
                $data = $r;
            }
            return $data;
        }

        // 分页获取专利信息
        function getOthers($array, $offset){
            $this->load->model('m_other');
            $data = array();
            $other = $this->m_other->getOthers($array, PER_PAGE, $offset);

            foreach ($other as $r){
                $arr = array('otherId' => $r->otherId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'otherName' => $r->otherName,
                    'content' => $r->content, 'state' => $this->m_other->getState($r->state),
                    'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }
}
?>