<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Upload extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('file');
        $this->load->helper('form');
        $this->load->model('m_upload');
        $this->load->helper('array');
        $this->load->library('session');
        $this->load->library('table');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
        $tmpl = array(
            'table_open' => '<table cellspacing="0" rules="all" border="1" style="width:100%;border-collapse:collapse;font-size:12px">',
            'row_start' => '<tr align="center">',
            'row_alt_start' => '<tr align="center">',
        );

        $this->table->set_template($tmpl);
    }

    function index() {

        $id = $this->getID();
        if ($id == 0 || $id == null || $id == '') {
            $this->load->view('logout');
        } else {
            $data = $this->getEmptyData();
            $this->load->model('m_upload');
            $result = $this->m_upload->get_info($id);
            // 读入已有上传文件列表
            $this->show($result);
            $this->load->view('manager/upload/upload', $data);
        }
    }

    // 保存上传文件信息
    function uploadfile() {


        $isUploaded = true;
        $monthMoneyId = $this->uri->segment(4);
        $subjectId = $this->uri->segment(5);
        $type1 = $this->uri->segment(6);
        if ($type1 == 1) {
            $type = 'month';
        } elseif ($type1 ==2) {
            $type = 'year'; 
        } 

        // 判断文件是否已经上传
        //$array = array('monthMoneyId' => $monthMoneyId);
        $result = $this->m_upload->get_info1($monthMoneyId);

        $file_exist = false;
        $uploadId = '';
        if (isset($result->upload_name)) {
            $monthMoneyId = $result->monthMoneyId;
            $subjectId = $result->subjectId;
            $file_exist = true;
        }

        // 设置上传路径
        $year = date('Ym');

        $name1 = $this->get_name($subjectId);

        $name = iconv("utf-8", "gbk", $name1);
        $dir = getcwd() . '/upload/' . $year . '/' . $type . '_' . $subjectId . '/';
        if (!is_dir($dir))
            mkdir($dir, 0777, true);
        // 控制上传文件类型

        $config['allowed_types'] = 'doc|docx';
        $config['upload_path'] = $dir;
        $config['overwrite'] = true;
        $config['max_size'] = '102400';
        $config['file_name'] = $monthMoneyId;
        echo $config['upload_path'];
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload()) {
            $data['error'] = '<font color=#ff0000>文件未能成功上传！请检查文件类型和大小。</font>';
            $isUploaded = false;
        }

        // 上传文件成功才能保存到数据库中
        if ($isUploaded) {
            // 获取上传文件后的文件名
            $result_upload = $this->upload->data();
            $upload_name = $result_upload['file_name'];
            $upload_name = iconv("gbk", "utf-8", $upload_name);
            $date = date("Ymd");
            // 将文件信息保存至数据库
            $array = array('uploadId' => $uploadId, 'upload_date' => $date, 'moneyId' => $monthMoneyId, 'type' => $type,
                'upload_name' => $upload_name, 'subjectId' => $subjectId);

            if ($file_exist) {
                $this->m_upload->updateInfo($monthMoneyId, $array);
            } else {

                $this->m_upload->save_info($array, $uploadId);
            }
        }
        if ($isUploaded) {
            $data['isuploaded'] = "<br />(已上传)";
        }
        //$data['upload_id'] = '';
        //$data['state'] = '';
        // $data['type'] = $this->get_upload_type();
        // $data = array('upload_data' => $this->upload->data());
        $this->load->view('common/success', $data);
    }

    // 编辑上传文件详细信息
    function edit() {
        // $this->time_out();
        $id = $this->getID();
        $upload_id = $this->uri->segment(4);
        $this->load->model('m_upload');

        $result = $this->m_upload->get_info($id);
        $this->show($result);

        // 获取具体信息
        $result = $this->m_upload->get_one_info($upload_id);

        foreach ($result as $r) {
            $data['upload_id'] = $r->upload_id;
            $data['type1'] = $r->type;
            $data['type'] = $this->get_upload_type();
            $data['show'] = 'display:none';
            $data['type_name'] = $this->get_upload_type_name($r->type);
        }

        $this->load->view('candidate/candidate_upload', $data);
    }

    // 删除上传文件详细信息
    function delete() {
        // $this->time_out();
        $uploadId = $this->uri->segment(4);
        $subjectId = $this->uri->segment(5);

        // 删除文件
        $array = array('uploadId' => $uploadId);
        $result = $this->get_upload_info($array);
        $oldname = $result->upload_name;
        $oldname = iconv("utf-8", "gbk", $oldname);
        $name = $this->get_name($subjectId);
        $name = iconv("utf-8", "gbk", $name);
        $path = getcwd() . './upload/' . $name . '_' . $subjectId . '/' . $oldname;
        if (file_exists($path)) {
            unlink($path);
        }


        $this->m_upload->delete_one_info($uploadId);

        // $result = $this->m_upload->get_info1($monthMoneyId);
        // 读入已有上传文件列表
        //$this->show($result);
        // $data = $this->getEmptyData();

        $this->load->view('common/delete');
    }

    // 显示已有奖励列表
    function show($result) {
        if ($result != '' && $result != null) {
            $this->table->set_heading('上传文件类型', '功能');
            foreach ($result as $r) {
                if ($r->type == 'jianli')
                    continue;
                $address_edit = base_url() . "index.php/candidate/upload/edit/" . $r->upload_id;
                $address_delete = base_url() . "index.php/candidate/upload/delete/" . $r->upload_id;
                $edit = '<a id="" href="' . $address_edit . '">编辑</a>&nbsp;&nbsp;&nbsp;&nbsp;';
                $string = "'您确认要删除吗?'";
                $delete = '<a onclick="return confirm(' .
                        $string . ');" id="" href="' . $address_delete . '">删除</a>';
                $this->table->add_row($this->get_upload_type_name($r->type), $edit . $delete);
            }
            echo $this->table->generate();
        }
    }

    // 获取应聘者编号
    function getID() {
        if (!isset($_SESSION['subjectId'])) {
            session_start();
        }
        $id = $_SESSION['subjectId'];
        return $id;
    }

    function get_upload_info($array) {
        $this->load->model('m_upload');
        $result = $this->m_upload->get_one_info2($array);
        $data = '';
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取课题名称
    function get_name($id) {
        $this->load->model('m_subject');
        $result = $this->m_subject->getOneInfo($id);
        $data = '';
        foreach ($result as $r) {
            $data = $r->subjectName;
        }
        return $data;
    }

    // 获取空的填充信息
    function getEmptyData() {
        $data['upload_id'] = '';
        $data['show'] = '';
        $data['type'] = $this->get_upload_type();
        return $data;
    }

    // 获取上传类别
    function get_upload_type() {
        $this->load->model('common');
        $data = $this->common->get_upload_type();
        return $data;
    }

    // 获取上传类别名称
    function get_upload_type_name($type) {
        $this->load->model('common');
        $data = $this->common->get_upload_type();
        foreach ($data as $r) {
            if ($r['type'] == $type)
                return $r['name'];
        }
        return '';
    }

    // session中的role不存在的时候退出系统
    /*  function time_out(){
      session_start();
      if(isset ($_SESSION['role'])){
      $role = $_SESSION['role'];
      } else {
      $role = '';
      }

      if($role != "Candidates"){
      $this->load->view('logout2');
      }
      } */
}

?>