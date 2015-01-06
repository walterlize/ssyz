<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {

        function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
            ini_set('max_execution_time', '0');
            date_default_timezone_set('PRC');
	}

        public function index(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';

            $data['title'] = '联系我们';

            $this->load->model('m_contact');
            $num = $this->m_contact->getNum(array());
            $offset = $this->uri->segment(4);

            $data['contact'] = $this->getContacts($offset);
            $config['base_url'] = base_url().'index.php/outside/contact/index';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('includes/header', $title);
            $this->load->view('includes/left');
            $this->load->view('outside/contactList', $data);
            $this->load->view('includes/center_foot');
            $this->load->view('includes/footer');
        }

        /*// 课题详细信息页面
        public function contactDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data = $this->getContact($id);

            $this->load->view('common/header3');
            $this->load->view('admin/contact/contactDetail', $data);
            $this->load->view('common/footer');
        }

        // 用户信息编辑页面
        public function contactEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['contact'] = $this->getContact($id);

            $this->load->view('common/header3');
            $this->load->view('admin/contact/contactEdit', $data);
            $this->load->view('common/footer');
        }


        // 课题详细信息新增页面
        public function ContactNew(){
            $this->timeOut();

            $contact->contactId = 0;
            $contact->personName = '';
            $contact->firm = '';
            $contact->email = '';
            $contact->remark = '';
            $data['contact'] = $contact;
            $data['show'] = 'display:none';

            $this->load->view('common/header3');
            $this->load->view('admin/contact/contactEdit', $data);
            $this->load->view('common/footer');
        }

        public function contactDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $this->load->model('m_contact');
            $this->m_contact->delete($id);

            $num = $this->m_contact->getNum(array());
            $offset = 0;

            $data['contact'] = $this->getContacts($offset);
            $config['base_url'] = base_url().'index.php/admin/contact/contactList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/contact/contact', $data);
            $this->load->view('common/footer');
        }

        // 保存课题信息
        public function save(){
            $this->timeOut();

            $this->load->model('m_contact');
            $id = $this->m_contact->saveInfo();
            $data = $this->getContact($id);

            $this->load->view('common/header3');
            $this->load->view('admin/contact/contactDetail', $data);
            $this->load->view('common/footer');
        }*/

        // 分页获取全部课题信息
        public function getContacts($offset){
            $this->load->model('m_contact');
            $data = array();
            $result = $this->m_contact->getContacts($data, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('contactId' => $r->contactId, 'personName' => $r->personName,
                    'firm' => $r->firm, 'email' => $r->email,
                    'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }

        /*// 获取单个用户信息
        function getContact($id){
            $this->load->model('m_contact');
            $result = $this->m_contact->getOneInfo($id);
            $data = array();
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }*/
}
?>