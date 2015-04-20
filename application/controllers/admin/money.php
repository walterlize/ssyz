<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Money extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_totalmoney');
        $this->load->model('m_yearmoney');
        $this->load->model('m_monthmoney');
        $this->load->model('m_upload');
    }

    // 课题总经费管理页面
    public function totalList() {
        $this->timeOut();
        $array = array('type' => 'Subject');
        $num = $this->m_totalmoney->getNum_zi($array);
        $offset = $this->uri->segment(4);
        $data['money'] = $this->getTotalMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/money/totalList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 3;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $this->load->view('common/header3');
        $this->load->view('admin/money/totalList', $data);
        $this->load->view('common/footer');
    }

    // 年度经费管理页面
    public function yearList() {
        $this->timeOut();
        $type = $this->uri->segment(4);
        $array = array('type' => $type);

        $num = $this->m_yearmoney->getNum($array);
        $offset = $this->uri->segment(5);

        $data['money'] = $this->getYearMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/money/yearList/1';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/money/yearList', $data);
        $this->load->view('common/footer');
    }

    // 课题总经费详细信息页面
    public function totalMoneyDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['money'] = $this->getTotalMoney1($id);

        $this->load->view('common/header3');
        $this->load->view('admin/money/totalDetail', $data);
        $this->load->view('common/footer');
    }

    // 年度经费详细信息页面
    public function yearMoneyDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['money'] = $this->getYearMoney($id);
        $subjectId = $data['money']->subjectId;
        $array1 = array('moneyId' => $id, 'subjectId' => $subjectId);
        $this->load->view('common/header3');
        $this->load->view('admin/money/yearDetail', $data);
        //$this->load->view('admin/upload/uploadYear', $data);
        $this->load->view('common/footer');
    }

    // 课题总经费详细信息编辑页面
    public function totalMoneyEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['money'] = $this->getTotalMoney1($id);
        $data['subject'] = $this->getSubjects();

        $this->load->view('common/header3');
        $this->load->view('admin/money/totalEdit', $data);
        $this->load->view('common/footer');
    }

    // 年度经费详细信息编辑页面
    public function yearMoneyEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['money'] = $this->getYearMoney($id);
        $data['subject'] = $this->getSubjects();

        $this->load->view('common/header3');
        $this->load->view('admin/money/yearEdit', $data);
        $this->load->view('common/footer');
    }

    // 课题总经费详细信息新增页面
    public function totalMoneyNew() {
        $this->timeOut();
        @$money->totalMoneyId = '';
        $money->subjectId = '';
        $money->startDate = '';
        $money->endDate = '';
        $money->direct_cost = '';
        $money->equipment = '';
        $money->buyEquipment = '';
        $money->tryEquipment = '';
        $money->alterEquipment = '';
        $money->material = '';
        $money->experiment = '';
        $money->fuel = '';
        $money->travel = '';
        $money->conference = '';
        $money->international = '';
        $money->information = '';
        $money->service = '';
        $money->consultative = '';
        $money->management = '';
        $money->other = '';
        $money->indirect_cost = '';
        $money->ji_xiao = '';
        $money->equipmentCaption = '';
        $money->buyEquipmentCaption = '';
        $money->tryEquipmentCaption = '';
        $money->alterEquipmentCaption = '';
        $money->materialCaption = '';
        $money->experimentCaption = '';
        $money->fuelCaption = '';
        $money->travelCaption = '';
        $money->conferenceCaption = '';
        $money->internationalCaption = '';
        $money->informationCaption = '';
        $money->serviceCaption = '';
        $money->consultativeCaption = '';
        $money->managementCaption = '';
        $money->otherCaption = '';
        $money->indirectCaption = '';
        $money->directCaption = '';
        $money->ji_xiaoCaption = '';
        $money->total = '';

        $data['money'] = $money;
        $data['subject'] = $this->getSubjects();
        //$data = $this->getEmptyTotalMoney();
        $this->load->view('common/header3');
        $this->load->view('admin/money/totalEdit', $data);
        $this->load->view('common/footer');
    }

// 获取空的填充信息
    function getEmptyTotalMoney() {
        $data['r_id'] = '';
        $data['title'] = '';
        $data['sendTime'] = '';
        $data['content'] = '';
        $data['hitCount'] = 0;
        $data['type'] = '';
        return $data;
    }

    // 年度经费详细信息新增页面
    public function yearMoneyNew() {
        $this->timeOut();
        $subjectId = $this->uri->segment(4);
        $array = array('subjectId' => $subjectId);
        @$money->yearMoneyId = 0;
        $money->type = '';
        $money->subjectId = '';
        $money->year = date('Y');
        $money->direct_cost = '';
        $money->equipment = '';
        $money->buyEquipment = '';
        $money->tryEquipment = '';
        $money->alterEquipment = '';
        $money->material = '';
        $money->experiment = '';
        $money->fuel = '';
        $money->travel = '';
        $money->conference = '';
        $money->international = '';
        $money->information = '';
        $money->service = '';
        $money->consultative = '';
        $money->management = '';
        $money->other = '';
        $money->indirect_cost = '';
        $money->ji_xiao = '';
        $money->directCaption = '';
        $money->equipmentCaption = '';
        $money->buyEquipmentCaption = '';
        $money->tryEquipmentCaption = '';
        $money->alterEquipmentCaption = '';
        $money->materialCaption = '';
        $money->experimentCaption = '';
        $money->fuelCaption = '';
        $money->travelCaption = '';
        $money->conferenceCaption = '';
        $money->internationalCaption = '';
        $money->informationCaption = '';
        $money->serviceCaption = '';
        $money->consultativeCaption = '';
        $money->managementCaption = '';
        $money->otherCaption = '';
        $money->ji_xiaoCaption = '';
        $money->indirectCaption = '';
        $money->total = '';
        $money->totalgive = '';
        $data['money'] = $money;
        $data['subject'] = $this->getSubjects2();
        $data['moneyTotal'] = $this->getTotalMoney3($array);
        $this->load->view('common/header3');
        $this->load->view('admin/money/changeSubject', $data);
        $this->load->view('admin/money/yearEdit', $data);
        $this->load->view('common/footer');
    }

    // 变换显示
    function changeSubject() {
        extract($_REQUEST);
        if (strcmp($subjectId, '1') == 0) {
            $array = array('subjectId' => '1');
        } else {
            if (strcmp($subjectId, '2') == 0) {
                $array = array('subjectId' => '2');
            } else {
                if (strcmp($subjectId, '3') == 0) {
                    $array = array('subjectId' => '3');
                } else {
                    $array = array('');
                }
            }
        }
        @$money->yearMoneyId = '';
        $money->subjectId = '';
        $money->startDate = '';
        $money->endDate = '';
        $money->direct_cost = '';
        $money->equipment = '';
        $money->buyEquipment = '';
        $money->tryEquipment = '';
        $money->alterEquipment = '';
        $money->material = '';
        $money->experiment = '';
        $money->fuel = '';
        $money->travel = '';
        $money->conference = '';
        $money->international = '';
        $money->information = '';
        $money->service = '';
        $money->consultative = '';
        $money->management = '';
        $money->other = '';
        $money->indirect_cost = '';
        $money->ji_xiao = '';
        $money->equipmentCaption = '';
        $money->buyEquipmentCaption = '';
        $money->tryEquipmentCaption = '';
        $money->alterEquipmentCaption = '';
        $money->materialCaption = '';
        $money->experimentCaption = '';
        $money->fuelCaption = '';
        $money->travelCaption = '';
        $money->conferenceCaption = '';
        $money->internationalCaption = '';
        $money->informationCaption = '';
        $money->serviceCaption = '';
        $money->consultativeCaption = '';
        $money->managementCaption = '';
        $money->otherCaption = '';
        $money->indirectCaption = '';
        $money->directCaption = '';
        $money->ji_xiaoCaption = '';
        $money->total = '';
        $data['money'] = $money;
        $data['moneyTotal'] = $this->getTotalMoney3($array);
        $data['money'] = $money;
        $data['subject'] = $this->getSubjects2();


        $this->load->view('admin/money/yearEdit', $data);
    }

    public function getEmptyYearMoney() {
        $data['r_id'] = '';
        $data['title'] = '';
        $data['sendTime'] = '';
        $data['content'] = '';
        $data['hitCount'] = 0;
        $data['type'] = '';
        return $data;
    }

    // 保存课题总经费信息
    public function totalMoneySave() {
        $this->timeOut();
        $id = $this->m_totalmoney->saveInfo();
        $data['subject'] = $this->getSubjects();
        $data['money'] = $this->getTotalMoney1($id);

        $this->load->view('common/header3');
        $this->load->view('admin/money/totalDetail', $data);
        $this->load->view('common/footer');
    }

    // 保存年度经费信息
    public function yearMoneySave() {
        $this->timeOut();
        $id = $this->m_yearmoney->saveInfo();
        $data['subject'] = $this->getSubjects();
        $data['yearmoney'] = $this->getYearMoney($id);
        $subjectId = $data['yearmoney']->subjectId;
        $data['totalmoney'] = $this->getTotalMoney2($subjectId);
        $total = $data['totalmoney']->total;
        $array = array('totalgive' => $total);
        $this->m_yearmoney->saveInfo1($subjectId, $array);
        $data['money'] = $this->getYearMoney($id);
        $this->load->view('common/header3');
        $this->load->view('admin/money/yearDetail', $data);
        $this->load->view('common/footer');
    }

    // 删除课题总经费信息
    public function totalMoneyDelete() {
        $this->timeOut();

        $array = array();
        $this->load->model('m_totalmoney');
        $id = $this->uri->segment(4);
        $this->m_totalmoney->delete($id);

        $num = $this->m_totalmoney->getNum($array);
        $offset = 0;

        $data['money'] = $this->gettotalMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/money/totalList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/money/totalList', $data);
        $this->load->view('common/footer');
    }

    // 删除年度经费信息
    public function yearMoneyDelete() {
        $this->timeOut();

        $array = array();
        $this->load->model('m_yearMoney');
        $id = $this->uri->segment(4);
        $this->m_yearMoney->delete($id);

        $num = $this->m_yearMoney->getNum($array);
        $offset = 0;

        $data['money'] = $this->getYearMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/money/yearList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/money/yearList', $data);
        $this->load->view('common/footer');
    }

    // 年度经费预算执行列表
    public function yearExecutionList() {
        $this->timeOut();
        $type = $this->uri->segment(4);
        $array = array('type' => $type);
        $this->load->model('m_yearMoney');
        $num = $this->m_yearMoney->getNum($array);
        $offset = $this->uri->segment(4);

        $data['money'] = $this->getYearMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/money/yearExecutionList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/money/yearExecutionList', $data);
        $this->load->view('common/footer');
    }

    // 课题总经费预算执行列表
    public function totalExecutionList() {
        $this->timeOut();
        $array = array();

        $offset = $this->uri->segment(4);
        $num = $this->m_totalmoney->getNum($array);
        $data['totalMoney'] = $this->getTotalMoneyS($array, $offset);

        //  $subjectId = $this->getSubjectId();
        $array1 = array('state' => 3);

        $data['monthMoney'] = $this->getMonthMoneyTotal($array1, $offset);


        $data['monthMoney'] = array();

        $this->load->view('common/header3');
        $this->load->view('admin/money/totalExecutionList', $data);
        $this->load->view('common/footer');
    }

    // 课题总经费详细信息页面
    public function totalExecutionDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);


        $data['year'] = $this->getYearMoney($id);
        $array = array('year' => $data['year']->year, 'subjectId' => $data['year']->subjectId);
        $array1 = array('subjectId', 'year');
        $array2 = array('year' => $data['year']->year, 'subjectId' => $data['year']->subjectId, 'state' => 3);
        $this->load->model('m_monthmoney');
        $num = $this->m_monthmoney->getNum($array2);
        if ($num == 0) {
            $data['month'] = $this->getEmptyData();
        } else {
            $data['month'] = $this->getMonthMoneySum($array2, $array1);
        }

        $result = $this->getYearResult($data['year'], $data['month']);
        $data['last'] = $result['last'];
        $data['rate'] = $result['rate'];

        $data['caption'] = $this->getMonthMoneyCaption($array2);

        $this->load->view('common/header3');
        $this->load->view('admin/money/yearExecutionDetail', $data);
        $this->load->view('common/footer');
    }

    // 年度经费详细信息页面
    public function yearExecutionDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);

        // 年度预算值
        $data['year'] = $this->getYearMoney($id);
        $array = array('year' => $data['year']->year, 'subjectId' => $data['year']->subjectId);
        $array1 = array('subjectId', 'year');
        $array2 = array('year' => $data['year']->year, 'subjectId' => $data['year']->subjectId, 'state' => 3);
        $this->load->model('m_monthMoney');
        $num = $this->m_monthMoney->getNum($array2);
        if ($num == 0) {
            $data['month'] = $this->getEmptyData();
        } else {
            $data['month'] = $this->getMonthMoneySum($array2, $array1);
        }

        $result = $this->getYearResult($data['year'], $data['month']);
        $data['last'] = $result['last'];
        $data['rate'] = $result['rate'];

        $data['caption'] = $this->getMonthMoneyCaption($array2);

        $this->load->view('common/header3');
        $this->load->view('admin/money/yearExecutionDetail', $data);
        $this->load->view('common/footer');
    }

    // 年度经费详细信息页面
    public function yearSumDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);

        // 年度预算值
        $data['year'] = $this->getYearMoney2($id);
        $array = array('year' => $data['year']->year, 'subjectId' => $data['year']->subjectId);
        $array1 = array('subjectId', 'year');
        $array2 = array('year' => $data['year']->year, 'subjectId' => $data['year']->subjectId, 'state' => 3);
        $this->load->model('m_monthMoney');
        $num = $this->m_monthMoney->getNum($array2);
        if ($num == 0) {
            $data['month'] = $this->getEmptyData();
        } else {
            $data['month'] = $this->getMonthMoneySum($array2, $array1);
        }

        $result = $this->getYearResult($data['year'], $data['month']);
        $data['last'] = $result['last'];
        $data['rate'] = $result['rate'];

        $data['caption'] = $this->getMonthMoneyCaption($array2);

        $this->load->view('common/header3');
        $this->load->view('admin/money/yearExecutionDetail', $data);
        $this->load->view('common/footer');
    }

    // 月度经费管理页面
    public function monthList() {
        $this->timeOut();
        $type = $this->uri->segment(4);
        $array = array('type' => $type);
        $this->load->model('m_monthMoney');
        $num = $this->m_monthMoney->getNum($array);
        $offset = $this->uri->segment(5);

        $data['money'] = $this->getMonthMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/money/monthList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('admin/money/monthList', $data);
        $this->load->view('common/footer');
    }

    // 月度经费详细信息页面
    public function monthMoneyDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $offset = $this->uri->segment(5);
        $data['monthMoney'] = $this->getMonthMoney($id);
        $data['upload'] = $this->m_upload->get_info1($id);
        $subjectId = $data['monthMoney']->subjectId;
        $data['show1'] = 'display:none';
        $data['show2'] = 'display:none';
        $data['show3'] = 'display:none';
        switch ($data['monthMoney']->state) {
            case 0:
                $data['show3'] = '';
                break;
            case 1:
                $data['show1'] = '';
                $data['show2'] = '';
                break;
            case 2:
                $data['show1'] = '';
                break;
        }

        $array = array('year' => $data['monthMoney']->year, 'subjectId' => $data['monthMoney']->subjectId);
        $data['yearMoney'] = $this->getYearMoney1($array, $offset);

        // 年度预算值
        $array = array('subjectId' => $data['monthMoney']->subjectId);
        $array1 = array('subjectId');
        $data['year'] = $this->getYearMoneySum($array, $array1);

        $this->load->model('m_monthMoney');
        $num = $this->m_monthMoney->getNum($array);
        if ($num == 0) {
            $data['month'] = $this->getEmptyData();
        } else {
            $data['month'] = $this->getMonthMoneySum($array, $array1);
        }

        $result = $this->getYearResult($data['year'], $data['month']);
        $data['last'] = $result['last'];
        $data['rate'] = $result['rate'];


        $array3 = array('moneyId' => $data['monthMoney']->monthMoneyId, 'subjectId' => $data['monthMoney']->subjectId);



        //$array = array('candidates_id' => $id, 'type' => 'jianli');

        if ($data['upload']) {


            $data['moneyId'] = $id;
            $data['subjectId'] = $subjectId;
            $data['type'] = 'month';
            // $data['upload_date'] = '';
            //$data['upload_name'] = '';

            $data['show4'] = 'display';
            $data['isuploaded'] = "<br /><font color='ff0000'>(已上传)</font>";
            $result = $this->get_upload_info($array3);
            $year = date('Ym');
            //$year = 2012;
            $data['url'] = base_url() . 'index.php/download/downloadfile/' . $year . '/' . $result->type . '_' . $subjectId .
                    '/' . $result->upload_name;
            $data['uploadId'] = $result->uploadId;
        } else {
            $data['show4'] = 'display:none';
            $data['uploadId'] = '';
            $data['type'] = 'month';
            $data['subjectId'] = $subjectId;
            $data['isuploaded'] = "<br /><font color='ff0000'>(未上传任何文件！)</font>";
        }



        $data['uploadId'] = '';
        //$data['state'] = '';
        $data['type'] = 'month';
        $data['subjectId'] = $subjectId;



        $this->load->view('common/header3');
        $this->load->view('admin/money/monthDetail', $data);
        $this->load->view('admin/upload/upload', $data);
        $this->load->view('common/footer');
    }

    public function monthMoneyUpdate() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $state = $this->uri->segment(5);
        $this->load->model('m_monthMoney');
        $array = array('state' => $state);
        $this->m_monthMoney->updateInfo($id, $array);

        $data['monthMoney'] = $this->getMonthMoney($id);

        $data['show1'] = 'display:none';
        $data['show2'] = 'display:none';
        $data['show3'] = 'display:none';
        switch ($data['monthMoney']->state) {
            case 0:
                $data['show3'] = '';
                break;
            case 1:
                $data['show1'] = '';
                $data['show2'] = '';
                break;
            case 2:
                $data['show1'] = '';
                break;
        }

        $array = array('year' => $data['monthMoney']->year, 'subjectId' => $data['monthMoney']->subjectId);
        $data['yearMoney'] = $this->getYearMoney1($array);

        // 年度预算值
        $array = array('subjectId' => $data['monthMoney']->subjectId);
        $array1 = array('subjectId');
        $data['year'] = $this->getYearMoneySum($array, $array1);

        $num = $this->m_monthMoney->getNum($array);
        if ($num == 0) {
            $data['month'] = $this->getEmptyData();
        } else {
            $data['month'] = $this->getMonthMoneySum($array, $array1);
        }

        $result = $this->getYearResult($data['year'], $data['month']);
        $data['last'] = $result['last'];
        $data['rate'] = $result['rate'];

        $this->load->view('common/header3');
        $this->load->view('admin/money/monthDetail', $data);
        $this->load->view('common/footer');
    }

    // 获取月度经费总和信息
    public function getMonthMoneySums($array, $array1, $offset) {
        $this->load->model('m_monthmoney');
        $data = array();
        $result = $this->m_monthmoney->getMonthMoneySum($array, $array1, $offset);

        foreach ($result as $r) {
            $arr = array('year' => $r->year, 'subjectId' => $r->subjectId,
                'month' => $r->month, 'subjectName' => $r->subjectName, 'subjectUnit' => $r->subjectUnit,
                'equipment' => $r->equipment, 'material' => $r->material, 'experiment' => $r->experiment, 'fuel' => $r->fuel,
                'travel' => $r->travel, 'conference' => $r->conference, 'international' => $r->international, 'information' => $r->information,
                'service' => $r->service, 'consultative' => $r->consultative, 'management' => $r->management,
                'total' => $r->total, 'totalyear' => $r->totalyear, 'last' => ($r->totalyear - $r->total), 'rate' => round(100 * $r->total / $r->totalyear, 2)
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取月度经费总和信息
    public function getYearMoneySums($array, $array1, $offset) {

        $data = array();
        $result = $this->m_yearmoney->getYearMoneySum($array, $array1, $offset);

        foreach ($result as $r) {
            $arr = array('year' => $r->year, 'subjectId' => $r->subjectId,
                'total' => $r->total, 'totalgive' => $r->totalgive, 'subjectName' => $r->subjectName, 'subjectUnit' => $r->subjectUnit,
                'equipment' => $r->equipment, 'material' => $r->material, 'experiment' => $r->experiment, 'fuel' => $r->fuel,
                'travel' => $r->travel, 'conference' => $r->conference, 'international' => $r->international, 'information' => $r->information,
                'service' => $r->service, 'consultative' => $r->consultative, 'management' => $r->management,
                'total' => $r->total, 'last' => ($r->totalgive - $r->total), 'rate' => round(100 * $r->total / $r->totalgive, 2)
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取月度经费总和信息
    public function getMonthMoneyTotal($array1, $offset) {

        $data = array();
        $result = $this->m_monthmoney->getMonthMoneyTotal1($array1, $offset);

        foreach ($result as $r) {
            $arr = array('total' => $r->total);
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取课题信息
    public function getSubjects() {
        $this->timeOut();
        $this->load->model('m_subject');
        $data = array('type' => 'Subject');
        $result = $this->m_subject->getSubject($data);
        return $result;
    }

    // 在分配完总课题经费之后获取年度课题信息
    public function getSubjects2() {
        $this->timeOut();
        $this->load->model('m_subject');
        $arr = array('type' => 'Subject');
        $result = $this->m_subject->getSubject3($arr);
        return $result;
    }

    // 在分配完总课题经费之后获取年度课题信息
    public function getSubjects1() {
        $this->timeOut();
        $this->load->model('m_subject');

        $result = $this->m_subject->getSubject1();
        return $result;
    }

    // 分页获取全部年度经费信息
    public function getTotalMoneyS($array, $offset) {
        $this->timeOut();
        $this->load->model('m_totalmoney');
        $data = array();
        $result = $this->m_totalmoney->getTotalMoneyS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('totalMoneyId' => $r->totalMoneyId, 'startDate' => $r->startDate, 'endDate' => $r->endDate,
                'subjectName' => $r->subjectName, 'subjectUnit' => $r->subjectUnit, 'total' => $r->total,
                'subjectNum' => $r->subjectNum, 'subjectId' => $r->subjectId, 'totalcost' => $this->m_monthmoney->getMonthMoneyTotal2($r->subjectId),
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 分页获取全部年度经费信息
    public function getYearMoneyS($array, $offset) {
        $this->timeOut();

        $data = array();
        $result = $this->m_yearmoney->getYearMoneyS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('yearMoneyId' => $r->yearMoneyId, 'year' => $r->year,
                'subjectName' => $r->subjectName, 'subjectUnit' => $r->subjectUnit, 'total' => $r->total,
                'equipment' => $r->equipment, 'material' => $r->material, 'experiment' => $r->experiment, 'fuel' => $r->fuel,
                'travel' => $r->travel, 'conference' => $r->conference, 'international' => $r->international, 'information' => $r->information,
                'service' => $r->service, 'consultative' => $r->consultative, 'management' => $r->management,
                'subjectNum' => $r->subjectNum);
            array_push($data, $arr);
        }
        return $data;
    }

    // 分页获取全部年度经费信息
    public function getYearMoneyS1($array) {
        $this->timeOut();

        $data = array();
        $result = $this->m_yearmoney->getYearMoneyS1($array, PER_PAGE);

        foreach ($result as $r) {
            $arr = array('yearMoneyId' => $r->yearMoneyId, 'year' => $r->year,
                'subjectName' => $r->subjectName, 'subjectUnit' => $r->subjectUnit, 'total' => $r->total,
                'equipment' => $r->equipment, 'material' => $r->material, 'experiment' => $r->experiment, 'fuel' => $r->fuel,
                'travel' => $r->travel, 'conference' => $r->conference, 'international' => $r->international, 'information' => $r->information,
                'service' => $r->service, 'consultative' => $r->consultative, 'management' => $r->management,
                'subjectNum' => $r->subjectNum);
            array_push($data, $arr);
        }
        return $data;
    }

    // 分页获取课题总经费信息
    public function getTotalMoney($array) {
        $this->timeOut();
        $this->load->model('m_totalmoney');
        $data = array();
        $result = $this->m_totalmoney->getTotalMoney($array);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 分页获取课题总经费信息
    public function getTotalMoney1($id) {
        $this->timeOut();
        $this->load->model('m_totalmoney');
        $data = array();
        $result = $this->m_totalmoney->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 总专项经费是否已经设置
    public function getTotalMoney_s($array) {
        $this->timeOut();
        $this->load->model('m_totalmoney');
        $data = array();
        $result = $this->m_totalmoney->getOneInfo_s($array);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 分页获取课题总经费信息
    public function getTotalMoney2($id) {
        $this->timeOut();
        $this->load->model('m_totalmoney');
        $data = array();
        $result = $this->m_totalmoney->getOneInfo1($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 分页获取课题总经费信息
    public function getTotalMoney3($array) {
        $this->timeOut();
        $this->load->model('m_totalmoney');
        $data = array();
        $result = $this->m_totalmoney->getOneInfo3($array);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 分页获取全部年度经费信息
    public function getYearMoney($id) {
        $this->timeOut();
        $this->load->model('m_yearMoney');
        $data = array();
        $result = $this->m_yearMoney->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 分页获取全部年度经费信息
    public function getYearMoney2($id) {
        $this->timeOut();
        $this->load->model('m_yearMoney');
        $data = array();
        $result = $this->m_yearMoney->getOneInfo1($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取年度经费信息
    public function getYearMoney1($array) {
        $this->load->model('m_yearMoney');
        $data = array();
        $result = $this->m_yearMoney->getYearMoney($array);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取年度经费总和信息
    public function getYearMoneySum($array, $array1) {
        $this->load->model('m_yearMoney');
        $data = array();
        $result = $this->m_yearMoney->getYearMoneySum($array, $array1);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 计算年度经费预算结果
    public function getYearResult($total, $spend) {
        $money = new StdClass;
        $rate = new StdClass;
        $money->equipment = $total->equipment - $spend->equipment;
        $rate->equipment = 0;
        if ($total->equipment != 0)
            $rate->equipment = round(100 * $spend->equipment / $total->equipment, 2);

        $money->buyEquipment = $total->buyEquipment - $spend->buyEquipment;
        $rate->buyEquipment = 0;
        if ($total->buyEquipment != 0)
            $rate->buyEquipment = round(100 * $spend->buyEquipment / $total->buyEquipment, 2);

        $money->tryEquipment = $total->tryEquipment - $spend->tryEquipment;
        $rate->tryEquipment = 0;
        if ($total->tryEquipment != 0)
            $rate->tryEquipment = round(100 * $spend->tryEquipment / $total->tryEquipment, 2);

        $money->alterEquipment = $total->alterEquipment - $spend->alterEquipment;
        $rate->alterEquipment = 0;
        if ($total->alterEquipment != 0)
            $rate->alterEquipment = round(100 * $spend->alterEquipment / $total->alterEquipment, 2);

        $money->material = $total->material - $spend->material;
        $rate->material = 0;
        if ($total->material != 0)
            $rate->material = round(100 * $spend->material / $total->material, 2);

        $money->experiment = $total->experiment - $spend->experiment;
        $rate->experiment = 0;
        if ($total->experiment != 0)
            $rate->experiment = round(100 * $spend->experiment / $total->experiment, 2);

        $money->fuel = $total->fuel - $spend->fuel;
        $rate->fuel = 0;
        if ($total->fuel != 0)
            $rate->fuel = round(100 * $spend->fuel / $total->fuel, 2);

        $money->travel = $total->travel - $spend->travel;
        $rate->travel = 0;
        if ($total->travel != 0)
            $rate->travel = round(100 * $spend->travel / $total->travel, 2);

        $money->conference = $total->conference - $spend->conference;
        $rate->conference = 0;
        if ($total->conference != 0)
            $rate->conference = round(100 * $spend->conference / $total->conference, 2);

        $money->international = $total->international - $spend->international;
        $rate->international = 0;
        if ($total->international != 0)
            $rate->international = round(100 * $spend->international / $total->international, 2);

        $money->information = $total->information - $spend->information;
        $rate->information = 0;
        if ($total->information != 0)
            $rate->information = round(100 * $spend->information / $total->information, 2);

        $money->service = $total->service - $spend->service;
        $rate->service = 0;
        if ($total->service != 0)
            $rate->service = round(100 * $spend->service / $total->service, 2);

        $money->consultative = $total->consultative - $spend->consultative;
        $rate->consultative = 0;
        if ($total->consultative != 0)
            $rate->consultative = round(100 * $spend->consultative / $total->consultative, 2);

        $money->management = $total->management - $spend->management;
        $rate->management = 0;
        if ($total->management != 0)
            $rate->management = round(100 * $spend->management / $total->management, 2);

        $money->total = $total->total - $spend->total;
        $rate->total = 0;
        if ($total->total != 0)
            $rate->total = round(100 * $spend->total / $total->total, 2);

        $data['last'] = $money;
        $data['rate'] = $rate;
        return $data;
    }

    // 分页获取月度经费信息
    public function getMonthMoneyS($array, $offset) {
        $this->load->model('m_monthMoney');
        $data = array();
        $result = $this->m_monthMoney->getMonthMoneyS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('monthMoneyId' => $r->monthMoneyId, 'year' => $r->year,
                'month' => $r->month, 'total' => $r->total, 'subjectName' => $r->subjectName, 'subjectUnit' => $r->subjectUnit,
                'equipment' => $r->equipment, 'material' => $r->material, 'experiment' => $r->experiment, 'fuel' => $r->fuel,
                'travel' => $r->travel, 'conference' => $r->conference, 'international' => $r->international, 'information' => $r->information,
                'service' => $r->service, 'consultative' => $r->consultative, 'management' => $r->management,
                'total' => $r->total, 'totalyear' => $r->totalyear,
                'state' => $r->state, 'stateInfo' => $this->m_monthMoney->getState($r->state));
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取月度经费信息
    public function getMonthMoney($id) {
        $this->load->model('m_monthMoney');
        $data = array();
        $result = $this->m_monthMoney->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取月度经费总和信息
    public function getMonthMoneySum($array, $array1) {
        $this->load->model('m_monthMoney');
        $data = array();
        $result = $this->m_monthMoney->getMonthMoneySum($array, $array1);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取月度经费总和信息
    public function getMonthMoneySum1($subjectId) {

        if (true) {
            echo "$subjectId";
        }
        if (true) {
            echo "ha";
        }
        $data = array();
        $result = $this->m_monthmoney->getmonthMoneyTotal2($subjectId);
        if (true) {
            echo "  $result";
        }

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取月度经费支出明细
    public function getMonthMoneyCaption($array) {
        $this->load->model('m_monthMoney');
        $data = '';
        $result = $this->m_monthMoney->getMonthMoneyCaption($array);

        foreach ($result as $r) {
            $data->equipmentCaption .= $r->equipmentCaption . '  ';
            $data->buyEquipmentCaption .= $r->buyEquipmentCaption . '  ';
            $data->tryEquipmentCaption .= $r->tryEquipmentCaption . '  ';
            $data->alterEquipmentCaption .= $r->alterEquipmentCaption . '  ';
            $data->materialCaption .= $r->materialCaption . '  ';
            $data->experimentCaption .= $r->experimentCaption . '  ';
            $data->fuelCaption .= $r->fuelCaption . '  ';
            $data->travelCaption .= $r->travelCaption . '  ';
            $data->conferenceCaption .= $r->conferenceCaption . '  ';
            $data->internationalCaption .= $r->internationalCaption . '  ';
            $data->informationCaption .= $r->informationCaption . '  ';
            $data->serviceCaption .= $r->serviceCaption . '  ';
            $data->consultativeCaption .= $r->consultativeCaption . '  ';
            $data->managementCaption .= $r->managementCaption . '  ';
        }
        return $data;
    }

    // 设置月度经费空值
    function getEmptyData() {
        $money = new StdClass;
        $money->monthMoneyId = 0;
        $money->subjectId = $this->session->userdata('subjectId');
        $money->year = date('Y');
        $money->month = date('m');
        $money->equipment = 0;
        $money->buyEquipment = 0;
        $money->tryEquipment = 0;
        $money->alterEquipment = 0;
        $money->material = 0;
        $money->experiment = 0;
        $money->fuel = 0;
        $money->travel = 0;
        $money->conference = 0;
        $money->international = 0;
        $money->information = 0;
        $money->service = 0;
        $money->consultative = 0;
        $money->management = 0;
        $money->equipmentCaption = '';
        $money->buyEquipmentCaption = '';
        $money->tryEquipmentCaption = '';
        $money->alterEquipmentCaption = '';
        $money->materialCaption = '';
        $money->experimentCaption = '';
        $money->fuelCaption = '';
        $money->travelCaption = '';
        $money->conferenceCaption = '';
        $money->internationalCaption = '';
        $money->informationCaption = '';
        $money->serviceCaption = '';
        $money->consultativeCaption = '';
        $money->managementCaption = '';
        $money->total = '';

        return $money;
    }

    // 获取本课题已有的年度预算
    public function getSubjectId() {
        $this->load->model('m_totalmoney');

        $array = array();

        $result = $this->m_totalmoney->getSubjectId($array);
        $arr = array();
        foreach ($result as $r) {
            array_push($arr, $r->subjectId);
        }
        $data['years'] = $arr;
        return $data;
    }

    public function projectBudget() {
        $this->timeOut();
        $subjectId = $this->uri->segment(4);

        $this->load->model('m_totalmoney');


        $array = array('subjectId' => $subjectId);
        $array1 = array('subjectId');
        $array2 = array('subjectId' => $subjectId, 'state' => 3);
        $data['totalMoney'] = $this->getTotalMoney($array);

        if ($data['totalMoney'] == null) {
            show_404();
        }

        $this->load->model('m_monthMoney');
        $num = $this->m_monthMoney->getNum($array2);
        if ($num == 0) {
            $data['monthMoney'] = $this->getEmptyDataMonth();
        } else {
            $data['monthMoney'] = $this->getMonthMoneySum($array2, $array1);
        }

        $result = $this->getTotalResult($data['totalMoney'], $data['monthMoney']);
        $data['last'] = $result['last'];
        $data['rate'] = $result['rate'];

        $this->load->view('common/header3');
        $this->load->view('manager/money/projectBudget', $data);
        $this->load->view('common/footer');
    }

    // 计算年度经费预算结果
    public function getTotalResult($total, $spend) {
        $money->equipment = $total->equipment - $spend->equipment;
        $rate->equipment = 0;
        if ($total->equipment != 0)
            $rate->equipment = round(100 * $spend->equipment / $total->equipment, 2);

        $money->buyEquipment = $total->buyEquipment - $spend->buyEquipment;
        $rate->buyEquipment = 0;
        if ($total->buyEquipment != 0)
            $rate->buyEquipment = round(100 * $spend->buyEquipment / $total->buyEquipment, 2);

        $money->tryEquipment = $total->tryEquipment - $spend->tryEquipment;
        $rate->tryEquipment = 0;
        if ($total->tryEquipment != 0)
            $rate->tryEquipment = round(100 * $spend->tryEquipment / $total->tryEquipment, 2);

        $money->alterEquipment = $total->alterEquipment - $spend->alterEquipment;
        $rate->alterEquipment = 0;
        if ($total->alterEquipment != 0)
            $rate->alterEquipment = round(100 * $spend->alterEquipment / $total->alterEquipment, 2);

        $money->material = $total->material - $spend->material;
        $rate->material = 0;
        if ($total->material != 0)
            $rate->material = round(100 * $spend->material / $total->material, 2);

        $money->experiment = $total->experiment - $spend->experiment;
        $rate->experiment = 0;
        if ($total->experiment != 0)
            $rate->experiment = round(100 * $spend->experiment / $total->experiment, 2);

        $money->fuel = $total->fuel - $spend->fuel;
        $rate->fuel = 0;
        if ($total->fuel != 0)
            $rate->fuel = round(100 * $spend->fuel / $total->fuel, 2);

        $money->travel = $total->travel - $spend->travel;
        $rate->travel = 0;
        if ($total->travel != 0)
            $rate->travel = round(100 * $spend->travel / $total->travel, 2);

        $money->conference = $total->conference - $spend->conference;
        $rate->conference = 0;
        if ($total->conference != 0)
            $rate->conference = round(100 * $spend->conference / $total->conference, 2);

        $money->international = $total->international - $spend->international;
        $rate->international = 0;
        if ($total->international != 0)
            $rate->international = round(100 * $spend->international / $total->international, 2);

        $money->information = $total->information - $spend->information;
        $rate->information = 0;
        if ($total->information != 0)
            $rate->information = round(100 * $spend->information / $total->information, 2);

        $money->service = $total->service - $spend->service;
        $rate->service = 0;
        if ($total->service != 0)
            $rate->service = round(100 * $spend->service / $total->service, 2);

        $money->consultative = $total->consultative - $spend->consultative;
        $rate->consultative = 0;
        if ($total->consultative != 0)
            $rate->consultative = round(100 * $spend->consultative / $total->consultative, 2);

        $money->management = $total->management - $spend->management;
        $rate->management = 0;
        if ($total->management != 0)
            $rate->management = round(100 * $spend->management / $total->management, 2);

        $money->total = $total->total - $spend->total;
        $rate->total = 0;
        if ($total->total != 0)
            $rate->total = round(100 * $spend->total / $total->total, 2);

        $data['last'] = $money;
        $data['rate'] = $rate;
        return $data;
    }

    // 设置月度经费空值
    function getEmptyDataMonth() {
        $money->monthMoneyId = 0;
        $money->subjectId = $this->session->userdata('subjectId');
        $money->year = date('Y');
        $money->month = date('m');
        $money->equipment = 0;
        $money->buyEquipment = 0;
        $money->tryEquipment = 0;
        $money->alterEquipment = 0;
        $money->material = 0;
        $money->experiment = 0;
        $money->fuel = 0;
        $money->travel = 0;
        $money->conference = 0;
        $money->international = 0;
        $money->information = 0;
        $money->service = 0;
        $money->consultative = 0;
        $money->management = 0;
        $money->equipmentCaption = '';
        $money->buyEquipmentCaption = '';
        $money->tryEquipmentCaption = '';
        $money->alterEquipmentCaption = '';
        $money->materialCaption = '';
        $money->experimentCaption = '';
        $money->fuelCaption = '';
        $money->travelCaption = '';
        $money->conferenceCaption = '';
        $money->internationalCaption = '';
        $money->informationCaption = '';
        $money->serviceCaption = '';
        $money->consultativeCaption = '';
        $money->managementCaption = '';
        $money->total = 0;

        return $money;
    }

//经费的汇总情况
    function moneySum() {
        $this->timeOut();
        $offset = $this->uri->segment(4);
        $data['Year'] = $this->get_year();
        $data['Month'] = $this->get_month();
        $data['year'] = date("Y");
        $data['month'] = date("m");
        $array = array('year' => $data['year'], 'state' => 3, 'type' => 1,
            'month' => $data['month']);
        $data['monthMoney'] = $this->getMonthMoneyS($array, $offset);
        $this->load->view('common/header3');
        $this->load->view('admin/money/search', $data);
        $this->load->view('admin/money/monthSum', $data);
    }

    function change() {

        extract($_REQUEST);
        $offset = $this->uri->segment(4);
        if (strcmp($year, 'all') == 0) {
            $array = array('type' => 1);
            $array1 = array('subjectId');
            $data['year'] = $year;
            $data['month'] = $month;
            $data['Year'] = $this->get_year();
            $data['Month'] = $this->get_month();
            $data['yearSum'] = $this->getYearMoneySums($array, $array1, $offset);
            $this->load->view('admin/money/totalSum', $data);
        } else {
            if (strcmp($month, 'all') == 0) {
                $array = array('year' => $year, 'type' => 1, 'state' => 3);
                $array1 = array('subjectId');
                $data['year'] = $year;
                $data['month'] = $month;
                $data['Year'] = $this->get_year();
                $data['Month'] = $this->get_month();
                //$data['yearMoney'] = $this->getYearMoneyS($array, $offset);
                // $data['monthMoney'] = $this->getMonthMoneySums($array, $offset);
                $data['moneySum'] = $this->getMonthMoneySums($array, $array1, $offset);
                $this->load->view('admin/money/yearSum', $data);
            } else {
                $array = array('year' => $year,
                    'month' => $month, 'state' => 3, 'type' => 1);
                $data['monthMoney'] = $this->getMonthMoneyS($array, $offset);
                $data['year'] = $year;
                $data['month'] = $month;
                $data['Year'] = $this->get_year();
                $data['Month'] = $this->get_month();



                $this->load->view('admin/money/monthSum', $data);
            }
        }
    }

     function get_year() {
      $this->load->model('common');
      $data = $this->common->getYear();
      return $data;
      }
     

  

    function get_month() {
        $this->load->model('common');
        $data = $this->common->getMonth();
        return $data;
    }

    function get_upload_info($array) {

        $result = $this->m_upload->get_one_info2($array);
        $data = '';
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取课题名称
    function get_name($subjectId) {
        $this->load->model('m_subject');
        $result = $this->m_subject->getOneInfo($subjectId);
        $data = '';
        foreach ($result as $r) {
            $data = $r->subjectName;
        }
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 1) {
            $this->load->view('logout');
        }
    }

}

?>