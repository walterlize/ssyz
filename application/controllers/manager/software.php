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
            $array = array('subjectId' => $subjectId);

            $num = $this->m_software->getNum($array);
            $offset = $this->uri->segment(4);

            $data['software'] = $this->getSoftwares($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/software/softwareList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/softwareList', $data);
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
            $this->load->view('manager/achievement/softwareDetail', $data);
            $this->load->view('common/footer');
        }

        // 专利信息页面
        public function softwareEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data = $this->getSoftware($id);

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/softwareEdit', $data);
            $this->load->view('common/footer');
        }

        // 专利新增页面
        public function softwareNew(){
            $this->timeOut();
            //$type = $this->uri->segment(4);
            $data['softwareId'] = 0;
            $data['subjectId'] = $this->session->userdata('subjectId');
            $data['state'] = '';
            $data['softwareName'] = '';
            $data['author'] = '';
            $data['authorizeNum'] = '';
            $data['time'] = '';
            $data['workplace'] = '';
            $data['remark'] = '';
            $data['show'] = 'display:none';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/softwareEdit', $data);
            $this->load->view('common/footer');
        }

        // 删除专利信息
        public function softwareDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);

            $this->load->model('m_software');
            $this->m_software->delete($id);

            $subjectId = $this->session->userdata('subjectId');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_software->getNum($array);
            $offset = 0;

            $data['software'] = $this->getSoftwares($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/software/softwareList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/softwareList', $data);
            $this->load->view('common/footer');
        }

        // 更改专利的状态
        public function updateSoftwareState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = 0;
            $array = array('state' => $state);

            $this->load->model('m_software');
            $this->m_software->updateInfo($id, $array);

            $data['software'] = $this->getSoftware($id);
            $show = '';
            if(strcmp($data['software']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/softwareDetail', $data);
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
                $data->state = $this->m_software->getState($r->state);
            }
            return $data;
        }

        // 保存专利信息
        public function save(){
            $this->timeOut();

            $this->load->model('m_software');
            $id = $this->m_software->saveInfo();
            $data['software'] = $this->getSoftware($id);
            $data['show'] = '';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/softwareDetail', $data);
            $this->load->view('common/footer');
        }

        // 分页获取专利信息
        function getSoftwares($array, $offset){
            $this->timeOut();
            $this->load->model('m_software');
            $data = array();
            $result = $this->m_software->getSoftwares($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('softwareId' => $r->softwareId, 'subjectId' => $r->subjectId,
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

            if($role != 2) {
                if ($role != 3) {
                    $this->load->view('logout');

                }
            }
        }
}
?>