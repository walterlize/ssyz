<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 专利列表页面
        public function resultList(){
            $this->timeOut();

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_result');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_result->getNum($array);
            $offset = $this->uri->segment(4);

            $data['result'] = $this->getResults($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/result/resultList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/resultList', $data);
            $this->load->view('common/footer');
        }

        // 专利详细信息页面
        public function resultDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['result'] = $this->getResult($id);
            $show = '';
            if(strcmp($data['result']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/resultDetail', $data);
            $this->load->view('common/footer');
        }

        // 专利信息页面
        public function resultEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data = $this->getResult($id);

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/resultEdit', $data);
            $this->load->view('common/footer');
        }

        // 专利新增页面
        public function resultNew(){
            $this->timeOut();
            //$type = $this->uri->segment(4);
            $data['resultId'] = 0;
            $data['subjectId'] = $this->session->userdata('subjectId');
            $data['state'] = '';
            $data['resultName'] = '';
            $data['author'] = '';            
            $data['time'] = '';
            $data['workplace'] = '';
            $data['opinion'] = '';
            $data['remark'] = '';
            $data['show'] = 'display:none';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/resultEdit', $data);
            $this->load->view('common/footer');
        }

        // 删除专利信息
        public function resultDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);

            $this->load->model('m_result');
            $this->m_result->delete($id);

            $subjectId = $this->session->userdata('subjectId');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_result->getNum($array);
            $offset = 0;

            $data['result'] = $this->getResults($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/result/resultList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/resultList', $data);
            $this->load->view('common/footer');
        }

        // 更改专利的状态
        public function updateResultState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = 0;
            $array = array('state' => $state);

            $this->load->model('m_result');
            $this->m_result->updateInfo($id, $array);

            $data['result'] = $this->getResult($id);
            $show = '';
            if(strcmp($data['result']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/resultDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个专利信息
        function getResult($id){
            $this->timeOut();
            $this->load->model('m_result');
            $data = array();
            $result = $this->m_result->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
                $data->state = $this->m_result->getState($r->state);
            }
            return $data;
        }

        // 保存专利信息
        public function save(){
            $this->timeOut();

            $this->load->model('m_result');
            $id = $this->m_result->saveInfo();
            $data['result'] = $this->getResult($id);
            $data['show'] = '';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/resultDetail', $data);
            $this->load->view('common/footer');
        }

        // 分页获取专利信息
        function getResults($array, $offset){
            $this->timeOut();
            $this->load->model('m_result');
            $data = array();
            $result = $this->m_result->getResults($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('resultId' => $r->resultId, 'subjectId' => $r->subjectId,
                    'state' => $r->state, 'resultName' => $r->resultName,
                    'author' => $r->author, 'state' => $this->m_result->getState($r->state),
                    'opinion' => $r->opinion, 'time' => $r->time,
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