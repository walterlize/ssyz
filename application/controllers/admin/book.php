<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Book extends CI_Controller {

        function __construct()
	{
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->library('session');
            $this->load->library('pagination');
	}

        // 论文列表页面
        public function bookList(){
            $this->timeOut();

            $this->load->model('m_book');
            $array = array();

            $num = $this->m_book->getNum($array);
            $offset = $this->uri->segment(4);

            $data['book'] = $this->getBooks($array, $offset);
            $config['base_url'] = base_url().'index.php/admin/book/bookList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/bookList', $data);
            $this->load->view('common/footer');
        }

        // 论文详细信息页面
        public function bookDetail(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data['book'] = $this->getBook($id);
            $show = '';
            if(strcmp($data['book']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/bookDetail', $data);
            $this->load->view('common/footer');
        }

        // 更改工作汇报的状态
        public function updateBookState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = $this->uri->segment(5);
            $array = array('state' => $state);

            $this->load->model('m_book');
            $this->m_book->updateInfo($id, $array);

            $data['book'] = $this->getBook($id);

            $this->load->view('common/header3');
            $this->load->view('admin/achievement/bookDetail', $data);
            $this->load->view('common/footer');
        }

        // 获取单个课题信息
        function getBook($id){
            $this->timeOut();
            $this->load->model('m_book');
            $data = array();
            $result = $this->m_book->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
                $data->stateInfo = $this->m_book->getState($r->state);
            }
            return $data;
        }

        // 分页获取全部课题信息
        function getBooks($array, $offset){
            $this->timeOut();
            $this->load->model('m_book');
            $data = array();
            $result = $this->m_book->getBooks($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('bookId' => $r->bookId, 'subjectId' => $r->subjectId,
                    'subjectNum' => $r->subjectNum,
                    'state' => $r->state, 'bookName' => $r->bookName,
                    'publication' => $r->publication, 'time' => $r->time,
                    'chiefEditor' => $r->chiefEditor, 'state' => $this->m_book->getState($r->state),
                    'associateEditor' => $r->associateEditor, 'superviseEditor' => $r->superviseEditor,
                    'editorWorkplace' => $r->editorWorkplace, 'type' => $r->type,
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