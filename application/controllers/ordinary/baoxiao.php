<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Baoxiao extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');

        $this->load->model('m_baoxiao');
        $this->load->model('m_money_record');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    // 报销列表管理页面
    public function baoxiaoList() {
        $this->timeOut();
        $this->load->library('pagination');
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_baoxiao->getNum($array);
        $offset = $this->uri->segment(4);

        $data['baoxiao'] = $this->getBaoxiaoS($array, $offset);
       // print_r($data['baoxiao']);
        $config['base_url'] = base_url() . 'index.php/ordinary/baoxiao/baoxiaoList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        //$data['year'] = date("Y");
        //$data['month'] = date("m");
        $this->load->view('common/header3');
        $this->load->view('ordinary/baoxiao/baoxiaoSearch', $data);
        $this->load->view('ordinary/baoxiao/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

    // 变换显示
    function changeOption() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $s = $this->m_baoxiao->getState1($state);
        if (strcmp($year, 'all') == 0) {
            if (strcmp($month, 'all') == 0) {
                if (strcmp($type, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('s_id' => $subjectId);
                    } else {
                        $array = array('s_id' => $subjectId, 'state' => $s);
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('type' => $type, 's_id' => $subjectId);
                    } else {
                        $array = array('type' => $type, 's_id' => $subjectId, 'state' => $s);
                    }
                }
            } else {
                if (strcmp($type, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('s_id' => $subjectId, 'month' => $month);
                    } else {
                        $array = array('s_id' => $subjectId, 'state' => $s, 'month' => $month);
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('type' => $type, 's_id' => $subjectId, 'month' => $month);
                    } else {
                        $array = array('type' => $type, 's_id' => $subjectId, 'state' => $s, 'month' => $month);
                    }
                }
            }
        } else {
            if (strcmp($month, 'all') == 0) {
                if (strcmp($type, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('s_id' => $subjectId, 'year' => $year);
                    } else {
                        $array = array('s_id' => $subjectId, 'state' => $s, 'year' => $year);
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('type' => $type, 's_id' => $subjectId, 'year' => $year);
                    } else {
                        $array = array('type' => $type, 's_id' => $subjectId, 'state' => $s, 'year' => $year);
                    }
                }
            } else {
                if (strcmp($type, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('s_id' => $subjectId, 'month' => $month, 'year' => $year);
                    } else {
                        $array = array('s_id' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year);
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('type' => $type, 's_id' => $subjectId, 'month' => $month, 'year' => $year);
                    } else {
                        $array = array('type' => $type, 's_id' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year);
                    }
                }
            }
        }

        $num = $this->m_baoxiao->getNum($array);
        $offset = $this->uri->segment(4);

        $data['baoxiao'] = $this->getBaoxiaoS_1($array, $offset);
        //$config['base_url'] = base_url() . 'index.php/ordinary/baoxiao/baoxiaoList_search';
        //$config['total_rows'] = $num;
        //$config['uri_segment'] = 4;
        //$this->pagination->initialize($config);
        //$data['page'] = $this->pagination->create_links();
        $data['title'] = '报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        //$data['year'] = date("Y");
        //$data['month'] = date("m");

        $this->load->view('ordinary/baoxiao/baoxiaoList_1', $data);

    }

    //报销详细信息页面
    public function baoxiaoDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);

        $data['baoxiao'] = $this->getBaoxiao($id);
        if (strcmp($data['baoxiao']->state, '1') == 0) {
            $show = 'display'; $show2 = 'display:none';
        } elseif (strcmp($data['baoxiao']->state, '2') == 0) {
            $show = 'display'; $show2 = 'display';
        } elseif (strcmp($data['baoxiao']->state, '3') == 0) {
            $show = 'display:none'; $show2 = 'display';
        } elseif (strcmp($data['baoxiao']->state, '4') == 0) {
            $show = 'display:none'; $show2 = 'display';
        } elseif (strcmp($data['baoxiao']->state, '5') == 0) {
            $show = 'display:none'; $show2 = 'display';
        } else {
            show_404();
        }
        $data['show'] = $show;
        $data['show2'] = $show2;

        $this->load->view('common/header3');
        $this->load->view('ordinary/baoxiao/baoxiaoDetail', $data);
        $this->load->view('common/footer');
    }

    public function getBaoxiao($id) {

        $data = array();
        $result = $this->m_baoxiao->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getMoneyRecord($id, $m_type) {

        $data = array();
        $result = $this->m_money_record->getOneInfo1($id, $m_type);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    //新增页面
    public function baoxiaoNew() {
        $this->timeOut();
        $data = $this->getEmptyBaoxiao();

        $this->load->view('common/header3');
        $this->load->view('ordinary/baoxiao/baoxiaoAdd', $data);
        $this->load->view('common/footer');
    }

// 保存报销信息
    public function baoxiaoSave() {
        $this->timeOut();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('type', 'Type', 'required');
        //$this->form_validation->set_rules('num', 'Num', 'required');
        $this->form_validation->set_rules('money', 'Money', 'required');
        //检查必要信息
        if ($this->form_validation->run() === FALSE) {
            $data['detail'] = "保存报销信息有误！请检查填写的相应信息！";
            $this->load->view('common/header3');
            $this->load->view('common/error_1', $data);
            $this->load->view('common/footer');
        } else {
            $id = $this->m_baoxiao->saveInfo();
            $subjectId = $this->session->userdata('subjectId');
            $mc_id = $this->m_money_record->saveInfo($id);
            $data['baoxiao'] = $this->getBaoxiao($id);
            if (strcmp($data['baoxiao']->type, '设备费') == 0) {
                $money = $data['baoxiao']->money;
                //第一位代表课题号码；第二位代表类型（1，普通报销2，差旅报销3，借款，4，劳务5，借款报销）；第三位代表报销Id;第四位代表报销类型（1，设备费，2，材料费。。）；第伍位时间
                $code = $subjectId . '1' . $id . '1' . date('Ymd');
                $array = array('equipment' => $money, 'code' => $code);
                $array1 = array('equipment' => $money, 'moneyType' => '设备费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '材料费') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '2' . date('Ymd');
                $array = array('material' => $money, 'code' => $code);
                $array1 = array('material' => $money, 'moneyType' => '材料费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '测试化验加工费') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '3' . date('Ymd');
                $array = array('experiment' => $money, 'code' => $code);
                $array1 = array('experiment' => $money, 'moneyType' => '测试化验加工费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '燃料动力费') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '4' . date('Ymd');
                $array = array('fuel' => $money, 'code' => $code);
                $array1 = array('fuel' => $money, 'moneyType' => '燃料动力费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '差旅费') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '5' . date('Ymd');
                $array = array('travel' => $money, 'code' => $code);
                $array1 = array('travel' => $money, 'moneyType' => '差旅费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '会议费') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '6' . date('Ymd');
                $array = array('conference' => $money, 'code' => $code);
                $array1 = array('conference' => $money, 'moneyType' => '会议费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '国际合作交流费') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '7' . date('Ymd');
                $array = array('international' => $money, 'code' => $code);
                $array1 = array('international' => $money, 'moneyType' => '国际合作交流费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '出版/文献/信息传播/知识产权事务费') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '8' . date('Ymd');
                $array = array('information' => $money, 'code' => $code);
                $array1 = array('information' => $money, 'moneyType' => '出版/文献/信息传播/知识产权事务费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '劳务费') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '9' . date('Ymd');
                $array = array('service' => $money, 'code' => $code);
                $array1 = array('service' => $money, 'moneyType' => '劳务费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '专家咨询费') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '10' . date('Ymd');
                $array = array('consultative' => $money, 'code' => $code);
                $array1 = array('consultative' => $money, 'moneyType' => '劳务费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '其它') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '11' . date('Ymd');
                $array = array('other' => $money, 'code' => $code);
                $array1 = array('other' => $money, 'moneyType' => '其它', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['baoxiao']->type, '间接经费') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '12' . date('Ymd');
                $array = array('indirect_cost' => $money, 'code' => $code);
                $array1 = array('indirect_cost' => $money, 'moneyType' => '间接经费', 'money' => $money, 'code' => $code);
            }elseif (strcmp($data['baoxiao']->type, '间接经费-用于绩效') == 0) {
                $money = $data['baoxiao']->money;
                $code = $subjectId . '1' . $id . '13' . date('Ymd');
                $array = array('ji_xiao' => $money, 'code' => $code);
                $array1 = array('ji_xiao' => $money, 'moneyType' => '间接经费-用于绩效', 'money' => $money, 'code' => $code);
            }
            else {
                echo "类别有误";
            }
            $this->m_baoxiao->update($id, $array);
            $this->m_money_record->update($mc_id, $array1);
            if (strcmp($data['baoxiao']->state, '1') == 0) {
                $show = 'display';$show2 = 'display:none';
            } elseif (strcmp($data['baoxiao']->state, '2') == 0) {
                $show = 'display';$show2 = 'display';
            } elseif (strcmp($data['baoxiao']->state, '3') == 0) {
                $show = 'display:none';$show2 = 'display';
            } elseif (strcmp($data['baoxiao']->state, '4') == 0) {
                $show = 'display:none';$show2 = 'display';
            } else {
                echo "状态有误";
            }
            $data['show'] = $show;
            $data['show2'] = $show2;
            $this->load->view('common/header3');
            $this->load->view('ordinary/baoxiao/baoxiaoDetail', $data);
            $this->load->view('common/footer');
        }
    }

    // 报销信息编辑页面
    public function baoxiaoEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $m_type = 1;
        $data = $this->getData($id);
        $data2['record'] = $this->getMoneyRecord($id, $m_type);
        $mc_id = $data2['record']->mc_id;
        $data['mc_id'] = $mc_id;
        $data['m_type'] = $m_type;
        $data['title'] = '报销单编辑';
        $this->load->view('common/header3');
        $this->load->view('ordinary/baoxiao/baoxiaoAdd', $data);
        $this->load->view('common/footer');
    }

    // 删除费信息
    public function baoxiaoDelete() {
        $this->timeOut();
        $this->load->library('pagination');
        $id = $this->uri->segment('4');
        $type = 1;
        $this->m_baoxiao->delete($id);
        $this->m_money_record->delete($id, $type);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_baoxiao->getNum($array);
        $offset = $this->uri->segment(5);
        $data['baoxiao'] = $this->getBaoxiaoS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/baoxiao/baoxiaoList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $this->load->view('common/header3');
        $this->load->view('ordinary/baoxiao/baoxiaoSearch', $data);
        $this->load->view('ordinary/baoxiao/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

// 提交信息
    public function submit() {
        $this->timeOut();
        $this->load->library('pagination');
        $bao_id = $this->uri->segment(4);
        $arraySubmit = array('state' => '3', 'date' => date("Y-m-d"), 'year' => date("Y"), 'month' => date("m"));
        $this->m_baoxiao->update($bao_id, $arraySubmit);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_baoxiao->getNum($array);
        $offset = $this->uri->segment(5);
        $data['baoxiao'] = $this->getBaoxiaoS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/baoxiao/baoxiaoList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $this->load->view('common/header3');
        $this->load->view('ordinary/baoxiao/baoxiaoSearch', $data);
        $this->load->view('ordinary/baoxiao/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

    //按金额查询
    public function baoxiaoSearch() {
        $this->timeOut();
        $this->load->library('pagination');
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
        $num = $this->m_baoxiao->getNum($array);
        $offset = $this->uri->segment(4);

        $data['baoxiao'] = $this->getBaoxiaoS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/baoxiao/baoxiaoList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        //$data['year'] = date("Y");
        //$data['month'] = date("m");
        $this->load->view('common/header3');
        $this->load->view('ordinary/baoxiao/baoxiaoSearch', $data);
        $this->load->view('ordinary/baoxiao/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

// 设置报销单空值
    function getEmptyBaoxiao() {
        @$baoxiao->bao_id = 0;
        @$baoxiao->mc_id = 0;
        $baoxiao->title = '报销单填写';
        $baoxiao->type = '';
        $baoxiao->code = '';
        $baoxiao->m_type = '';
        $baoxiao->date = '';
        $baoxiao->bao2 = '';
        $baoxiao->date3 = '';
        $baoxiao->date4 = '';
        $baoxiao->date5 = '';
        $baoxiao->date6 = '';
        $baoxiao->money = '';
        $baoxiao->remark = '';
        $baoxiao->remark2 = '';
        $baoxiao->s_id = $this->session->userdata('subjectId');
        $baoxiao->state = '';
        $baoxiao->baoxiaoDetail = '';
        $baoxiao->money = '';
        $baoxiao->equipment = '';
        $baoxiao->material = '';
        $baoxiao->experiment = '';
        $baoxiao->fuel = '';
        $baoxiao->conference = '';
        $baoxiao->international = '';
        $baoxiao->information = '';
        $baoxiao->service = '';
        $baoxiao->consultative = '';
        $baoxiao->other = '';
        $baoxiao->ji_xiao = '';
        $baoxiao->num = '';
        $baoxiao->baoxiao_name = '';
        $baoxiao->description = '';
        $baoxiao->type1 = $this->getType();
        $baoxiao->moneyLeft = 0;
        return $baoxiao;
    }

    //获取已有的填充信息
    function getData($id) {

        $result = $this->m_baoxiao->getOneInfo($id);
        foreach ($result as $r) {
            $data['bao_id'] = $r->bao_id;
            $data['s_id'] = $r->s_id;
            $data['type'] = $r->type;
            $data['date'] = $r->date;
            $data['baoxiaoDetail'] = $r->baoxiaoDetail;
            $data['remark'] = $r->remark;
            $data['num'] = $r->num;
            $data['money'] = $r->money;
            $data['date'] = $r->date;
            $data['remark'] = $r->remark;
            $data['remark2'] = $r->remark2;
            $data['baoxiao_name'] = $r->baoxiao_name;
            $data['description'] = $r->description;
            $data['type1'] = $this->getType();
        }
        return $data;
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

    // 分页获取报销经费信息
    public function getBaoxiaoS($array, $offset) {

        $data = array();

        $result = $this->m_baoxiao->getBaoxiaoS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('bao_id' => $r->bao_id, 'date' => $r->date, 'type' => $r->type, 'code' => $r->code, 'num' => $r->num, 'money' => $r->money,
                'state' => $this->m_baoxiao->getState($r->state),'color' => $this->getColor($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }
    // 分页获取报销经费信息--分类查询用
    public function getBaoxiaoS_1($array, $offset) {

        $data = array();

        $result = $this->m_baoxiao->getBaoxiaoS_1($array,$offset);

        foreach ($result as $r) {
            $arr = array('bao_id' => $r->bao_id, 'date' => $r->date, 'type' => $r->type, 'code' => $r->code, 'num' => $r->num, 'money' => $r->money,
                'state' => $this->m_baoxiao->getState($r->state),'color' => $this->getColor($r->state),
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

//获取报销类型
    function getState() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getBaoxiaoState();
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