<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    public function userList() {
        $this->timeOut();
        $roleId = 3;
        $subjectId = $this->session->userdata('subjectId');
        $this->load->model('m_user');
        $array = array('roleId' => $roleId, 'inherit' => $subjectId);

        $num = $this->m_user->getNum($array);
        $offset = $this->uri->segment(4);

        $data['user'] = $this->getUsers($offset, $array);
        $config['base_url'] = base_url() . 'index.php/manager/user/userList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('manager/user/user', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息页面
    public function userDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data = $this->getUser($id);

        $this->load->view('common/header3');
        $this->load->view('manager/user/userDetail', $data);
        $this->load->view('common/footer');
    }

    // 用户信息编辑页面
    public function userEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['user'] = $this->getUser($id);
        $data['subject'] = $this->getSubjects();
        $data['roles'] = $this->getRoles();
        $data['workplace'] = $this->getWorkplace();
        if ($data['user']->state == "已激活") {
            $data['showActive'] = 'display:none';
            $data['showUnactive'] = '';
        } else {
            $data['showActive'] = '';
            $data['showUnactive'] = 'display:none';
        }

        $this->load->view('common/header3');
        $this->load->view('manager/user/userEdit', $data);
        $this->load->view('common/footer');
    }

    // 注销、激活账号
    public function userUpdate() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $state = $this->uri->segment(5);

        $array = array('state' => $state);
        $this->load->model('m_user');
        $this->m_user->updateUserinfo($id, $array);

        $data['user'] = $this->getUser($id);
        $data['subject'] = $this->getSubjects();
        $data['roles'] = $this->getRoles();
        if ($data['user']->state == "已激活") {
            $data['showActive'] = 'display:none';
            $data['showUnactive'] = '';
        } else {
            $data['showActive'] = '';
            $data['showUnactive'] = 'display:none';
        }

        $this->load->view('common/header3');
        $this->load->view('manager/user/userEdit', $data);
        $this->load->view('common/footer');
    }

    // 课题详细信息新增页面
    public function userNew() {
        $this->timeOut();
        $user = new stdClass();
        $user->userId = 0;
        $user->userName = '';
        $user->password = '';
        $user->roleId = '';
        $user->subjectId = 0;
        //$user->subjectUnit = '';
        $user->state = '';
        $data['user'] = $user;
        $subjectId = $this->session->userdata('subjectId');
        $array = array('type' => 'Ordinary', 'inherit' => $subjectId);
        $data['subject'] = $this->getSubjects3($array);
        //$data['roles'] = $this->getRoles();
        $data['show'] = 'display:none';
        $data['showActive'] = 'display:none';
        $data['showUnactive'] = 'display:none';

        $this->load->view('common/header3');
        $this->load->view('manager/user/userEdit', $data);
        $this->load->view('common/footer');
    }

    public function userDelete() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $this->load->model('m_user');
        $this->m_user->delete($id);

        $num = $this->m_user->getNum(array());
        $offset = 0;

        $data['user'] = $this->getUsers($offset);
        $config['base_url'] = base_url() . 'index.php/manager/user/userList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('manager/user/user', $data);
        $this->load->view('common/footer');
    }

    // 保存课题信息
    public function save() {
        $this->timeOut();

        $this->load->model('m_user');
        $id = $this->m_user->saveInfo();
        $data = $this->getUser($id);

        $this->load->view('common/header3');
        $this->load->view('manager/user/userDetail', $data);
        $this->load->view('common/footer');
    }

    // 分页获取全部课题信息
    public function getUsers($offset, $array) {
        $this->timeOut();
        $this->load->model('m_user');

        $result = $this->m_user->getUsers1(PER_PAGE, $offset, $array);
        $data = array();
        foreach ($result as $r) {
            $arr = array('userId' => $r->userId, 'userName' => $r->userName,
                'password' => $r->password, 'roleId' => $r->roleId,
                'subjectId' => $r->subjectId, 'state' => $this->m_user->getState($r->state),
                'subjectName' => $r->subjectName, 'subjectUnit' => $r->subjectUnit, 'roleName' => $r->roleName);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取单个用户信息
    function getUser($id) {
        $this->load->model('m_user');
        $result = $this->m_user->getOneInfo($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
            $data->state = $this->m_user->getState($r->state);
        }
        return $data;
    }

    // 获取课题信息
    public function getSubjects() {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getSubject2($data);
        return $result;
    }
 // 获取课题信息
    public function getSubjects3($array) {
        $this->timeOut();
        $this->load->model('m_subject');

        
        $result = $this->m_subject->getSubject($array);
        return $result;
    }
    // 获取课题信息
    public function getWorkplace() {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getWorkplace($data);
        return $result;
    }

    public function getRoles() {
        $this->load->model('m_role');
        $data = $this->m_role->getRole(array());
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 2) {
            $this->load->view('logout');
        }
    }

}

?>