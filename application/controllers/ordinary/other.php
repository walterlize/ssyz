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
            $this->timeOut();

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_other');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_other->getNum($array);
            $offset = $this->uri->segment(4);

            $data['other'] = $this->getOthers($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/other/otherList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/otherList', $data);
            $this->load->view('common/footer');
        }

        // 专利详细信息页面
        public function otherDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['other'] = $this->getOther($id);
            $show = '';
            if(strcmp($data['other']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/otherDetail', $data);
            $this->load->view('common/footer');
        }

        // 专利信息页面
        public function otherEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data = $this->getOther($id);

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/otherEdit', $data);
            $this->load->view('common/footer');
        }

        // 专利新增页面
        public function otherNew(){
            $this->timeOut();
            //$type = $this->uri->segment(4);
            $data['otherId'] = 0;
            $data['subjectId'] = $this->session->userdata('subjectId');
            $data['state'] = '';
            $data['otherName'] = '';
            $data['content'] = '';
            $data['remark'] = '';
            $data['show'] = 'display:none';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/otherEdit', $data);
            $this->load->view('common/footer');
        }

        // 删除专利信息
        public function otherDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);

            $this->load->model('m_other');
            $this->m_other->delete($id);

            $subjectId = $this->session->userdata('subjectId');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_other->getNum($array);
            $offset = 0;

            $data['other'] = $this->getOthers($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/other/otherList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/otherList', $data);
            $this->load->view('common/footer');
        }

        // 更改专利的状态
        public function updateOtherState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = 0;
            $array = array('state' => $state);

            $this->load->model('m_other');
            $this->m_other->updateInfo($id, $array);

            $data['other'] = $this->getOther($id);
            $show = '';
            if(strcmp($data['other']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/otherDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个专利信息
        function getOther($id){
            $this->timeOut();
            $this->load->model('m_other');
            $data = array();
            $other = $this->m_other->getOneInfo($id);
            foreach ($other as $r){
                $data = $r;
                $data->state = $this->m_other->getState($r->state);
            }
            return $data;
        }

        // 保存专利信息
        public function save(){
            $this->timeOut();

            $this->load->model('m_other');
            $id = $this->m_other->saveInfo();
            $data['other'] = $this->getOther($id);
            $data['show'] = '';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/otherDetail', $data);
            $this->load->view('common/footer');
        }

        // 分页获取专利信息
        function getOthers($array, $offset){
            $this->timeOut();
            $this->load->model('m_other');
            $data = array();
            $other = $this->m_other->getOthers($array, PER_PAGE, $offset);

            foreach ($other as $r){
                $arr = array('otherId' => $r->otherId, 'subjectId' => $r->subjectId,
                    'state' => $r->state, 'otherName' => $r->otherName,
                    'content' => $r->content, 'state' => $this->m_other->getState($r->state),
                    'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }

        // session中的role不存在的时候退出系统
        function timeOut(){
            $role = $this->session->userdata('roleId');

            if($role != 2){
                $this->load->view('logout');
            }
        }
}
?>