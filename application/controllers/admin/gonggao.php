<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Gonggao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_gonggao');
    }

    // 公告管理列表页面
    public function gonggaoList() {
        $this->timeOut();

        $type = $this->uri->segment(4);
        $array = array('type' => $type);
        $num = $this->m_gonggao->getNum($array);
        $offset = $this->uri->segment(5);
        $data['gonggaos'] = $this->getGonggaos($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/gonggao/gonggaoList/' . $type;
        $config['total_rows'] = $num;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $this->load->view('common/header3');
        switch ($type) {
            case 1:
                $this->load->view('admin/gonggao/bullentin', $data);

        }
        $this->load->view('common/footer');
    }

    // 公告管理详细信息页面
    public function gonggaoDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['gonggao'] = $this->getGonggao($id);
        $data['top'] = '';
        if ($data['gonggao']->gonggaoTop == 1)
            $data['top'] = '置顶';

        $type = $data['gonggao']->type;
        switch ($type) {
            case 1:
                $data['gtitle'] = '公告';
                break;

        }

        $this->load->view('common/header3');
        $this->load->view('admin/gonggao/gonggaoDetail', $data);
        $this->load->view('common/footer');
    }

    // 公告管理详细信息编辑页面
    public function gonggaoEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $temp = $this->getGonggao($id);

        $data['gonggaoId'] = $temp->gonggaoId;
        $data['title'] = $temp->title;
        $data['type'] = $temp->type;
        $data['author'] = $temp->author;
        $data['date'] = $temp->date;
        $data['content'] = $temp->content;
        $data['linkNum'] = $temp->linkNum;
        $data['gonggaoTop'] = $temp->gonggaoTop;
        $data['state'] = $temp->state;
        $data['show'] = '';
        $data['checked'] = '';
        if ($temp->gonggaoTop == 1)
            $data['checked'] = 'checked';

        switch ($data['type']) {
            case 1:
                $data['gtitle'] = '公告';
                break;
            case 2:
                $data['gtitle'] = '项目动态';
                break;
            case 3:
                $data['gtitle'] = '管理办法';
                break;
        }

        $this->load->view('common/header3');
        $this->load->view('admin/gonggao/gonggaoEdit', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息新增页面
    public function gonggaoNew() {
        $this->timeOut();
        $type = $this->uri->segment(4);

        $data['gonggaoId'] = 0;
        $data['gongGaotitle'] = '';
        $data['type'] = $type;
        $data['author'] = '';
        $data['title'] = '';
        $data['date'] = '';
        $data['content'] = '';
        $data['linkNum'] = '';
        $data['gonggaoTop'] = '';
        $data['state'] = '';
        $data['show'] = 'display:none';
        $data['checked'] = '';

        switch ($type) {
            case 1:
                $data['gtitle'] = '公告';
                break;

        }

        $this->load->view('common/header3');
        $this->load->view('admin/gonggao/gonggaoEdit', $data);
        $this->load->view('common/footer');
    }

    // 公告管理信息删除
    public function gonggaoDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $type = $this->uri->segment(5);

        $this->m_gonggao->delete($id);
        $data['gonggao'] = $this->getGonggao($id);
        $array = array('type' => $type);

        $num = $this->m_gonggao->getNum($array);
        $offset = 0;

        $data['gonggaos'] = $this->getGonggaos($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/trend/gonggaoList/' . $type;
        $config['total_rows'] = $num;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        switch ($type) {
            case 1:
                $this->load->view('admin/gonggao/bullentin', $data);
                break;
            case 2:
                $this->load->view('admin/gonggao/gonggao', $data);
                break;
            case 3:
                $this->load->view('admin/gonggao/instrument', $data);
                break;
        }
        $this->load->view('common/footer');
    }

    // 保存公告动态信息
    public function save() {
        $this->timeOut();

        $id = $this->m_gonggao->saveInfo();
        $data['gonggao'] = $this->getGonggao($id);
        $data['top'] = '';
        if ($data['gonggao']->gonggaoTop == 1)
            $data['top'] = '置顶';

        $type = $data['gonggao']->type;
        switch ($type) {
            case 1:
                $data['gtitle'] = '公告';
                break;
            case 2:
                $data['gtitle'] = '项目动态';
                break;

        }

        $this->load->view('common/header3');
        $this->load->view('admin/gonggao/gonggaoDetail', $data);
        $this->load->view('common/footer');
    }

    // 获取单个课题信息
    public function getGonggao($id) {
        $this->timeOut();
        $data = array();
        $result = $this->m_gonggao->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
            $data->state = $this->m_gonggao->getState($r->state);
        }
        return $data;
    }

    // 更改工作汇报的状态
    public function updateGonggaoState() {
        $this->timeOut();

        $id = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $array = array('state' => $state);

        $this->load->model('m_gonggao');
        $this->m_gonggao->updateGonggao($id, $array);

        $data['gonggao'] = $this->getGonggao($id);

        $this->load->view('common/header3');
        $this->load->view('admin/gonggao/detail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部课题信息
    public function getGonggaos($array, $offset) {
        $this->load->model('m_gonggao');
        $data = array();
        $result = $this->m_gonggao->getGonggaos($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('gonggaoId' => $r->gonggaoId, 'title' => $r->title,
                'type' => $r->type, 'author' => $r->author,
                'content' => $r->content, 'linkNum' => $r->linkNum, 'state' => $this->m_gonggao->getState($r->state),
                'date' => $r->date, 'gonggaoTop' => $r->gonggaoTop);
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