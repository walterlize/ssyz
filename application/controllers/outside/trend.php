<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Trend extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        public function index(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';

            $this->load->model('m_trend');

            $type = $this->uri->segment(4);
            $array = array('trendType' => $type,'state'=>2);

            $num = $this->m_trend->getNum($array);
            $offset = $this->uri->segment(5);

            $data['trend'] = $this->getTrends($array, $offset);
            $config['base_url'] = base_url().'index.php/outside/trend/index/'.$type;
            $config['total_rows'] = $num;
            $config['uri_segment'] = 5;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            switch ($type){
                case 1:
                    $data['title'] = '重要公告';
                    break;
                case 2:
                    $data['title'] = '项目动态';
                    break;
                case 3:
                    $data['title'] = '管理办法';
                    break;
            }

            $this->load->view('includes/header', $title);
            $this->load->view('includes/left');
            $this->load->view('outside/trendList', $data);
            $this->load->view('includes/center_foot');
            $this->load->view('includes/footer');
        }

        // 公告管理详细信息页面
        public function detail(){
            $id = $this->uri->segment(4);

            $this->updateTrendLinkNum($id);

            $data = $this->getTrend($id);
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';

            $this->load->view('index/head', $title);
            $this->load->view('outside/trend', $data);
            $this->load->view('index/footer');
        }

        // 获取单个课题信息
        public function getTrend($id){
            $this->load->model('m_trend');
            $data = array();
            $result = $this->m_trend->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }

        // 分页获取全部课题信息
        public function getTrends($array, $offset){
            $this->load->model('m_trend');
            $data = array();
            $result = $this->m_trend->getTrends($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('trendId' => $r->trendId, 'trendName' => $r->trendName,
                    'trendType' => $r->trendType, 'trendAuthor' => $r->trendAuthor,
                    'content' => $r->content, 'linkNum' => $r->linkNum,
                     'time' => $r->time, 'trendTop' => $r->trendTop);
                array_push($data, $arr);
            }
            return $data;
        }

        public function updateTrendLinkNum($id){
            $this->load->model('m_trend');
            $this->m_trend->updateLinkNum($id);
        }
}
?>