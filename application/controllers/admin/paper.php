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

            $this->load->model('m_paper');
            $array = array();

            $num = $this->m_paper->getNum($array);
            $offset = $this->uri->segment(4);

            $data['paper'] = $this->getPapers($array, $offset);
            $config['base_url'] = base_url().'index.php/admin/paper/paperList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/paperList', $data);
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
            $this->load->view('admin/achievement/paperDetail', $data);
            $this->load->view('common/footer');
        }

        // 更改工作汇报的状态
        public function updatePaperState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = $this->uri->segment(5);
            $array = array('state' => $state);

            $this->load->model('m_paper');
            $this->m_paper->updateInfo($id, $array);

            $data['paper'] = $this->getPaper($id);

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/paperDetail', $data);
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
                $time = explode('-', $r->time);
                $year = $time['0'];
                $data->year = $year;
                $data->stateInfo = $this->m_paper->getState($r->state);
            }
            return $data;
        }

        // 分页获取全部课题信息
        function getPapers($array, $offset){
            $this->timeOut();
            $this->load->model('m_paper');
            $data = array();
            $result = $this->m_paper->getPapers($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('paperId' => $r->paperId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
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

        // session中的role不存在的时候退出系统
        function timeOut(){
            $role = $this->session->userdata('roleId');

            if($role != 1){
                $this->load->view('logout');
            }
        }
}
?>