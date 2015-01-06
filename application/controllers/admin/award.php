<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Award extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function awardList(){
            $this->timeOut();
            $this->load->model('m_award');
            $array = array();

            $num = $this->m_award->getNum($array);
            $offset = $this->uri->segment(4);

            $data['award'] = $this->getAwards($array, $offset);
            $config['base_url'] = base_url().'index.php/admin/award/awardList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/awardList', $data);
            $this->load->view('common/footer');
        }

        // 专利详细信息页面
        public function awardDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['award'] = $this->getAward($id);
            $show = '';
            if(strcmp($data['award']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/awardDetail', $data);
            $this->load->view('common/footer');
        }
        
        // 更改专利的状态
        public function updateAwardState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = $this->uri->segment(5);
            $array = array('state' => $state);

            $this->load->model('m_award');
            $this->m_award->updateInfo($id, $array);

            $data['award'] = $this->getAward($id);

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/awardDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个专利信息
        function getAward($id){
            $this->timeOut();
            $this->load->model('m_award');
            $data = array();
            $result = $this->m_award->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
                $data->stateInfo = $this->m_award->getState($r->state);
            }
            return $data;
        }

        // 分页获取专利信息
        function getAwards($array, $offset){
            $this->timeOut();
            $this->load->model('m_award');
            $data = array();
            $result = $this->m_award->getAwards($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('awardId' => $r->awardId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'awardName' => $r->awardName,
                    'author' => $r->author, 'state' => $this->m_award->getState($r->state),
                    'grade' => $r->grade, 'level' => $r->level, 'awardState' => $r->awardState,
                    'processWorkplace' => $r->processWorkplace, 'issueDepart' => $r->issueDepart,
                    'organizationDepart' => $r->organizationDepart,
                    'workplace' => $r->workplace, 'type' => $r->type,
                    'remark' => $r->remark);
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