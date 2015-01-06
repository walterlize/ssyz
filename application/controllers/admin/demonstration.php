<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Demonstration extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function demonstrationList(){
            $this->timeOut();
            $this->load->model('m_demonstration');
            $array = array();

            $num = $this->m_demonstration->getNum($array);
            $offset = $this->uri->segment(4);

            $data['demonstration'] = $this->getDemonstrations($array, $offset);
            $config['base_url'] = base_url().'index.php/admin/demonstration/demonstrationList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/demonstrationList', $data);
            $this->load->view('common/footer');
        }

        // 专利详细信息页面
        public function demonstrationDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['demonstration'] = $this->getDemonstration($id);
            $show = '';
            if(strcmp($data['demonstration']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/demonstrationDetail', $data);
            $this->load->view('common/footer');
        }

        // 更改专利的状态
        public function updateDemonstrationState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = $this->uri->segment(5);
            $array = array('state' => $state);

            $this->load->model('m_demonstration');
            $this->m_demonstration->updateInfo($id, $array);

            $data['demonstration'] = $this->getDemonstration($id);

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/demonstrationDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个专利信息
        function getDemonstration($id){
            $this->timeOut();
            $this->load->model('m_demonstration');
            $data = array();
            $demonstration = $this->m_demonstration->getOneInfo($id);
            foreach ($demonstration as $r){
                $data = $r;
                $data->stateInfo = $this->m_demonstration->getState($r->state);
            }
            return $data;
        }

        // 分页获取专利信息
        function getDemonstrations($array, $offset){
            $this->timeOut();
            $this->load->model('m_demonstration');
            $data = array();
            $demonstration = $this->m_demonstration->getDemonstrations($array, PER_PAGE, $offset);

            foreach ($demonstration as $r){
                $arr = array('demonstrationId' => $r->demonstrationId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'introduction' => $r->introduction,
                    'technique' => $r->technique, 'state' => $this->m_demonstration->getState($r->state),
                    'place' => $r->place, 'area' => $r->area, 'remark' => $r->remark);
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