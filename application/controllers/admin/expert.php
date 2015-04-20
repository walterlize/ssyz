<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Expert extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 课题管理页面
        public function expertList(){
            $this->timeOut();

            $this->load->model('m_expert');
            $num = $this->m_expert->getNum();
            $offset = $this->uri->segment(4);

            $data['expert'] = $this->getExperts($offset);
            $config['base_url'] = base_url().'index.php/admin/expert/expertList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/subject/expert', $data);
            $this->load->view('common/footer');
        }

        // 课题详细信息页面
        public function expertDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data = $this->getExpert($id);

            $this->load->view('common/header3');
            $this->load->view('admin/subject/expertDetail', $data);
            $this->load->view('common/footer');
        }

        // 课题详细信息编辑页面
        public function expertEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['expert'] = $this->getExpert($id);
            $data['subject'] = $this->getSubjects();
            $data['types'] = $this->getType();

            $this->load->view('common/header3');
            $this->load->view('admin/subject/expertEdit', $data);
            $this->load->view('common/footer');
        }

        // 课题详细信息新增页面
        public function expertNew(){
            $this->timeOut();

           @$expert->expertId = 0;
            $expert->name = '';
            $expert->type = '';
            $expert->firm = '';
            $expert->title = '';
            $expert->email = '';
            $expert->subjectId = 0;
            $expert->subjectName = '';
            $expert->remark = '';
            $data['expert'] = $expert;
            $data['subject'] = $this->getSubjects();
            $data['types'] = $this->getType();
            $data['show'] = 'display:none';

            $this->load->view('common/header3');
            $this->load->view('admin/subject/expertEdit', $data);
            $this->load->view('common/footer');
        }

        public function expertDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $this->load->model('m_expert');
            $this->m_expert->delete($id);

            $num = $this->m_expert->getNum();
            $offset = 0;

            $data['expert'] = $this->getExperts($offset);
            $config['base_url'] = base_url().'index.php/admin/expert/expertList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/subject/expert', $data);
            $this->load->view('common/footer');
        }

        // 保存课题信息
        public function save(){
            $this->timeOut();

            $this->load->model('m_expert');
            $id = $this->m_expert->saveInfo();
            $data = $this->getExpert($id);

            $this->load->view('common/header3');
            $this->load->view('admin/subject/expertDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个课题信息
        public function getExpert($id){
            $this->timeOut();
            $this->load->model('m_expert');
            $data = array();
            $result = $this->m_expert->getOneInfo($id);
            foreach ($result as $r){                
                $data = $r;
                $data->expertType = $this->m_expert->getType($r->type);
                $data->subjectName = $this->getSubjectName($r->subjectId);
            }
            return $data;
        }

        // 分页获取全部课题信息
        public function getExperts($offset){
            $this->timeOut();
            $this->load->model('m_expert');
            $data = array();
            $result = $this->m_expert->getExperts($data, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('expertId' => $r->expertId, 'name' => $r->name,'type' => $this->m_expert->getType($r->type),
                    'firm' => $r->firm, 'subjectName' => $this->getSubjectName($r->subjectId));
                array_push($data, $arr);
            }
            return $data;
        }

        // 获取课题信息
        public function getSubjects(){
            $this->load->model('m_subject');
            $data = array();
            $result = $this->m_subject->getSubject($data);
            return $result;
        }

        // 获取课题名称
        public function getSubjectName($id){
            $this->load->model('m_subject');
            $result = $this->m_subject->getOneInfo($id);
            $name = '';
            foreach($result as $r){
                $name = $r->subjectName;
            }
            return $name;
        }

        public function getType(){
            $this->load->model('common');
            $data = $this->common->getExpertType();
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