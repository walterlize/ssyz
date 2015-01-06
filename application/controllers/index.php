<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Index extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('m_user');
    }

    public function index() {
        $data['title'] = "设施养殖数字化智能管理技术设备研究";
        // 公告信息
        $array = array('trendType' => 1, 'state' => 2);
        $data['bullentins'] = $this->getTrend($array);
        $array = array('trendType' => 2, 'state' => 2);
        $data['instruments'] = $this->getTrend($array);
        $array = array('trendType' => 3, 'state' => 2);
        $data['trends'] = $this->getTrend($array);
        // 用户登录部分
        $name = $this->session->userdata('userName');
        $data['userId'] = $this->session->userdata('userId');
        if ($name == '' || $name == null) {
            $data['form'] = '';
            $data['welcome'] = 'display:none';
        } else {
            $data['username'] = $name;
            $data['form'] = 'display:none';
            $data['welcome'] = '';
        }
        $this->load->view('index/head', $data);
        $this->load->view('index/index');
        $this->load->view('index/footer');
    }

    // 登陆
    public function login() {
        $userName = $this->input->post('userName');
        $password = $this->input->post('password');
        $array = array('userName' => $userName, 'password' => $password);

        $result = $this->m_user->getUser($array);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        if (isset($data->userName)) {
            $array = array('userId' => $data->userId, 'userName' => $data->userName, 'subjectName' => $data->subjectName,
                'roleId' => $data->roleId, 'subjectId' => $data->subjectId, 'subjectUnit' => $data->subjectUnit);
            $this->session->set_userdata($array);
            if ($data->roleId == 1) {
                redirect('admin/frame/index');
            } elseif ($data->roleId == 2) {
                redirect('manager/frame/index');
            } elseif ($data->roleId == 3) {
                redirect('ordinary/frame/index');
            }
        } else {
            redirect(base_url());
        }
    }

    // 已登陆再次登陆
    public function getin() {
        $id = $this->uri->segment(3);
        $result = $this->m_user->getOneInfo($id);
   
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        if (isset($data->userName)) {
            if ($data->roleId == 1) {
                redirect('admin/frame/index');
            } else {
                redirect('manager/frame/index');
            }
        } else {
            redirect(base_url());
        }
    }

    public function top() {
        $data['name'] = $this->session->userdata('userName');
        $this->load->view('common/top', $data);
    }

    public function foot() {
        $this->load->view('common/foot');
    }

    public function getTrend($array) {
        $this->load->model('m_trend');
        $data = $this->m_trend->getTrends($array, 3, 0);
        return $data;
    }

    public function timeOut() {
        $array = array();
        $this->session->set_userdata($array);
        $this->session->sess_destroy();
        $this->load->view('time_out');
    }

    public function logOut() {
        $array = array();
        $this->session->set_userdata($array);
        $this->session->sess_destroy();
        redirect(base_url());
    }

}

?>