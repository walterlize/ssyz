<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paper extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_paper');
    }

    // 论文列表页面
    public function paperList(){
        $title['title'] = '设施养殖数字化智能管理技术设备研究';
        $data['title'] = '论文';
        $array = array('state' => 2);
        $num = $this->m_paper->getNum($array);
        $offset = $this->uri->segment(4);
        $data['paper'] = $this->getPapers($array, $offset);
        $config['base_url'] = base_url().'index.php/head/paper/paperList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $this->load->view('index/head', $title);
        $this->load->view('outside/achievement/left');
        $this->load->view('index/paperList', $data);
        $this->load->view('index/footer');
    }

    // 论文详细信息页面
    /*public function paperDetail(){
       $title['title'] = '设施养殖数字化智能管理技术设备研究';

       $id = $this->uri->segment(4);
       $data['paper'] = $this->getPaper($id);

       $this->load->view('index/head', $title);
       $this->load->view('outside/achievement/paper', $data);
       $this->load->view('includes/footer');
   }*/


    public function paperDetail(){
        $title['title'] = '设施养殖数字化智能管理技术设备研究';
        $id = $this->uri->segment(4);
        $data['paper'] = $this->getPaper($id);
        $this->load->view('index/head', $title);
        $this->load->view('outside/achievement/paper', $data);
        $this->load->view('index/footer_1');
    }

    // 获取单个论文信息
    function getPaper($id){
        $this->load->model('m_paper');
        $data = array();
        $result = $this->m_paper->getOneInfo($id);
        foreach ($result as $r){
            $data = $r;
            $time = explode('-', $r->time);
            $year = $time['0'];
            $data->year = $year;
        }
        return $data;
    }

    // 分页获取全部论文信息
    function getPapers($array, $offset){
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
}
?>