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
    }

    // 公告管理列表页面
    public function trendList() {
        $this->timeOut();
        $this->load->model('m_trend');
        $type = $this->uri->segment(4);
        $array = array('trendType' => $type);
        $num = $this->m_trend->getNum($array);
        $offset = $this->uri->segment(5);
        $data['trends'] = $this->getTrends($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/trend/trendList/' . $type;
        $config['total_rows'] = $num;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $this->load->view('common/header3');
        switch ($type) {
            case 1:
                $this->load->view('admin/trend/bullentin', $data);
                break;
            case 2:
                $this->load->view('admin/trend/trend', $data);
                break;
            case 3:
                $this->load->view('admin/trend/instrument', $data);
                break;
        }
        $this->load->view('common/footer');
    }

    // 公告管理详细信息页面
    public function trendDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['trend'] = $this->getTrend($id);
        $data['top'] = '';
        if ($data['trend']->trendTop == 1)
            $data['top'] = '置顶';

        $type = $data['trend']->trendType;
        switch ($type) {
            case 1:
                $data['title'] = '公告';
                break;
            case 2:
                $data['title'] = '项目动态';
                break;
            case 3:
                $data['title'] = '管理办法';
                break;
        }

        $this->load->view('common/header3');
        $this->load->view('admin/trend/trendDetail', $data);
        $this->load->view('common/footer');
    }

    // 公告管理详细信息编辑页面
    public function trendEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $temp = $this->getTrend($id);

        $data['trendId'] = $temp->trendId;
        $data['trendName'] = $temp->trendName;
        $data['trendType'] = $temp->trendType;
        $data['trendAuthor'] = $temp->trendAuthor;
        $data['time'] = $temp->time;
        $data['content'] = $temp->content;
        $data['linkNum'] = $temp->linkNum;
        $data['trendTop'] = $temp->trendTop;
        $data['state'] = $temp->state;
        $data['show'] = '';
        $data['checked'] = '';
        if ($temp->trendTop == 1)
            $data['checked'] = 'checked';

        switch ($data['trendType']) {
            case 1:
                $data['title'] = '公告';
                break;
            case 2:
                $data['title'] = '项目动态';
                break;
            case 3:
                $data['title'] = '管理办法';
                break;
        }

        $this->load->view('common/header3');
        $this->load->view('admin/trend/trendEdit', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息新增页面
    public function trendNew() {
        $this->timeOut();
        $type = $this->uri->segment(4);

        $data['trendId'] = 0;
        $data['trendName'] = '';
        $data['trendType'] = $type;
        $data['trendAuthor'] = '';
        $data['time'] = '';
        $data['content'] = '';
        $data['linkNum'] = '';
        $data['trendTop'] = '';
        $data['state'] = '';
        $data['show'] = 'display:none';
        $data['checked'] = '';

        switch ($type) {
            case 1:
                $data['title'] = '公告';
                break;
            case 2:
                $data['title'] = '项目动态';
                break;
            case 3:
                $data['title'] = '管理办法';
                break;
        }

        $this->load->view('common/header3');
        $this->load->view('admin/trend/trendEdit', $data);
        $this->load->view('common/footer');
    }

    // 公告管理信息删除
    public function trendDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $type = $this->uri->segment(5);

        $this->load->model('m_trend');
        $this->m_trend->delete($id);
        $data['trend'] = $this->getTrend($id);
        $array = array('trendType' => $type);

        $num = $this->m_trend->getNum($array);
        $offset = 0;

        $data['trends'] = $this->getTrends($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/trend/trendList/' . $type;
        $config['total_rows'] = $num;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        switch ($type) {
            case 1:
                $this->load->view('admin/trend/bullentin', $data);
                break;
            case 2:
                $this->load->view('admin/trend/trend', $data);
                break;
            case 3:
                $this->load->view('admin/trend/instrument', $data);
                break;
        }
        $this->load->view('common/footer');
    }

    // 保存公告动态信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_trend');
        $id = $this->m_trend->saveInfo();
        $data['trend'] = $this->getTrend($id);
        $data['top'] = '';
        if ($data['trend']->trendTop == 1)
            $data['top'] = '置顶';

        $type = $data['trend']->trendType;
        switch ($type) {
            case 1:
                $data['title'] = '公告';
                break;
            case 2:
                $data['title'] = '项目动态';
                break;
            case 3:
                $data['title'] = '管理办法';
                break;
        }

        $this->load->view('common/header3');
        $this->load->view('admin/trend/trendDetail', $data);
        $this->load->view('common/footer');
    }

    // 获取单个课题信息
    public function getTrend($id) {
        $this->timeOut();
        $this->load->model('m_trend');
        $data = array();
        $result = $this->m_trend->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
            $data->state = $this->m_trend->getState($r->state);
        }
        return $data;
    }

    // 更改工作汇报的状态
    public function updateTrendState() {
        $this->timeOut();

        $id = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $array = array('state' => $state);

        $this->load->model('m_trend');
        $this->m_trend->updateTrend($id, $array);

        $data['trend'] = $this->getTrend($id);

        $this->load->view('common/header3');
        $this->load->view('admin/trend/detail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部课题信息
    public function getTrends($array, $offset) {
        $this->load->model('m_trend');
        $data = array();
        $result = $this->m_trend->getTrends($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('trendId' => $r->trendId, 'trendName' => $r->trendName,
                'trendType' => $r->trendType, 'trendAuthor' => $r->trendAuthor,
                'content' => $r->content, 'linkNum' => $r->linkNum, 'state' => $this->m_trend->getState($r->state),
                'time' => $r->time, 'trendTop' => $r->trendTop);
            array_push($data, $arr);
        }
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 1) {
            $this->load->view('logout');
        }
    }

}

?>