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
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';

            $data['title'] = '论著';
            $this->load->model('m_book');
            $array = array('state' => 2);

            $num = $this->m_book->getNum($array);
            $offset = $this->uri->segment(4);

            $data['book'] = $this->getBooks($array, $offset);
            $config['base_url'] = base_url().'index.php/head/book/bookList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            $this->load->view('index/head', $title);
            $this->load->view('outside/achievement/left');
            $this->load->view('outside/achievement/bookList', $data);
            $this->load->view('index/footer');
        }

        // 论文详细信息页面
        public function bookDetail(){
            $title['title'] = '优质高效富硒农产品关键技术研究与集成示范';
            $id = $this->uri->segment(4);
            $data['book'] = $this->getBook($id);

            $this->load->view('index/head', $title);
            $this->load->view('outside/achievement/book', $data);
            $this->load->view('index/footer_1');
        }

        // 获取单个课题信息
        function getBook($id){
            $this->load->model('m_book');
            $data = array();
            $result = $this->m_book->getOneInfo($id);
            foreach ($result as $r){
                $data = $r;
            }
            return $data;
        }

        // 分页获取全部课题信息
        function getBooks($array, $offset){
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
}
?>