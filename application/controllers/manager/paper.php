<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paper extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 论文列表页面
        public function paperList(){
            $this->timeOut();

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_paper');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_paper->getNum($array);
            $offset = $this->uri->segment(4);

            $data['paper'] = $this->getPapers($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/paper/paperList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/paperList', $data);
            $this->load->view('common/footer');
        }

        // 论文详细信息页面
        public function paperDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['paper'] = $this->getPaper($id);
            $show = '';
            if(strcmp($data['paper']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/paperDetail', $data);
            $this->load->view('common/footer');
        }

        // 公告管理编辑信息页面
        public function paperEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data = $this->getPaper($id);

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/paperEdit', $data);
            $this->load->view('common/footer');
        }

        // 公告管理编辑信息页面
        public function paperNew(){
            $this->timeOut();
            //$type = $this->uri->segment(4);
            $data['paperId'] = 0;
            $data['subjectId'] = $this->session->userdata('subjectId');
            $data['state'] = '';
            $data['paperName'] = '';
            $data['publication'] = '';
            $data['time'] = '';
            $data['volume'] = '';
            $data['period'] = '';
            $data['fromPage'] = '';
            $data['endPage'] = '';
            $data['type'] = '';
            $data['record'] = '';
            $data['author'] = '';
            $data['authorWorkplace'] = '';
            $data['remark'] = '';
            $data['show'] = 'display:none';
            $data['types'] = $this->getTypes();
            $data['records'] = $this->getRecords();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/paperEdit', $data);
            $this->load->view('common/footer');
        }

        public function paperDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);

            $this->load->model('m_paper');
            $this->m_paper->delete($id);

            $subjectId = $this->session->userdata('subjectId');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_paper->getNum($array);
            $offset = 0;

            $data['paper'] = $this->getPapers($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/paper/paperList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/paperList', $data);
            $this->load->view('common/footer');
        }

        // 更改工作汇报的状态
        public function updatePaperState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = 0;
            $array = array('state' => $state);

            $this->load->model('m_paper');
            $this->m_paper->updateInfo($id, $array);

            $data['paper'] = $this->getPaper($id);
            $show = '';
            if(strcmp($data['paper']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/paperDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个课题信息
        function getPaper($id){
            $this->timeOut();
            $this->load->model('m_paper');
            $data = array();
            $result = $this->m_paper->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
                $data->state = $this->m_paper->getState($r->state);
                $data->types = $this->getTypes();
                $data->records = $this->getRecords();
            }
            return $data;
        }

        // 保存公告动态信息
        public function save(){
            $this->timeOut();

            $this->load->model('m_paper');
            $id = $this->m_paper->saveInfo();
            $data['paper'] = $this->getPaper($id);
            $data['show'] = '';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/paperDetail', $data);
            $this->load->view('common/footer');
        }

        // 分页获取全部课题信息
        function getPapers($array, $offset){
            $this->timeOut();
            $this->load->model('m_paper');
            $data = array();
            $result = $this->m_paper->getPapers($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('paperId' => $r->paperId, 'subjectId' => $r->subjectId,
                    'state' => $r->state, 'paperName' => $r->paperName,
                    'publication' => $r->publication, 'time' => $r->time,
                    'volume' => $r->volume, 'state' => $this->m_paper->getState($r->state),
                    'period' => $r->period, 'fromPage' => $r->fromPage,
                    'endPage' => $r->endPage, 'type' => $r->type,
                    'record' => $r->record, 'author' => $r->author,
                    'authorWorkplace' => $r->authorWorkplace, 'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }

        // 获取论文类型
        function getTypes(){
            $this->load->model('common');
            $data = $this->common->getPaperType();
            return $data;
        }

        // 获取论文收录情况
        function getRecords(){
            $this->load->model('common');
            $data = $this->common->getPaperRecord();
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