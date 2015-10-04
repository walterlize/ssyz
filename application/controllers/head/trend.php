<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Trend extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_trend');
        $this->load->model('m_gonggao');
        $this->load->model('m_zhengce');
    }

    public function index() {
        $title['title'] = '设施养殖数字化智能管理技术设备研究管理系统';

        $type = $this->uri->segment(4);
        $array = array('trendType' => $type, 'state' => 2);
        $num = $this->m_trend->getNum($array);
        $offset = $this->uri->segment(5);
        $data['trend'] = $this->getTrends($array, $offset);
        $config['base_url'] = base_url() . 'index.php/outside/trend/index/' . $type;
        $config['total_rows'] = $num;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        switch ($type) {
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
        $this->load->view('index/head_2', $data);
        //$this->load->view('includes/left_1');
        $this->load->view('outside/trendList', $data);
        //$this->load->view('common/foot3');
        $this->load->view('index/footer_1');
    }
    public function gonggao() {
        $title['title'] = '设施养殖数字化智能管理技术设备研究管理系统';

        $type = $this->uri->segment(4);
        $array = array('type' => $type, 'state' => 2);
        $num = $this->m_gonggao->getNum($array);
        $offset = $this->uri->segment(5);
        $data['gonggao'] = $this->getGonggaos($array, $offset);
        $config['base_url'] = base_url() . 'index.php/outside/trend/index/' . $type;
        $config['total_rows'] = $num;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        switch ($type) {
            case 1:
                $data['gtitle'] = '重要公告';
                break;

        }
        $this->load->view('index/head_2', $title);
        $this->load->view('outside/gonggaoList', $data);
        $this->load->view('index/footer_1');
    }


    // 政策规定
    public function zhengce() {

        $title = '设施养殖数字化智能管理技术设备研究';
        $num = $this->m_zhengce->getNum(array());
        $offset = $this->uri->segment(4);

        $data['zhengce'] = $this->getZhengces($offset);
        $config['base_url'] = base_url() . 'index.php/outside/trend/zhengceList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title']=$title;
        $this->load->view('index/head_2', $data);
        $this->load->view('outside/zhengceList', $data);
        $this->load->view('index/footer_1');
    }
    // 课题政策规定详细信息页面
    public function zhengceDetail() {

        $id = $this->uri->segment(4);
        $data = $this->getZhengce($id);

        $title['title'] = '设施养殖数字化智能管理技术设备研究管理系统';

        $this->load->view('index/head', $title);
        $this->load->view('outside/zhengce', $data);
        $this->load->view('common/foot2');
    }
    // 课题公告详细信息页面
    public function gonggaoDetail() {

        $id = $this->uri->segment(4);
        $data = $this->getGonggao($id);

        $title['title'] = '设施养殖数字化智能管理技术设备研究管理系统';

        $this->load->view('index/head', $title);
        $this->load->view('outside/zhengce', $data);
        $this->load->view('common/foot2');
    }

    // 公告管理详细信息页面
    public function detail() {
        $id = $this->uri->segment(4);

        $this->updateTrendLinkNum($id);

        $data = $this->getTrend($id);
        $title['title'] = '设施养殖数字化智能管理技术设备研究管理系统';

        $this->load->view('index/head', $title);
        $this->load->view('outside/trend', $data);
        //$this->load->view('index/footer_1');
        $this->load->view('common/foot2');
    }

    // 获取单个课题信息
    public function getTrend($id) {
        $this->load->model('m_trend');
        $data = array();
        $result = $this->m_trend->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 分页获取全部动态信息
    public function getTrends($array, $offset) {
        $this->load->model('m_trend');
        $data = array();
        $result = $this->m_trend->getTrends($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('trendId' => $r->trendId, 'trendName' => $r->trendName,
                'trendType' => $r->trendType, 'trendAuthor' => $r->trendAuthor,
                'content' => $r->content, 'linkNum' => $r->linkNum,
                'time' => $r->time, 'trendTop' => $r->trendTop);
            array_push($data, $arr);
        }
        return $data;
    }
    // 分页获取全部公告信息
    public function getGonggaos($array, $offset) {

        $data = array();
        $result = $this->m_gonggao->getGonggaos($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('gonggaoId' => $r->gonggaoId, 'title' => $r->title,
                'type' => $r->type, 'author' => $r->author,
                'content' => $r->content, 'linkNum' => $r->linkNum,
                'date' => $r->date, 'gonggaoTop' => $r->gonggaoTop);
            array_push($data, $arr);
        }
        return $data;
    }

    // 分页获取全部政策规定信息
    public function getZhengces($offset) {
        $data = array();
        $result = $this->m_zhengce->getZhengces($data, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('z_id' => $r->z_id, 'title' => $r->title,
                'content' => $r->content, 'state' => $r->state,
                'date' => $r->date, 'type' => $r->type);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个政策规定信息
    function getZhengce($id) {

        $result = $this->m_zhengce->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }
    // 获取单个公告信息
    function getGonggao($id) {

        $result = $this->m_gonggao->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }


    public function updateTrendLinkNum($id) {
        $this->load->model('m_trend');
        $this->m_trend->updateLinkNum($id);
    }

}

?>