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
        $this->load->model('m_monthmoney');
        $this->load->model('m_totalmoney');
        $this->load->model('m_yearmoney');
        $this->load->model('m_money_record');
    }

    // 子课题总经费预算页面
    public function totalList() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('subjectId' => $subjectId);
        $data['money'] = $this->getTotalMoney($subjectId);

        $this->load->view('common/header3');
        $this->load->view('ordinary/money/totalDetail', $data);
        $this->load->view('common/footer');
    }

    // 子课题年度经费预算页面
    public function yearList() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('subjectId' => $subjectId);
        $num = $this->m_yearmoney->getNum($array);
        $offset = $this->uri->segment(5);
        $data['money'] = $this->getYearMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/admin/money/yearList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('ordinary/money/yearList', $data);
        $this->load->view('common/footer');
    }

    // 月度经费管理页面
    public function monthList() {
        $this->timeOut();
        $type = $this->uri->segment(4);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('subjectId' => $subjectId, 'type' => $type);
        $this->load->model('m_monthMoney');
        $num = $this->m_monthMoney->getNum($array);
        $offset = $this->uri->segment(5);
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

    // 子课题花费情况列表
    public function expenseList() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_money_record->getNum($array);
        $su=$this->m_money_record->getMoney_all($array);
        $su1=get_object_vars($su['0']);
        $sum=$su1['money'];


        $offset = $this->uri->segment(4);
        $data['money'] = $this->getExpenseS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/money/expenseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $num;
        $data['sum'] = $sum;

        $data['title'] = '课题经费花费详情';
        $data['Type'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();

        $this->load->view('common/header3');
        $this->load->view('ordinary/money/moneySearch', $data);
        $this->load->view('ordinary/money/expenseList', $data);
        $this->load->view('common/footer');
    }

    // 子课题经费花费情况 变换显示
    function changeOption() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        if (strcmp($year, 'all') == 0) {
            if (strcmp($month, 'all') == 0) {
                if (strcmp($moneyType, 'all') == 0) {
                    $array = array('s_id' => $subjectId);
                } else {
                    $array = array('moneyType' => $moneyType, 's_id' => $subjectId);
                }
            } else {
                if (strcmp($moneyType, 'all') == 0) {
                    $array = array('month' => $month, 's_id' => $subjectId);
                } else {
                    $array = array('moneyType' => $moneyType, 'month' => $month, 's_id' => $subjectId);
                }
            }
        } else {
            if (strcmp($month, 'all') == 0) {
                if (strcmp($moneyType, 'all') == 0) {
                    $array = array('year' => $year, 's_id' => $subjectId);
                } else {
                    $array = array('year' => $year, 'moneyType' => $moneyType, 's_id' => $subjectId);
                }
            } else {
                if (strcmp($moneyType, 'all') == 0) {
                    $array = array('year' => $year, 'month' => $month, 's_id' => $subjectId);
                } else {
                    $array = array('year' => $year, 'moneyType' => $moneyType, 'month' => $month, 's_id' => $subjectId);
                }
            }
        }
        $num = $this->m_money_record->getNum($array);
        $su=$this->m_money_record->getMoney_all($array);
        $su1=get_object_vars($su['0']);
        $sum=$su1['money'];
        $offset = $this->uri->segment(4);
        $data['money'] = $this->getExpenseS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/money/expenseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $num;
        $data['sum'] = $sum;
        $data['title'] = '课题经费花费详情';
        $data['Type'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();

        // $this->load->view('common/header3');
        //$this->load->view('ordinary/money/moneySearch');
        $this->load->view('ordinary/money/expenseList', $data);
        // $this->load->view('common/footer');
    }

// 年度经费详细信息页面
    public function yearMoneyDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['money'] = $this->getYearMoney_1($id);

        $this->load->view('common/header3');
        $this->load->view('ordinary/money/yearDetail', $data);
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

// h花费详细信息页面
    public function expenseDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $type = $this->uri->segment(5);
        if ($type == 1) {
            $data['baoxiao'] = $this->getBaoxiao($id);
            $this->load->view('common/header3');
            $this->load->view('ordinary/money/baoxiaoDetail', $data);
            $this->load->view('common/footer');
        } elseif ($type == 2) {
            $data['travel'] = $this->getTravel($id);
            $this->load->view('common/header3');
            $this->load->view('ordinary/money/travelDetail', $data);
            $this->load->view('common/footer');
        } elseif ($type == 3) {
            $data['borrow'] = $this->getBorrow($id);
            $this->load->view('common/header3');
            $this->load->view('ordinary/money/borrowDetail', $data);
            $this->load->view('common/footer');
        } elseif ($type == 4) {
            $data['laowu'] = $this->getLaowu($id);
            $this->load->view('common/header3');
            $this->load->view('ordinary/money/laowuDetail', $data);
            $this->load->view('common/footer');
        }
    }

    //按金额查询
    public function expenseMoneySearch() {
        $this->timeOut();

        $searchterm = trim($_POST['searchTerm']);
        if (!$searchterm) {
            echo "您未填写内容，请返回并重试！";
            exit;
        }
        if (!get_magic_quotes_gpc()) {

            $searchterm = addslashes($searchterm);
        }
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId, 'money' => $searchterm);
        $num = $this->m_money_record->getNum($array);
        $offset = $this->uri->segment(4);
        $data['money'] = $this->getExpenseS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/money/expenseList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['num'] = $num;
        $data['title'] = '课题经费花费详情';
        $data['Type'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();

        $this->load->view('common/header3');
        $this->load->view('ordinary/money/moneySearch', $data);
        $this->load->view('ordinary/money/expenseList', $data);
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

    // 月度经费详细信息新增页面
    public function monthMoneyNew() {
        $this->timeOut();
        $this->load->model('m_subject');
        $subjectId = $this->session->userdata('subjectId');
        $result = $this->getYears();
        $data['subject'] = $this->getSubject($subjectId);
        $inherit = $data['subject']->inherit;
        $data['inherit'] = $inherit;
        $num = $result['num'];
        if ($num == 0) {
            $data['information'] = '管理员还未填写课题预算，请先联系系统管理员。';
            $this->load->view('common/header3');
            $this->load->view('common/information', $data);
            $this->load->view('common/footer');
        } else {
            $data['monthMoney'] = $this->getEmptyData();
            $data['years'] = $result['years'];

            $flag = false;
            foreach ($result['years'] as $y) {
                if ($y == $data['monthMoney']->year) {
                    $flag = true;
                    break;
                }
            }
            $year = $data['monthMoney']->year;
            if (!$flag)
                $year = $result['years'][0];

            $array = array('year' => $year, 'subjectId' => $subjectId);
            $data['yearMoney'] = $this->getYearMoney($array);
            $data['year'] = $data['monthMoney']->year;
            $data['month'] = $data['monthMoney']->month;
            $data['subjectUnit'] = $this->session->userdata('subjectUnit');

            $data['subjectId'] = $subjectId;
            $this->load->view('common/header3');
            $this->load->view('ordinary/money/monthEdit', $data);
            $this->load->view('common/footer');
        }
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

        $this->load->model('m_yearmoney');
        $num = $this->m_yearmoney->getNum(array('subjectId' => $subjectId));
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

    /*   public function projectBudget() {
           $this->timeOut();
           $subjectId = $this->session->userdata('subjectId');
           //判断是否已经做了预算
           $num = $this->m_totalmoney->getNum(array('subjectId' => $subjectId));
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
   */
    public function projectBudget() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        //判断是否已经做了预算
        $num = $this->m_totalmoney->getNum(array('subjectId' => $subjectId));
        if ($num == 0) {
            $data['information'] = '管理员还未填写课题预算，请先联系系统管理员。';
            $this->load->view('common/header3');
            $this->load->view('common/information', $data);
            $this->load->view('common/footer');
        } else {

            //show_404();
            // 计算总预算值
            $subjectId = $this->session->userdata('subjectId');
            $array = array('s_id' => $subjectId);
            $data['money1'] = $this->getTotalMoney($subjectId);
            $result=get_object_vars($data['money1']);
            //print_r($result);
            //已支出的情况
            $all=$this->m_totalmoney->getMoney_cost($array);
            $cost=get_object_vars($all[0]);
            $result1=$cost;


            @$money->direct_cost_1 = $result['direct_cost'];
            //$money->direct_cost_2 = round(($result['direct_cost']-$result1['direct_cost']),2);
            //$money->direct_cost_3 = $result1['direct_cost'];
            $money->equipment_1 = $result['equipment'];
            $money->equipment_2 = round(($result['equipment']-($result1['equipment']/10000)),2);
            $money->equipment_3 = round(($result1['equipment']/10000),2);
            $money->equipment_rate=round(100*(($result1['equipment']/10000)/$result['equipment']),2);
            $money->material_1 = $result['material'];
            $money->material_2 =round(($result['material']-($result1['material']/10000)),2);
            $money->material_3 = round(($result1['material']/10000),2);
            $money->material_rate=round(100*(($result1['material']/10000)/$result['material']),2);
            $money->experiment_1 = $result['experiment'];
            $money->experiment_2 = round(($result['experiment']-($result1['experiment']/10000)),2);
            $money->experiment_3 = round(($result1['experiment']/10000),2);
            @$money->experiment_rate=round(100*(($result1['experiment']/10000)/$result['experiment']),2);
            $money->fuel_1 = $result['fuel'];
            $money->fuel_2 =round(abs($result['fuel']-($result1['fuel']/10000)),2);
            $money->fuel_3 = round(($result1['fuel']/10000),2);
            $money->fuel_rate=round(100*(($result1['fuel']/10000)/$result['fuel']),2);
            $money->travel_1 = $result['travel'];
            $money->travel_2 = round(($result['travel']-($result1['travel']/10000)),2);
            $money->travel_3 =round(($result1['travel']/10000),2);
            $money->travel_rate=round(100*(($result1['travel']/10000)/$result['travel']),2);
            $money->conference_1 = $result['conference'];
            $money->conference_2 = round(($result['conference']-($result1['conference']/10000)),2);
            $money->conference_3 = round(($result1['conference']/10000),2);
            $money->conference_rate=round(100*(($result1['conference']/10000)/$result['conference']),2);
            $money->international_1 = $result['international'];
            $money->international_2 =round(($result['international']-($result1['international']/10000)),2);
            $money->international_3 = round(($result1['international']/10000),2);
            $money->international_rate=round(100*(($result1['international']/10000)/$result['international']),2);
            $money->information_1 = $result['information'];
            $money->information_2 = round(($result['information']-($result1['information']/10000)),2);
            $money->information_3 = round(($result1['information']/10000),2);
            $money->information_rate=round(100*(($result1['information']/10000)/$result['information']),2);
            $money->service_1 = $result['service'];
            $money->service_2 =round(($result['service']-($result1['service']/10000)),2);
            $money->service_3 = round(($result1['service']/10000),2);
            $money->service_rate=round(100*(($result1['service']/10000)/$result['service']),2);
            $money->consultative_1 = $result['consultative'];
            $money->consultative_2 = round(($result['consultative']-($result1['consultative']/10000)),2);
            $money->consultative_3 = round(($result1['consultative']/10000),2);
            $money->consultative_rate=round(100*(($result1['consultative']/10000)/$result['consultative']),2);
            $money->other_1 = $result['other'];
            $money->other_2 = round(($result['other']-($result1['other']/10000)),2);
            $money->other_3 = round(($result1['other']/10000));
            @$money->other_rate=round(100*(($result1['other']/10000)/$result['other']),2);
            $money->indirect_cost_1 = $result['indirect_cost'];
            $money->indirect_cost_2 = round(($result['indirect_cost']-($result1['indirect_cost']/10000)),2);
            $money->indirect_cost_3 = round(($result1['indirect_cost']/10000),2);
            $money->indirect_cost_rate=round(100*(($result1['indirect_cost']/10000)/$result['indirect_cost']),2);
            $money->ji_xiao_1 = $result['ji_xiao'];
            $money->ji_xiao_2 = round(($result['ji_xiao']-($result1['ji_xiao']/10000)),2);
            $money->ji_xiao_3 = round(($result1['ji_xiao']/10000),2);
            $money->ji_xiao_rate=round(100*(($result1['ji_xiao']/10000)/$result['ji_xiao']),2);
            $money->total_1 = round($result['total'],2);
            $money->total_2 =  round(($result['total']-($result1['total']/10000)),2);
            $money->total_3 = round(($result1['total']/10000),2);
            $money->total_rate=round(100*(($result1['total']/10000)/$result['total']),2);
            $data['money1'] = $money;



            //$data['money'] = $this->getMoneyData();
            $this->load->view('common/header3');
            $this->load->view('ordinary/money/projectBudget',$data);
            $this->load->view('common/footer');

        }
    }

// 分页获取课题总经费信息
    public function getTotalMoney($subjectId) {
        $this->timeOut();
        $this->load->model('m_totalmoney');
        $data = array();
        $result = $this->m_totalmoney->getOneInfo1($subjectId);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getBaoxiao($id) {

        $data = array();
        $this->load->model('m_baoxiao');
        $result = $this->m_baoxiao->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getBorrow($id) {

        $data = array();
        $this->load->model('m_borrow');
        $result = $this->m_borrow->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getTravel($id) {

        $data = array();
        $this->load->model('m_travel');
        $result = $this->m_travel->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getLaowu($id) {

        $data = array();
        $this->load->model('m_laowu');
        $result = $this->m_laowu->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取课题信息
    public function getSubjects() {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getSubject($data);
        return $result;
    }

    // 分页获取月度经费信息
    public function getMonthMoneyS($array, $offset) {
        $this->load->model('m_monthMoney');
        $data = array();
        $result = $this->m_monthMoney->getMonthMoneyS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('monthMoneyId' => $r->monthMoneyId, 'year' => $r->year, 'type' => $r->type,
                'month' => $r->month, 'total' => $r->total,
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

// 获取年度经费信息
    public function getYearMoney_1($id) {
        $this->load->model('m_yearmoney');
        $data = array();
        $result = $this->m_yearmoney->getYearMoney1($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 获取年度经费总和信息
    public function getYearMoneySum($array, $array1) {
        $this->load->model('m_yearmoney');
        $data = array();
        $result = $this->m_yearmoney->getYearMoneySum($array, $array1);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

// 分页获取全部年度经费信息
    public function getYearMoneyS($array, $offset) {
        $this->timeOut();
        $this->load->model('m_yearmoney');
        $data = array();
        $result = $this->m_yearmoney->getYearMoneyS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('yearMoneyId' => $r->yearMoneyId, 'year' => $r->year,
                'subjectName' => $r->subjectName, 'subjectUnit' => $r->subjectUnit, 'total' => $r->total,
                'subjectNum' => $r->subjectNum);
            array_push($data, $arr);
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

// 分页获取全部花费经费信息
    public function getExpenseS($array, $offset) {
        $this->timeOut();
        $data = array();
        $result = $this->m_money_record->getMoney_currentS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('mc_id' => $r->mc_id, 's_id' => $r->s_id, 'b_id' => $r->b_id,
                'date' => $r->date, 'money' => $r->money, 'moneyType' => $r->moneyType,
                'm_type' => $r->m_type
            );
            array_push($data, $arr);

        }
        return $data;
    }
    //计算此分页的金额总数
    public function get_expense_sum($num,$result) {
        $num=$num;
        for($n=0;$x<=$num;$n++){

        }

        return $data;
    }

    // 设置月度经费空值
    function getEmptyData() {
        $money->monthMoneyId = 0;
        $money->type = '';
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

//获取报销类型
    function getType() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getBaoxiaoType();
        return $data;
    }

//获取查询的年
    function getSearchYear() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getSearchYear();
        return $data;
    }

//获取查询的月
    function getSearchMonth() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getSearchMonth();
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