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
            $this->timeOut();

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_software');
            $array = array();

            $num = $this->m_software->getNum($array);
            $offset = $this->uri->segment(4);

            $data['software'] = $this->getSoftwares($array, $offset);
            $config['base_url'] = base_url().'index.php/admin/software/softwareList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/softwareList', $data);
            $this->load->view('common/footer');
        }

        // 专利详细信息页面
        public function softwareDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['software'] = $this->getSoftware($id);
            $show = '';
            if(strcmp($data['software']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/softwareDetail', $data);
            $this->load->view('common/footer');
        }

        // 更改专利的状态
        public function updateSoftwareState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = $this->uri->segment(5);
            $array = array('state' => $state);

            $this->load->model('m_software');
            $this->m_software->updateInfo($id, $array);

            $data['software'] = $this->getSoftware($id);

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/softwareDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个专利信息
        function getSoftware($id){
            $this->timeOut();
            $this->load->model('m_software');
            $data = array();
            $result = $this->m_software->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
                $data->stateInfo = $this->m_software->getState($r->state);
            }
            return $data;
        }

        // 分页获取专利信息
        function getSoftwares($array, $offset){
            $this->timeOut();
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

        // session中的role不存在的时候退出系统
        function timeOut(){
            $role = $this->session->userdata('roleId');

            if($role != 1){
                $this->load->view('logout');
            }
        }
}
?>