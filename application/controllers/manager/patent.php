<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Patent extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function patentList(){
            $this->timeOut();

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_patent');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_patent->getNum($array);
            $offset = $this->uri->segment(4);

            $data['patent'] = $this->getPatents($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/patent/patentList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/patentList', $data);
            $this->load->view('common/footer');
        }

        // 专利详细信息页面
        public function patentDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['patent'] = $this->getPatent($id);
            $show = '';
            if(strcmp($data['patent']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/patentDetail', $data);
            $this->load->view('common/footer');
        }

        // 专利信息页面
        public function patentEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data = $this->getPatent($id);

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/patentEdit', $data);
            $this->load->view('common/footer');
        }

        // 专利新增页面
        public function patentNew(){
            $this->timeOut();
            //$type = $this->uri->segment(4);
            $data['patentId'] = 0;
            $data['subjectId'] = $this->session->userdata('subjectId');
            $data['state'] = '';
            $data['patentName'] = '';
            $data['type'] = '';
            $data['patentNum'] = '';
            $data['author'] = '';
            $data['patentState'] = '';
            $data['applyTime'] = '';
            $data['authorizeTime'] = '';
            $data['workplace'] = '';
            $data['remark'] = '';
            $data['show'] = 'display:none';
            $data['types'] = $this->getTypes();
            $data['states'] = $this->getStates();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/patentEdit', $data);
            $this->load->view('common/footer');
        }

        // 删除专利信息
        public function patentDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);

            $this->load->model('m_patent');
            $this->m_patent->delete($id);

            $subjectId = $this->session->userdata('subjectId');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_patent->getNum($array);
            $offset = 0;

            $data['patent'] = $this->getPatents($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/patent/patentList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/patentList', $data);
            $this->load->view('common/footer');
        }

        // 更改专利的状态
        public function updatePatentState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = 0;
            $array = array('state' => $state);

            $this->load->model('m_patent');
            $this->m_patent->updateInfo($id, $array);

            $data['patent'] = $this->getPatent($id);
            $show = '';
            if(strcmp($data['patent']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/patentDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个专利信息
        function getPatent($id){
            $this->timeOut();
            $this->load->model('m_patent');
            $data = array();
            $result = $this->m_patent->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
                $data->state = $this->m_patent->getState($r->state);
                $data->types = $this->getTypes();
                $data->states = $this->getStates();
            }
            return $data;
        }

        // 保存专利信息
        public function save(){
            $this->timeOut();

            $this->load->model('m_patent');
            $id = $this->m_patent->saveInfo();
            $data['patent'] = $this->getPatent($id);
            $data['show'] = '';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/patentDetail', $data);
            $this->load->view('common/footer');
        }

        // 分页获取专利信息
        function getPatents($array, $offset){
            $this->timeOut();
            $this->load->model('m_patent');
            $data = array();
            $result = $this->m_patent->getPatents($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('patentId' => $r->patentId, 'subjectId' => $r->subjectId,
                    'state' => $r->state, 'patentName' => $r->patentName,
                    'patentNum' => $r->patentNum, 'author' => $r->author,
                    'patentState' => $r->patentState, 'state' => $this->m_patent->getState($r->state),
                    'applyTime' => $r->applyTime, 'authorizeTime' => $r->authorizeTime,
                    'workplace' => $r->workplace, 'type' => $r->type,
                    'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }

        // 获取专利类型
        function getTypes(){
            $this->load->model('common');
            $data = $this->common->getPatentType();
            return $data;
        }

        // 获取专利状态
        function getStates(){
            $this->load->model('common');
            $data = $this->common->getPatentState();
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