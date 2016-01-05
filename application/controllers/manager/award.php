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

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_award');
            $roleId=$this->session->userdata('roleId');
            if($roleId==2){
                $array = array('inherit' => $subjectId);
            }elseif($roleId==3){
                $array=array('subjectId'=>$subjectId);
            }else{
                echo '报奖页面有误,请联系管理员处理';
            }

            $num = $this->m_award->getNum($array);
            $offset = $this->uri->segment(4);

            $data['award'] = $this->getAwards($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/award/awardList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/awardList', $data);
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
            $this->load->view('manager/achievement/awardDetail', $data);
            $this->load->view('common/footer');
        }

        // 专利信息页面
        public function awardEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data = $this->getAward($id);

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/awardEdit', $data);
            $this->load->view('common/footer');
        }

        // 专利新增页面
        public function awardNew(){
            $this->timeOut();
            //$type = $this->uri->segment(4);
            $data['awardId'] = 0;
            $data['subjectId'] = $this->session->userdata('subjectId');
            $data['state'] = '';
            $data['awardName'] = '';
            $data['author'] = '';            
            $data['workplace'] = '';
            $data['type'] = '';
            $data['grade'] = '';
            $data['level'] = '';
            $data['awardState'] = '';
            $data['processWorkplace'] = '';
            $data['organizationDepart'] = '';
            $data['issueDepart'] = '';
            $data['remark'] = '';
            $data['show'] = 'display:none';
            $data['types'] = $this->getTypes();
            $data['grades'] = $this->getGrades();
            $data['levels'] = $this->getLevels();
            $data['states'] = $this->getStates();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/awardEdit', $data);
            $this->load->view('common/footer');
        }

        // 删除专利信息
        public function awardDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);

            $this->load->model('m_award');
            $this->m_award->delete($id);

            $subjectId = $this->session->userdata('subjectId');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_award->getNum($array);
            $offset = 0;

            $data['award'] = $this->getAwards($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/award/awardList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/awardList', $data);
            $this->load->view('common/footer');
        }

        // 更改专利的状态
        public function updateAwardState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = 0;
            $array = array('state' => $state);

            $this->load->model('m_award');
            $this->m_award->updateInfo($id, $array);

            $data['award'] = $this->getAward($id);
            $show = '';
            if(strcmp($data['award']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/awardDetail', $data);
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
                $data->state = $this->m_award->getState($r->state);
                $data->types = $this->getTypes();
                $data->grades = $this->getGrades();
                $data->levels = $this->getLevels();
                $data->states = $this->getStates();
            }
            return $data;
        }

        // 保存专利信息
        public function save(){
            $this->timeOut();

            $this->load->model('m_award');
            $id = $this->m_award->saveInfo();
            $data['award'] = $this->getAward($id);
            $data['show'] = '';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/awardDetail', $data);
            $this->load->view('common/footer');
        }

        // 分页获取专利信息
        function getAwards($array, $offset){
            $this->timeOut();
            $this->load->model('m_award');
            $data = array();
            $result = $this->m_award->getAwards($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('awardId' => $r->awardId, 'subjectId' => $r->subjectId,
                    'state' => $r->state, 'awardName' => $r->awardName,
                    'author' => $r->author, 'state' => $this->m_award->getState($r->state),
                    'grade' => $r->grade, 'level' => $r->level, 'awardState' => $r->awardState,
                    'processWorkplace' => $r->processWorkplace, 'issueDepart' => $r->issueDepart,
                    'organizationDepart' => $r->organizationDepart,
                    'workplace' => $r->workplace, 'type' => $r->type,
                    'subjectUnit' => $r->subjectUnit,'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }

        // 获取专利类型
        function getTypes(){
            $this->load->model('common');
            $data = $this->common->getAwardType();
            return $data;
        }

        // 获取专利类型
        function getGrades(){
            $this->load->model('common');
            $data = $this->common->getAwardGrade();
            return $data;
        }

        // 获取专利类型
        function getLevels(){
            $this->load->model('common');
            $data = $this->common->getAwardLevel();
            return $data;
        }

        // 获取专利类型
        function getStates(){
            $this->load->model('common');
            $data = $this->common->getAwardState();
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