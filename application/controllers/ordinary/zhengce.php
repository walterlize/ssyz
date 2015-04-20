<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Zhengce extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_zhengce');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function zhengceList() {
        $this->timeOut();

        $num = $this->m_zhengce->getNum(array());
        $offset = $this->uri->segment(4);
        $data['zhengce'] = $this->getZhengces($offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/zhengce/zhengceList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('ordinary/zhengce/zhengceList', $data);
        $this->load->view('common/footer');
    }

    //获取详细信息
    function detail() {
        $id = $this->uri->segment(4);

        $data = $this->getZhengce($id);

        $this->load->view('common/header3');
        $this->load->view('ordinary/zhengce/showdetail', $data);
      $this->load->view('common/footer');
    }

    // 分页获取全部课题信息
    public function getZhengces($offset) {
        $this->timeOut();
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

    // 获取单个用户信息
    function getZhengce($id) {

        $result = $this->m_zhengce->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

//获取已有的填充信息
    function getData($id) {
        $result = $this->m_zhengce->getOneInfo($id);
        foreach ($result as $r) {
            $data['z_id'] = $r->z_id;
            $data['date'] = $r->date;
            $data['type'] = $r->type;
            $data['state'] = $r->state;
            $data['title'] = $r->title;
            $data['content'] = $r->content;
            $data['title1'] = '政策规定编辑';
        }
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 3) {
            $this->load->view('logout');
        }
    }

}

?>