<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Travel extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_travel');
        $this->load->model('m_money_record');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

// 报销列表管理页面
    public function travelList() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_travel->getNum($array);
        $offset = $this->uri->segment(4);

        $data['travel'] = $this->getTravelS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/travel/travelList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '差旅费报销列表';
        $data['num'] = $num;

        $data['Type'] = $this->getType();
        $data['State'] = $this->getState();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $this->load->view('common/header3');
        $this->load->view('ordinary/travel/travelSearch', $data);
        $this->load->view('ordinary/travel/travelList', $data);
        $this->load->view('common/footer');
    }

    // 变换显示
    function changeOption() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');

        $s = $this->m_travel->getState1($state);

        if (strcmp($type, 'all') == 0) {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('s_id' => $subjectId);
                    } else {
                        $array = array('state' => $s, 's_id' => $subjectId);
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('month' => $month, 's_id' => $subjectId);
                    } else {
                        $array = array('state' => $s, 'month' => $month, 's_id' => $subjectId);
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('year' => $year, 's_id' => $subjectId);
                    } else {
                        $array = array('year' => $year, 'state' => $s, 's_id' => $subjectId);
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('year' => $year, 'month' => $month, 's_id' => $subjectId);
                    } else {
                        $array = array('year' => $year, 'state' => $s, 'month' => $month, 's_id' => $subjectId);
                    }
                }
            }
        } else {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('s_id' => $subjectId, 'type' => $type);
                    } else {
                        $array = array('state' => $s, 's_id' => $subjectId, 'type' => $type);
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('month' => $month, 's_id' => $subjectId, 'type' => $type);
                    } else {
                        $array = array('state' => $s, 'month' => $month, 's_id' => $subjectId, 'type' => $type);
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('year' => $year, 's_id' => $subjectId, 'type' => $type);
                    } else {
                        $array = array('year' => $year, 'state' => $s, 's_id' => $subjectId, 'type' => $type);
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('year' => $year, 'month' => $month, 's_id' => $subjectId, 'type' => $type);
                    } else {
                        $array = array('year' => $year, 'state' => $s, 'month' => $month, 's_id' => $subjectId, 'type' => $type);
                    }
                }
            }
        }
        $num = $this->m_travel->getNum($array);
        $offset = $this->uri->segment(4);

        $data['travel'] = $this->getTravelS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/travel/travelList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '差旅费报销列表';
        $data['num'] = $num;

        //$this->load->view('common/header3');
        //$this->load->view('ordinary/travel/travelSearch', $data);
        $this->load->view('ordinary/travel/travelList', $data);
        // $this->load->view('common/footer');
    }

    // 月度经费详细信息页面
    public function travelDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);

        $data['travel'] = $this->getTravel($id);
        if (strcmp($data['travel']->state, '1') == 0) {
            $show = 'display';$show2 = 'display:none';
        } elseif (strcmp($data['travel']->state, '2') == 0) {
            $show = 'display';$show2 = 'display';
        } elseif (strcmp($data['travel']->state, '3') == 0) {
            $show = 'display:none';$show2 = 'display';
        } elseif (strcmp($data['travel']->state, '4') == 0) {
            $show = 'display:none';$show2 = 'display';
        } elseif (strcmp($data['travel']->state, '5') == 0) {
            $show = 'display:none';$show2 = 'display';
        } elseif (strcmp($data['travel']->state, '6') == 0) {
            $show = 'display';$show2 = 'display';
        } else {
            show_404();
        }
        $data['show'] = $show;
        $data['show2'] = $show2;
        $this->load->view('common/header3');
        $this->load->view('ordinary/travel/travelDetail', $data);
        $this->load->view('common/footer');
    }

    public function getTravel($id) {

        $data = array();
        $result = $this->m_travel->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    //新增页面
    public function travelNew() {
        $this->timeOut();
        $data = $this->getEmptyTravel();
        $this->load->view('common/header3');
        $this->load->view('ordinary/travel/travelAdd', $data);
        $this->load->view('common/footer');
    }

// 保存报销信息
    public function travelSave() {
        $this->timeOut();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('outDate', 'OutDate', 'required');
        $this->form_validation->set_rules('backDate', 'BackDate', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('peopleNum', 'PeopleNum', 'required');
        $this->form_validation->set_rules('reason', 'Reason', 'required');
        $this->form_validation->set_rules('destination', 'Destination', 'required');
        $this->form_validation->set_rules('subsidy', 'Subsidy', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['detail'] = "保存差旅报销信息有误！请检查填写的相应信息！";
            $this->load->view('common/header3');
            $this->load->view('common/error_1', $data);
            $this->load->view('common/footer');
        } else {
            $id = $this->m_travel->saveInfo();
            $mc_id = $this->m_money_record->saveInfo($id);
            $data['travel'] = $this->getTravel($id);
            if (strcmp($data['travel']->state, '1') == 0) {
                $show = 'display';$show2 = 'display:none';
            } elseif (strcmp($data['travel']->state, '2') == 0) {
                $show = 'display:none';$show2 = 'display';
            } elseif (strcmp($data['travel']->state, '3') == 0) {
                $show = 'display:none';$show2 = 'display';
            } elseif (strcmp($data['travel']->state, '4') == 0) {
                $show = 'display:none';$show2 = 'display';
            } elseif (strcmp($data['travel']->state, '5') == 0) {
                $show = 'display:none';$show2 = 'display';
            } elseif (strcmp($data['travel']->state, '6') == 0) {
                $show = 'display:none';$show2 = 'display';
            } else {
                echo "状态有误";
            }
            $money = $data['travel']->totalMoney;
            $subjectId = $this->session->userdata('subjectId');
            if (strcmp($data['travel']->type, '国内差旅') == 0) {
                //第一位代表课题号码；第二位代表类型（1，普通报销2，差旅报销3，借款，4，劳务5，借款报销）；第三位代表报销Id;第四位代表报销类型（1，设备费，2，材料费。。）；第伍位时间
                $code = $subjectId . '2' . $id . '5' . date('Ymd');
                $array = array('code' => $code,'type' => '差旅费');
                $array1 = array('travel' => $money, 'moneyType' => '差旅费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['travel']->type, '国际差旅') == 0) {
                $code = $subjectId . '2' . $id . '7' . date('Ymd');
                $array = array('code' => $code, 'type' => '国际合作交流费');
                $array1 = array('international' => $money, 'moneyType' => '国际合作交流费', 'money' => $money, 'code' => $code);
            }
            $this->m_travel->update($id, $array);
            $this->m_money_record->update($mc_id, $array1);
            $data['show'] = $show;
            $data['show2'] = $show2;
            $this->load->view('common/header3');
            $this->load->view('ordinary/travel/travelDetail', $data);
            $this->load->view('common/footer');
        }
    }

    // 报销信息编辑页面
    public function travelEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $m_type = 2;
        $data = $this->getData($id);
        $data2['record'] = $this->getMoneyRecord($id, $m_type);
        $mc_id = $data2['record']->mc_id;
        $data['mc_id'] = $mc_id;
        $data['m_type'] = $m_type;

        $this->load->view('common/header3');
        $this->load->view('ordinary/travel/travelAdd', $data);
        $this->load->view('common/footer');
    }

    public function getMoneyRecord($id, $m_type) {

        $data = array();
        $result = $this->m_money_record->getOneInfo1($id, $m_type);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 删除月度经费信息
    public function travelDelete() {
        $this->timeOut();
        $id = $this->uri->segment('4');
        $this->m_travel->delete($id);
        $type = 2;
        $this->m_money_record->delete($id, $type);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_travel->getNum($array);
        $offset = $this->uri->segment(5);

        $data['travel'] = $this->getTravelS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '报销列表';
        $data['num'] = $num;
        $data['Type'] = $this->getType();
        $data['State'] = $this->getState();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $this->load->view('common/header3');
        $this->load->view('ordinary/travel/travelSearch', $data);
        $this->load->view('ordinary/travel/travelList', $data);
        $this->load->view('common/footer');
    }

// 提交信息
    public function submit() {
        $this->timeOut();
        $bao_id = $this->uri->segment(4);
        $arraySubmit = array('state' => '3', 'date' => date("Y-m-d"), 'year' => date("Y"), 'month' => date("m"));
        $this->m_travel->update($bao_id, $arraySubmit);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_travel->getNum($array);
        $offset = $this->uri->segment(5);
        $data['travel'] = $this->getTravelS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '报销列表';
        $data['num'] = $num;
        $data['Type'] = $this->getType();
        $data['State'] = $this->getState();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $this->load->view('common/header3');
        $this->load->view('ordinary/travel/travelSearch', $data);
        $this->load->view('ordinary/travel/travelList', $data);
        $this->load->view('common/footer');
    }

    //按金额查询
    public function travelSearch() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $searchType1 = $_POST['searchType'];
        $searchTerm = trim($_POST['searchTerm']);
        if (!get_magic_quotes_gpc()) {
            $searchType1 = addslashes($searchType1);
            $searchTerm = addslashes($searchTerm);
        }
        if ($searchType1 == '1') {
            $array = array('s_id' => $subjectId, 'code' => $searchTerm);
        } elseif ($searchType1 == '2') {
            $array = array('s_id' => $subjectId, 'money' => $searchTerm);
        } else {
            $message = 's_id有误';
            show_error($message);
        }

        $num = $this->m_travel->getNum($array);
        $offset = $this->uri->segment(4);
        $data['travel'] = $this->getTravelS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/travel/travelList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '差旅费报销列表';
        $data['num'] = $num;
        $data['State'] = $this->getState();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $this->load->view('common/header3');
        $this->load->view('ordinary/travel/travelSearch', $data);
        $this->load->view('ordinary/travel/travelList', $data);
        $this->load->view('common/footer');
    }

// 设置报销单空值
    function getEmptyTravel() {
        @$travel->t_id = 0;
        @$travel->mc_id = 0;
        $travel->m_type = '';
        $travel->code = '';
        $travel->type = '';
        $travel->s_id = $this->session->userdata('subjectId');
        $travel->name = '';
        $travel->date = '';
        $travel->date3 = '';
        $travel->date4 = '';
        $travel->date5 = '';
        $travel->date6 = '';
        $travel->outDate = '';
        $travel->backDate = '';
        $travel->days = '';
        $travel->peopleNum = '';
        $travel->reason = '';
        $travel->destination = '';
        $travel->trainMoney = '';
        $travel->trainMoneyNum = '';
        $travel->planeMoney = '';
        $travel->planeMoneyNum = '';
        $travel->otherTravelMoney = '';
        $travel->otherTravelMoneyNum = '';
        $travel->accommodation = '';
        $travel->accommodationNum = '';
        $travel->otherMoney = '';
        $travel->otherMoneyNum = '';
        $travel->otherDetail = '';
        $travel->subsidy = '';
        $travel->totalMoney = '';
        $travel->description = '';
        $travel->remark = '';
        $travel->state = '';
        $travel->type1 = $this->getType();

        return $travel;
    }

    //获取已有的填充信息
    function getData($id) {

        $result = $this->m_travel->getOneInfo($id);
        foreach ($result as $r) {
            $data['t_id'] = $id;
            $data['s_id'] = $r->s_id;
            $data['code'] = $r->code;
            $data['type'] = $r->type;
            $data['date'] = $r->date;
            $data['outDate'] = $r->outDate;
            $data['backDate'] = $r->backDate;
            $data['days'] = $r->days;
            $data['name'] = $r->name;
            $data['peopleNum'] = $r->peopleNum;
            $data['reason'] = $r->reason;
            $data['destination'] = $r->destination;
            $data['trainMoney'] = $r->trainMoney;
            $data['trainMoneyNum'] = $r->trainMoneyNum;
            $data['planeMoney'] = $r->planeMoney;
            $data['planeMoneyNum'] = $r->planeMoneyNum;
            $data['otherTravelMoney'] = $r->otherTravelMoney;
            $data['otherTravelMoneyNum'] = $r->otherTravelMoneyNum;
            $data['accommodation'] = $r->accommodation;
            $data['accommodationNum'] = $r->accommodationNum;
            $data['otherMoney'] = $r->otherMoney;
            $data['otherMoneyNum'] = $r->otherMoneyNum;
            $data['otherDetail'] = $r->otherDetail;
            $data['subsidy'] = $r->subsidy;
            $data['totalMoney'] = $r->totalMoney;
            $data['description'] = $r->description;
            $data['remark'] = $r->remark;
            $data['state'] = $r->state;
            $data['type1'] = $this->getType();
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

//获取报销类型
    function getState() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getBaoxiaoState();
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

    // 分页获取月度经费信息
    public function getTravelS($array, $offset) {

        $data = array();
        $result = $this->m_travel->getTravelS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('t_id' => $r->t_id, 'type' => $r->type, 'code' => $r->code, 'date' => $r->date, 'outDate' => $r->outDate, 'backDate' => $r->backDate, 'days' => $r->days, 'peopleNum' => $r->peopleNum, 'totalMoney' => $r->totalMoney,
                'state' => $this->m_travel->getState($r->state),'color' => $this->getColor($r->state),
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

//获取职称
    function getType() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getTravelType();
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
    //显示状态对应的颜色
    function getColor($state) {
        switch ($state) {
            case 1:
                $data['color'] = '#FFA500';
                break;
            case 2:
                $data['color'] = 'red';

                break;
            case 3:
                $data['color'] = 'blue';
                break;
            case 4:
                $data['color'] = '#8B8B00';

                break;
            case 5:
                $data['color'] = 'green';

                break;
        }

        return $data['color'];
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
