<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Baoxiao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_baoxiao');
    }

    // 借款管理页面
    public function baoxiaoList() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_baoxiao->getNum($array);
        $offset = $this->uri->segment(4);

        $data['borrow'] = $this->getBaoxiaoS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('ordinary/baoxiao/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

    // 月度经费详细信息页面
    public function monthMoneyDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['monthMoney'] = $this->getMonthMoney($id);

        $data['show1'] = 'display:none';
        $data['show2'] = 'display:none';
        switch ($data['monthMoney']->state) {
            case 1:
            case 2:
                $data['show1'] = '';
                break;
            case 3:
                $data['show2'] = '';
                break;
        }

        $array = array('year' => $data['monthMoney']->year, 'subjectId' => $data['monthMoney']->subjectId);
        $data['yearMoney'] = $this->getYearMoney($array);

        $this->load->view('common/header3');
        $this->load->view('ordinary/money/monthDetail', $data);
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
        switch ($data['monthMoney']->state) {
            case 1:
            case 2:
                $data['show1'] = '';
                break;
            case 3:
                $data['show2'] = '';
                break;
        }

        $array = array('year' => $data['monthMoney']->year, 'subjectId' => $data['monthMoney']->subjectId);
        $data['yearMoney'] = $this->getYearMoney($array);

        $this->load->view('common/header3');
        $this->load->view('ordinary/money/monthDetail', $data);
        $this->load->view('common/footer');
    }

    // 月度经费详细信息编辑页面
    public function monthMoneyEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['monthMoney'] = $this->getMonthMoney($id);

        $result = $this->getYears();
        $data['years'] = $result['years'];
        $data['year'] = $data['monthMoney']->year;
        $data['month'] = $data['monthMoney']->month;
        $result = $this->getYears();
        $subjectId = $this->session->userdata('subjectId');
        $data['subject'] = $this->getSubject($subjectId);
        $inherit = $data['subject']->inherit;
        $data['inherit'] = $inherit;
        $data['subjectUnit'] = $this->session->userdata('subjectUnit');
        $array = array('year' => $data['monthMoney']->year, 'subjectId' => $data['monthMoney']->subjectId);
        $data['yearMoney'] = $this->getYearMoney($array);

        $this->load->view('common/header3');
        $this->load->view('ordinary/money/monthEdit', $data);
        $this->load->view('common/footer');
    }

    //新增页面
    public function baoxiaoNew() {
        $this->timeOut();
        $s_id = $this->session->userdata('subjectId');


        $data['borrow'] = $this->getEmptyData();

        $this->load->view('common/header3');
        $this->load->view('ordinary/baoxiao/baoxiaoEdit', $data);
        $this->load->view('common/footer');
    }

    // 保存月度经费信息
    public function monthMoneySave() {
        $this->timeOut();

        $this->load->model('m_monthMoney');
        $id = $this->m_monthMoney->saveInfo();

        $data['monthMoney'] = $this->getMonthMoney($id);
        $array = array('year' => $data['monthMoney']->year, 'subjectId' => $data['monthMoney']->subjectId);
        $data['yearMoney'] = $this->getYearMoney($array);

        $data['show1'] = 'display:none';
        $data['show2'] = 'display:none';
        switch ($data['monthMoney']->state) {
            case 1:
            case 2:
                $data['show1'] = '';
                break;
            case 3:
                $data['show2'] = '';
                break;
        }

        $this->load->view('common/header3');
        $this->load->view('ordinary/money/monthDetail', $data);
        $this->load->view('common/footer');
    }

    // 删除月度经费信息
    public function monthMoneyDelete() {
        $this->timeOut();

        $subjectId = $this->session->userdata('subjectId');
        $array = array('subjectId' => $subjectId);
        $this->load->model('m_monthMoney');
        $id = $this->uri->segment(4);
        $this->m_monthMoney->delete($id);

        $num = $this->m_monthMoney->getNum($array);
        $offset = 0;

        $data['money'] = $this->getMonthMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/money/monthList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('ordinary/money/monthList', $data);
        $this->load->view('common/footer');
    }

    // 更改月度经费信息
    public function monthMoneyChange() {
        $this->timeOut();
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('year' => $year, 'month' => $month, 'subjectId' => $subjectId);
        $array1 = array('year' => $year, 'subjectId' => $subjectId);

        $this->load->model('m_monthMoney');
        $num = $this->m_monthMoney->getNum($array);

        // 获取月度经费信息
        if ($num == 0) {
            $data['monthMoney'] = $this->getEmptyData();
        } else {
            $result = $this->m_monthMoney->getMonthMoney($array);
            foreach ($result as $r) {
                $data['monthMoney'] = $r;
            }
        }
        $result = $this->getYears();
        $data['years'] = $result['years'];
        $data['year'] = $year;
        $data['month'] = $month;
        $data['yearMoney'] = $this->getYearMoney($array1);
        $this->load->view('ordinary/money/monthEdit', $data);
    }

    // 年度经费预算执行表
    public function yearBudget() {
        $this->timeOut();
        $result = $this->getYears();

        $year = date('Y');
        $flag = false;
        foreach ($result['years'] as $y) {
            if ($y == $year) {
                $flag = true;
                break;
            }
        }
        if (!$flag)
            @$year = $result['years'][0];

        $this->yearBudgetOperate($year);
    }

    // 年度预算更改
    public function yearBudgetChange() {
        $this->timeOut();
        extract($_REQUEST);
        $this->yearBudgetOperate($year);
    }

    // 年度预算操作
    public function yearBudgetOperate($year) {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');

        $this->load->model('m_yearMoney');
        $num = $this->m_yearMoney->getNum(array('subjectId' => $subjectId));
        if ($num == 0) {
            $data['information'] = '管理员还未填写课题预算，请先联系系统管理员。';
            $this->load->view('common/header3');
            $this->load->view('common/information', $data);
            $this->load->view('common/footer');
        } else {
            // 年度预算值
            $array = array('year' => $year, 'subjectId' => $subjectId);
            $array1 = array('year' => $year, 'subjectId' => $subjectId, 'type' => 2);
            $data['yearMoney'] = $this->getYearMoney($array);
            $result = $this->getYears();
            $data['years'] = $result['years'];
            $data['year'] = $year;

            $this->load->model('m_monthMoney');
            $num = $this->m_monthMoney->getNum($array);
            if ($num == 0) {
                $data['monthMoney'] = $this->getEmptyData();
            } else {
                $array1 = array('subjectId', 'year');
                $data['monthMoney'] = $this->getMonthMoneySum($array, $array1);
            }

            $result = $this->getYearResult($data['yearMoney'], $data['monthMoney']);
            $data['last'] = $result['last'];
            $data['rate'] = $result['rate'];

            $data['caption'] = $this->getMonthMoneyCaption($array);

            $this->load->view('common/header3');
            $this->load->view('ordinary/money/yearBudget', $data);
            $this->load->view('common/footer');
        }
    }

    public function projectBudget() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');

        $this->load->model('m_yearMoney');
        $num = $this->m_yearMoney->getNum(array('subjectId' => $subjectId));
        if ($num == 0) {
            $data['information'] = '管理员还未填写课题预算，请先联系系统管理员。';
            $this->load->view('common/header3');
            $this->load->view('common/information', $data);
            $this->load->view('common/footer');
        } else {
            // 年度预算值
            $array = array('subjectId' => $subjectId);
            $array1 = array('subjectId');
            $data['yearMoney'] = $this->getYearMoneySum($array, $array1);

            $this->load->model('m_monthMoney');
            $num = $this->m_monthMoney->getNum($array);
            if ($num == 0) {
                $data['monthMoney'] = $this->getEmptyData();
            } else {
                $data['monthMoney'] = $this->getMonthMoneySum($array, $array1);
            }

            $result = $this->getYearResult($data['yearMoney'], $data['monthMoney']);
            $data['last'] = $result['last'];
            $data['rate'] = $result['rate'];

            $this->load->view('common/header3');
            $this->load->view('ordinary/money/projectBudget', $data);
            $this->load->view('common/footer');
        }
    }

    // 获取课题信息
    public function getSubjects() {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getSubject($data);
        return $result;
    }

    // 分页获取月度经费信息
    public function getBaoxiaoS($array, $offset) {

        $data = array();
        $result = $this->m_baoxiao->getBaoxiaoS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('bx_id' => $r->bx_id, 'date' => $r->date, 'totalMoney' => $r->totalMoney, 'sate' => $r->state,
                'date' => $r->date, 'contact' => $r->contact,
            );
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

    // 获取月度经费支出明细
    public function getMonthMoneyCaption($array) {
        $this->load->model('m_monthMoney');
        $data = new StdClass;
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

    // 获取年度经费信息
    public function getYearMoney($array) {

        $data = array();
        $result = $this->m_yearmoney->getYearMoney($array);

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

    // 获取本课题已有的年度预算
    public function getYears() {

        $subjectId = $this->session->userdata('subjectId');
        $array = array('subjectId' => $subjectId, 'type' => 2);
        $data['num'] = $this->m_yearmoney->getNum($array);
        $result = $this->m_yearmoney->getYearMoney($array);
        $arr = array();
        foreach ($result as $r) {
            array_push($arr, $r->year);
        }
        $data['years'] = $arr;
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

    // 设置月度经费空值
    function getEmptyData() {
        $money->b_id = 0;
        $money->b_name = '';
        $money->b_num = '';
        $money->bank_name = '';
        $money->money = '';
        $money->type = '';
        $money->s_id = $this->session->userdata('subjectId');
        $money->contact = '';
        $money->phone = '';
        $money->b_remarks = '';
        $money->state = '';
        $money->date = '';
        $money->content = '';
        $money->type1 = $this->getType();
        return $money;
    }

//获取职称
    function getType() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getType();
        return $data;
    }

    // 获取单个课题信息
    public function getSubject($id) {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');

        if ($role != 3) {
            $this->load->view('logout');
        }
    }

}

?>