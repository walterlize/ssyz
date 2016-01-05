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

            $subjectId = $this->session->userdata('subjectId');
            $this->load->model('m_book');
            $roleId=$this->session->userdata('roleId');
            if($roleId==2){
                $array = array('inherit' => $subjectId);
            }elseif($roleId==3){
                $array=array('subjectId'=>$subjectId);
            }else{
                echo '著作页面有误,请联系管理员处理';
            }
            $num = $this->m_book->getNum($array);
            $offset = $this->uri->segment(4);

            $data['book'] = $this->getBooks($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/book/bookList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/bookList', $data);
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
            $this->load->view('manager/achievement/bookDetail', $data);
            $this->load->view('common/footer');
        }

        // 公告管理编辑信息页面
        public function bookEdit(){
            $this->timeOut();
            $id = $this->uri->segment(4);
            $data = $this->getBook($id);

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/bookEdit', $data);
            $this->load->view('common/footer');
        }

        // 公告管理编辑信息页面
        public function bookNew(){
            $this->timeOut();
            //$type = $this->uri->segment(4);
            $data['bookId'] = 0;
            $data['subjectId'] = $this->session->userdata('subjectId');
            $data['state'] = '';
            $data['bookName'] = '';
            $data['publication'] = '';
            $data['time'] = '';
            $data['chiefEditor'] = '';
            $data['associateEditor'] = '';
            $data['superviseEditor'] = '';
            $data['editorWorkplace'] = '';
            $data['type'] = '';
            $data['remark'] = '';
            $data['show'] = 'display:none';
            $data['types'] = $this->getTypes();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/bookEdit', $data);
            $this->load->view('common/footer');
        }

        public function bookDelete(){
            $this->timeOut();
            $id = $this->uri->segment(4);

            $this->load->model('m_book');
            $this->m_book->delete($id);

            $subjectId = $this->session->userdata('subjectId');
            $array = array('subjectId' => $subjectId);

            $num = $this->m_book->getNum($array);
            $offset = 0;

            $data['book'] = $this->getBooks($array, $offset);
            $config['base_url'] = base_url().'index.php/manager/book/bookList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/bookList', $data);
            $this->load->view('common/footer');
        }

        // 更改工作汇报的状态
        public function updateBookState(){
            $this->timeOut();

            $id = $this->uri->segment(4);
            $state = 0;
            $array = array('state' => $state);

            $this->load->model('m_book');
            $this->m_book->updateInfo($id, $array);

            $data['book'] = $this->getBook($id);
            $show = '';
            if(strcmp($data['book']->state, '审核通过') == 0){
                    $show = 'display:none';
            }
            $data['show'] = $show;

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/bookDetail', $data);
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
                $data->state = $this->m_book->getState($r->state);
                $data->types = $this->getTypes();
            }
            return $data;
        }

        // 保存公告动态信息
        public function save(){
            $this->timeOut();

            $this->load->model('m_book');
            $id = $this->m_book->saveInfo();
            $data['book'] = $this->getBook($id);
            $data['show'] = '';

            $this->load->view('common/header3');
            $this->load->view('manager/achievement/bookDetail', $data);
            $this->load->view('common/footer');
        }

        // 分页获取全部课题信息
        function getBooks($array, $offset){
            $this->timeOut();
            $this->load->model('m_book');
            $data = array();
            $result = $this->m_book->getBooks($array, PER_PAGE, $offset);

            foreach ($result as $r){
                $arr = array('bookId' => $r->bookId, 'subjectId' => $r->subjectId,
                    'state' => $r->state, 'bookName' => $r->bookName,
                    'publication' => $r->publication, 'time' => $r->time,
                    'chiefEditor' => $r->chiefEditor, 'state' => $this->m_book->getState($r->state),
                    'associateEditor' => $r->associateEditor, 'superviseEditor' => $r->superviseEditor,
                    'editorWorkplace' => $r->editorWorkplace, 'type' => $r->type,'subjectUnit' => $r->subjectUnit,
                    'remark' => $r->remark);
                array_push($data, $arr);
            }
            return $data;
        }

        // 获取论文类型
        function getTypes(){
            $this->load->model('common');
            $data = $this->common->getBookType();
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