<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Check extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_money_record');
        $this->load->model('m_baoxiao');
        $this->load->model('m_travel');
        $this->load->model('m_borrow');
        $this->load->model('m_laowu');
    }

    // 普通报销情况列表
    public function baoxiaoManage() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_baoxiao->getNumManage($array);
        $s1 = $this->uri->segment(4);
        $offset = $this->uri->segment(4);
        $data['baoxiao'] = $this->getBaoxiaoMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/baoxiaoManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '普通报销审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '1';
        $this->load->view('common/header3');
        $this->load->view('manager/check/baoxiaoSearch', $data);
        $this->load->view('manager/check/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

    // 普通报销情况列表
    public function travelManage() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_travel->getNumManage($array);
        $offset = $this->uri->segment(4);
        $data['baoxiao'] = $this->getTravelMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/travelManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '差旅报销审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getTypeTravel();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '2';
        $this->load->view('common/header3');
        $this->load->view('manager/check/travelSearch', $data);
        $this->load->view('manager/check/travelList', $data);
        $this->load->view('common/footer');
    }

    // 普通报销情况列表
    public function borrowManage() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_borrow->getNumManage($array);
        $offset = $this->uri->segment(4);
        $data['baoxiao'] = $this->getBorrowMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/borrowManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '借款审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '1';
        //$data['year'] = date("Y");
        //$data['month'] = date("m");

        $this->load->view('common/header3');
        $this->load->view('manager/check/borrowSearch', $data);
        $this->load->view('manager/check/borrowList', $data);
        $this->load->view('common/footer');
    }

    // 普通报销情况列表
    public function borrowBaoxiao() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId, 'state' => '5');
        $num = $this->m_borrow->getNumManage_2($array);
        $offset = $this->uri->segment(4);
        $data['baoxiao'] = $this->getBorrowMange_2($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/borrowBaoxiao';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '借款报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '1';


        $this->load->view('common/header3');
        $this->load->view('manager/check/borrowBaoxiaoSearch', $data);
        $this->load->view('manager/check/borrowList_2', $data);
        $this->load->view('common/footer');
    }

    // 普通报销情况列表
    public function laowuManage() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_laowu->getNumManage($array);
        $offset = $this->uri->segment(4);
        $data['laowu'] = $this->getLaowuMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/laowuManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '劳务费/专家费审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getTypeLaowu();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '4';
        $this->load->view('common/header3');
        $this->load->view('manager/check/laowuSearch', $data);
        $this->load->view('manager/check/laowuList', $data);
        $this->load->view('common/footer');
    }

    //报销详细信息页面
    public function baoxiaoDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['baoxiao'] = $this->getBaoxiao($id);
        $state = $data['baoxiao']->state;

        if ($state == '4') {
            $data['stateShow'] = '审核通过，收到发票';

        } elseif ($state == '5') {
            $data['stateShow'] = '已经报销';
        } elseif ($state == '3' or $state == '2') {
            $data['stateShow'] = '用户已经提交,请您审核!';
        }
        $this->load->view('common/header3');
        $this->load->view('manager/check/baoxiaoDetail', $data);
        $this->load->view('manager/check/check', $data);
        $this->load->view('common/footer');
    }

    //报销详细信息页面
    public function travelDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['travel'] = $this->getTravel($id);
        $state = $data['travel']->state;

        if ($state == '4') {
            $data['stateShow'] = '审核通过，收到发票!';
        } elseif ($state == '3' or $state == '2') {
            $data['stateShow'] = '未审核，请您审核!';
        } elseif ($state == '5') {
            $data['stateShow'] = '已完成报销.';
        }
        $this->load->view('common/header3');
        $this->load->view('manager/check/travelDetail', $data);
        $this->load->view('manager/check/checkTravel', $data);
        $this->load->view('common/footer');
    }

    //报销详细信息页面
    public function borrowDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['borrow'] = $this->getBorrow($id);
        $state = $data['borrow']->state;


        if ($state == '4') {
            $data['stateShow'] = '审核通过';

        } elseif ($state == '3' or $state == '2') {
            $data['stateShow'] = '未审核，请您审核!';
        }elseif($state=='5'){
            $date['stateShow']='已完成审核.';
        }
        $this->load->view('common/header3');
        $this->load->view('manager/check/borrowDetail', $data);
        $this->load->view('manager/check/checkBorrow', $data);
        $this->load->view('common/footer');
    }

    //报销详细信息页面
    public function laowuDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['laowu'] = $this->getLaowu($id);
        $state = $data['laowu']->state;
        $money = $data['laowu']->money;
        $tax = $data['laowu']->tax;
        $data['money1'] = $money - $tax;
        if ($state == '4') {
            $data['stateShow'] = '收到发票';
            /* $this->load->view('common/header3');
              $this->load->view('manager/check/laowuDetail', $data);
              $this->load->view('manager/check/checkDetailLaowu', $data);
              $this->load->view('common/footer'); */
        } elseif ($state == '3' or $state == '2') {
            $data['stateShow'] = '未审核';
        } elseif ($state == '5') {
            $data['stateShow'] = '劳务费/专家咨询费申请成功!';
        }

        $this->load->view('common/header3');
        $this->load->view('manager/check/laowuDetail', $data);
        $this->load->view('manager/check/checkLaowu', $data);
        $this->load->view('common/footer');
    }
    //借款报销详细信息页面
    public function borrowBaoxiaoDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['borrow'] = $this->getBorrow($id);
        if (strcmp($data['borrow']->state2, '1') == 0) {
            $show = 'display';$show2 = 'display:none';
        } elseif (strcmp($data['borrow']->state2, '2') == 0) {
            $show = 'display';$show2 = 'display';
        } elseif (strcmp($data['borrow']->state2, '3') == 0) {
            $show = 'display:none';$show2 = 'display';
        } elseif (strcmp($data['borrow']->state2, '4') == 0) {
            $show = 'display:none';$show2 = 'display';
        } elseif (strcmp($data['borrow']->state2, '5') == 0) {
            $show = 'display:none';$show2 = 'display';
        } else {
            echo "状态有误";
        }


        $data['show'] = $show;
        $data['show2'] = $show2;
        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/baoxiaoDetail', $data);
        $this->load->view('common/footer');
    }
    //完成详细信息页面
    public function completeDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['baoxiao'] = $this->getBaoxiao($id);
        $state = $data['baoxiao']->state;

        if ($state == '5') {
            $data['stateShow'] = '报销完成，请查收！';
            //echo $data['stateShow'] . $data['stateShow'] . date('YmdHis');
            $this->load->view('common/header3');
            $this->load->view('manager/check/baoxiaoDetail', $data);
            $this->load->view('manager/check/completeDetail', $data);
            $this->load->view('common/footer');
        } elseif ($state == '4' or $state == '3') {
            $this->load->view('common/header3');
            $this->load->view('manager/check/baoxiaoDetail', $data);
            $this->load->view('manager/check/complete', $data);
            $this->load->view('common/footer');
        }
    }

//审核编辑
    public function checkEditBaoxiao() {
        $id = $this->uri->segment(4);
        $data['baoxiao'] = $this->getBaoxiao($id);
        $state = $data['baoxiao']->state;

        $this->load->view('common/header3');
        $this->load->view('manager/check/baoxiaoDetail', $data);
        $this->load->view('manager/check/check', $data);
        $this->load->view('common/footer');
    }

    //审核编辑
    public function checkEditTravel() {
        $id = $this->uri->segment(4);
        $data['baoxiao'] = $this->getTravel($id);
        $state = $data['baoxiao']->state;

        $this->load->view('common/header3');
        $this->load->view('manager/check/travelDetail', $data);
        $this->load->view('manager/check/check', $data);
        $this->load->view('common/footer');
    }

    // 报销变换显示
    function changeOption() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $s = $this->m_baoxiao->getState1($state);
        if (strcmp($unit, 'all') == 0) {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId);
                        } else {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'state' => $s);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'month' => $month);
                        } else {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'state' => $s, 'month' => $month);
                        }
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'year' => $year);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'year' => $year);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'year' => $year);
                        } else {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'state' => $s, 'year' => $year);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'year' => $year);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('baoxiaoType' => $type, 's_id' => $subjectId, 'month' => $month, 'year' => $year);
                        } else {
                            $array = array('baoxiaoType' => $type, 's_id' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year);
                        }
                    }
                }
            }
        } else {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'subjectUnit' => $unit);
                        } else {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'state' => $s, 'subjectUnit' => $unit);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'month' => $month, 'subjectUnit' => $unit);
                        } else {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'state' => $s, 'month' => $month, 'subjectUnit' => $unit);
                        }
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('baoxiaoType' => $type, 'inherit' => $subjectId, 'state' => $s, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('baoxiaoType' => $type, 's_id' => $subjectId, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('baoxiaoType' => $type, 's_id' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    }
                }
            }
        }
        $type = $this->uri->segment(4);
        if ($type == '1') {
            $num = $this->m_baoxiao->getNumManage($array);
            $offset = $this->uri->segment(5);
            $data['baoxiao'] = $this->getBaoxiaoMange_1($array, $offset);
            /*
            $config['base_url'] = base_url() . 'index.php/manager/check/baoxiaoManage';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            */
            $data['title'] = '普通报销审核列表';
            $data['num'] = $num;
            $data['searchType'] = $this->getType();
            $data['Year'] = $this->getSearchYear();
            $data['Month'] = $this->getSearchMonth();
            $data['State'] = $this->getState();
            $data['Unit'] = $this->getUnit();
            $this->load->view('manager/search/baoxiaoList', $data);
        } elseif ($type == '4') {
            $num = $this->m_laowu->getNumManage($array);
            $offset = $this->uri->segment(5);
            $data['laowu'] = $this->getLaowuMange($array, $offset);
            $config['base_url'] = base_url() . 'index.php/manager/check/laowuManage';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();
            $data['title'] = '劳务费/专家费审核列表';
            $data['num'] = $num;
            $data['searchType'] = $this->getTypeLaowu();
            $data['Year'] = $this->getSearchYear();
            $data['Month'] = $this->getSearchMonth();
            $data['State'] = $this->getState();
            $data['Unit'] = $this->getUnit();
            $data['type1'] = '4';
            $data['year'] = date("Y");
            $data['month'] = date("m");
            $data['state'] = '已提交';

            $this->load->view('manager/check/laowuList', $data);
            $this->load->view('common/footer');
        }
    }

    // 报销变换显示
    function changeOptionTravel() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $s = $this->m_baoxiao->getState1($state);
        if (strcmp($unit, 'all') == 0) {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'month' => $month);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s, 'month' => $month);
                        }
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'year' => $year);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'year' => $year);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'year' => $year);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s, 'year' => $year);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'year' => $year);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year);
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
        } else {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'subjectUnit' => $unit);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s, 'subjectUnit' => $unit);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'month' => $month, 'subjectUnit' => $unit);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s, 'month' => $month, 'subjectUnit' => $unit);
                        }
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 's_id' => $subjectId, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('type' => $type, 's_id' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    }
                }
            }
        }
        $num = $this->m_travel->getNumManage($array);
        $offset = $this->uri->segment(4);
        $data['baoxiao'] = $this->getTravelMange_1($array, $offset);
        /*
        $config['base_url'] = base_url() . 'index.php/manager/check/travelManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        */
        $data['title'] = '差旅报销审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getTypeTravel();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '2';


        $this->load->view('manager/search/travelList', $data);
        $this->load->view('common/footer');
    }

    // 报销变换显示
    function changeOptionBorrow() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $s = $this->m_baoxiao->getState1($state);
        if (strcmp($unit, 'all') == 0) {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => $s);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'month' => $month);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => $s, 'month' => $month);
                        }
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'year' => $year);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'year' => $year);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'year' => $year);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => $s, 'year' => $year);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'year' => $year);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 's_id' => $subjectId, 'month' => $month, 'year' => $year);
                        } else {
                            $array = array('moneyType' => $type, 's_id' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year);
                        }
                    }
                }
            }
        } else {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'subjectUnit' => $unit);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => $s, 'subjectUnit' => $unit);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'month' => $month, 'subjectUnit' => $unit);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => $s, 'month' => $month, 'subjectUnit' => $unit);
                        }
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => $s, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 's_id' => $subjectId, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('moneyType' => $type, 's_id' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    }
                }
            }
        }

        $num = $this->m_borrow->getNumManage($array);
        $offset = $this->uri->segment(5);
        $data['baoxiao'] = $this->getBorrowMange_1($array, $offset);

        /*$config['base_url'] = base_url() . 'index.php/manager/check/borrowManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        */
        $data['title'] = '借款审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '1';

        $data['state'] = '已提交';

        $this->load->view('manager/search/borrowList', $data);
        $this->load->view('common/footer');

    }
// 借款报销变换显示
    function changeOptionBorrowBaoxiao() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $s = $this->m_baoxiao->getState1($state);
        if (strcmp($unit, 'all') == 0) {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId,'state' => 5);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => 5,'state2' => $s);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type,'state' => 5, 'inherit' => $subjectId);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => 5,'state2' => $s);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId,'state' => 5, 'month' => $month);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => 5, 'state2' => $s,'month' => $month);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId,'state' => 5, 'month' => $month);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => 5,'state2' => $s ,'month' => $month);
                        }
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId,'state' => 5, 'year' => $year);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => 5,'state2' => $s ,'year' => $year);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId,'state' => 5, 'year' => $year);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => 5, 'state2' => $s,'year' => $year);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month,'state' => 5, 'year' => $year);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => 5,'state2' => $s ,'month' => $month, 'year' => $year);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 's_id' => $subjectId, 'state' => 5,'month' => $month, 'year' => $year);
                        } else {
                            $array = array('moneyType' => $type, 's_id' => $subjectId, 'state' => 5,'state2' => $s ,'month' => $month, 'year' => $year);
                        }
                    }
                }
            }
        } else {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'state' => 5,'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => 5, 'state2' => $s,'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId,'state' => 5, 'subjectUnit' => $unit);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => 5, 'state2' => $s,'subjectUnit' => $unit);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'state' => 5,'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => 5,'state2' => $s, 'month' => $month, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId,'state' => 5, 'month' => $month, 'subjectUnit' => $unit);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => 5, 'state2' => $s,'month' => $month, 'subjectUnit' => $unit);
                        }
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'year' => $year, 'state' => 5,'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => 5, 'state2' => $s,'year' => $year, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId,'state' => 5, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('moneyType' => $type, 'inherit' => $subjectId, 'state' => 5, 'state2' => $s,'year' => $year, 'subjectUnit' => $unit);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month,'state' => 5, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => 5, 'state2' => $s,'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('moneyType' => $type, 's_id' => $subjectId,'state' => 5, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('moneyType' => $type, 's_id' => $subjectId, 'state' => 5,'state2' => $s, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    }
                }
            }
        }

        $num = $this->m_borrow->getNumManage($array);
        $offset = $this->uri->segment(5);
        $data['baoxiao'] = $this->getBorrowMange_1($array, $offset);

        $data['title'] = '借款报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '1';

        $data['state'] = '已提交';

        $this->load->view('manager/search/borrowList_2', $data);
        $this->load->view('common/footer');

    }
    // 报销变换显示
    function changeOptionLaowu() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $s = $this->m_baoxiao->getState1($state);
        if (strcmp($unit, 'all') == 0) {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'month' => $month);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s, 'month' => $month);
                        }
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'year' => $year);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'year' => $year);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'year' => $year);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s, 'year' => $year);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'year' => $year);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year);
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
        } else {
            if (strcmp($year, 'all') == 0) {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'subjectUnit' => $unit);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s, 'subjectUnit' => $unit);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'month' => $month, 'subjectUnit' => $unit);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s, 'month' => $month, 'subjectUnit' => $unit);
                        }
                    }
                }
            } else {
                if (strcmp($month, 'all') == 0) {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('type' => $type, 'inherit' => $subjectId, 'state' => $s, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    }
                } else {
                    if (strcmp($type, 'all') == 0) {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('inherit' => $subjectId, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('inherit' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    } else {
                        if (strcmp($state, 'all') == 0) {
                            $array = array('type' => $type, 's_id' => $subjectId, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        } else {
                            $array = array('type' => $type, 's_id' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year, 'subjectUnit' => $unit);
                        }
                    }
                }
            }
        }
        $type = $this->uri->segment(4);
        $num = $this->m_laowu->getNumManage($array);
        $offset = $this->uri->segment(5);
        $data['laowu'] = $this->getLaowuMange_1($array, $offset);
        /*
         $config['base_url'] = base_url() . 'index.php/manager/check/laowuManage';
         $config['total_rows'] = $num;
         $config['uri_segment'] = 4;
         $this->pagination->initialize($config);
         $data['page'] = $this->pagination->create_links();
        */
        $data['title'] = '劳务费/专家费审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getTypeLaowu();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '4';
        $data['year'] = date("Y");
        $data['month'] = date("m");
        $data['state'] = '已提交';
        $this->load->view('manager/search/laowuList', $data);
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

    public function getBaoxiaoSearch($array) {

        $data = array();
        $result = $this->m_baoxiao->getOneInfo_search($array);
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getTravel($id) {
        $data = array();
        $result = $this->m_travel->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getBorrow($id) {
        $data = array();
        $result = $this->m_borrow->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    public function getLaowu($id) {
        $data = array();
        $result = $this->m_laowu->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

// 审核信息
    public function checkBaoxiao() {
        $this->timeOut();
        $bao_id = $this->uri->segment(4);
        $type = $this->uri->segment(5);
        if ($type == '1') {
            $this->m_baoxiao->check($bao_id);
        } elseif ($type == '2') {
            $this->m_baoxiao->check2($bao_id);
        }

        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_baoxiao->getNumManage($array);
        $offset = $this->uri->segment(6);
        $data['baoxiao'] = $this->getBaoxiaoMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/baoxiaoManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '普通报销审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        //$data['year'] = date("Y");
        //$data['month'] = date("m");
        $this->load->view('common/header3');
        $this->load->view('manager/check/baoxiaoSearch', $data);
        $this->load->view('manager/check/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

// 审核信息
    public function checkTravel() {
        $this->timeOut();
        $t_id = $this->uri->segment(4);
        $type = $this->uri->segment(5);
        if ($type == '1') {
            $this->m_travel->check($t_id);
        } elseif ($type == '2') {
            $this->m_travel->check2($t_id);
        }

        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_travel->getNumManage($array);
        $offset = $this->uri->segment(6);
        $data['baoxiao'] = $this->getTravelMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/travelManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '差旅报销审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getTypeTravel();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '2';


        $this->load->view('common/header3');
        $this->load->view('manager/check/travelSearch', $data);
        $this->load->view('manager/check/travelList', $data);
        $this->load->view('common/footer');
    }

// 审核信息
    public function checkBorrow() {
        $this->timeOut();
        $bao_id = $this->uri->segment(4);
        $type = $this->uri->segment(5);
        if ($type == '1') {
            $this->m_borrow->check($bao_id);
        } elseif ($type == '2') {
            $this->m_borrow->check2($bao_id);
        }

        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_borrow->getNumManage($array);
        $offset = $this->uri->segment(6);
        $data['baoxiao'] = $this->getBorrowMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/borrowManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '汇款/支票审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        //$data['year'] = date("Y");
        //$data['month'] = date("m");
        $this->load->view('common/header3');
        $this->load->view('manager/check/borrowSearch', $data);
        $this->load->view('manager/check/borrowList', $data);
        $this->load->view('common/footer');
    }

// 审核信息
    public function checkLaowu() {
        $this->timeOut();
        $laowu_id = $this->uri->segment(4);
        $type = $this->uri->segment(5);
        if ($type == '1') {
            $this->m_laowu->check($laowu_id);
        } elseif ($type == '2') {
            $this->m_laowu->check2($laowu_id);
        }

        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_laowu->getNumManage($array);
        $offset = $this->uri->segment(6);
        $data['laowu'] = $this->getLaowuMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/laowuList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '劳务费/专家费审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        //$data['year'] = date("Y");
        //$data['month'] = date("m");
        $this->load->view('common/header3');
        $this->load->view('manager/check/laowuSearch', $data);
        $this->load->view('manager/check/laowuList', $data);
        $this->load->view('common/footer');
    }

    // 报销信息
    public function update() {
        $this->timeOut();
        $bao_id = $this->uri->segment(4);
        $state1 = $this->uri->segment(5);
        $type = $this->uri->segment(6);
        if ($type == '1') {
            $array1 = array('state' => $state1);
        } elseif ($type == '2') {
            $array1 = array('state' => $state1, 'date4' => date("Y-m-d"));
        }
        $this->m_baoxiao->update($bao_id, $array1);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_baoxiao->getNumManage($array);
        $offset = $this->uri->segment(7);
        $data['baoxiao'] = $this->getBaoxiaoMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/baoxiao/baoxiaoList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '普通报销审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();

        $this->load->view('common/header3');
        $this->load->view('manager/check/baoxiaoSearch', $data);
        $this->load->view('manager/check/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

    public function updateTravel() {
        $this->timeOut();
        $t_id = $this->uri->segment(4);
        $state1 = $this->uri->segment(5);
        $type = $this->uri->segment(6);
        if ($type == '1') {
            $array1 = array('state' => $state1);
        } elseif ($type == '2') {
            $array1 = array('state' => $state1, 'date4' => date("Y-m-d"));
        }
        $this->m_travel->update($t_id, $array1);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_borrow->getNumManage($array);
        $offset = $this->uri->segment(7);
        $data['baoxiao'] = $this->getTravelMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/travelManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '差旅报销审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();

        $this->load->view('common/header3');
        $this->load->view('manager/check/travelSearch', $data);
        $this->load->view('manager/check/travelList', $data);
        $this->load->view('common/footer');
    }

    public function updateBorrow() {
        $this->timeOut();
        $b_id = $this->uri->segment(4);
        $state1 = $this->uri->segment(5);
        $type = $this->uri->segment(6);
        if ($type == '1') {
            $array1 = array('state' => $state1);
        } elseif ($type == '2') {
            $array1 = array('state' => $state1, 'date4' => date("Y-m-d"));
        }
        $this->m_borrow->update($b_id, $array1);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_borrow->getNumManage($array);
        $offset = $this->uri->segment(7);
        $data['baoxiao'] = $this->getBorrowMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/borrowManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '借款审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();

        $this->load->view('common/header3');
        $this->load->view('manager/check/borrowSearch', $data);
        $this->load->view('manager/check/borrowList', $data);
        $this->load->view('common/footer');
    }

    public function updateBorrow_2() {
        $this->timeOut();
        $b_id = $this->uri->segment(4);
        $state1 = $this->uri->segment(5);
        $type = $this->uri->segment(6);
        if ($type == '1') {
            $array1 = array('state2' => $state1);
        } elseif ($type == '2') {
            $array1 = array('state2' => $state1, 'date4' => date("Y-m-d"));
        }
        $this->m_borrow->update($b_id, $array1);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId, 'state' => '5');
        $num = $this->m_borrow->getNumManage_2($array);
        $offset = $this->uri->segment(7);
        $data['baoxiao'] = $this->getBorrowMange_2($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/check/borrowBaoxiao';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '借款报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();
        $data['type1'] = '1';
        $data['year'] = date("Y");
        $data['month'] = date("m");

        $this->load->view('common/header3');
        $this->load->view('manager/check/borrowSearch', $data);
        $this->load->view('manager/check/borrowList_2', $data);
        $this->load->view('common/footer');
    }

    public function updateLaowu() {
        $this->timeOut();
        $bao_id = $this->uri->segment(4);
        $state1 = $this->uri->segment(5);
        $type = $this->uri->segment(6);
        if ($type == '1') {
            $array1 = array('state' => $state1);
        } elseif ($type == '2') {
            $array1 = array('state' => $state1, 'date4' => date("Y-m-d"));
        }
        $this->m_laowu->update($bao_id, $array1);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId);
        $num = $this->m_laowu->getNumManage($array);
        $offset = $this->uri->segment(7);
        $data['laowu'] = $this->getLaowuMange($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/Laowu/laowuList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '劳务费/专家咨询费审核列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();

        $this->load->view('common/header3');
        $this->load->view('manager/check/laowuSearch', $data);
        $this->load->view('manager/check/laowuList', $data);
        $this->load->view('common/footer');
    }

    //按报销按照金额,报销代码查询
    /* public function baoxiaoSearch() {
         $this->timeOut();
         $searchType1 = $_POST['searchType'];
         $searchTerm = trim($_POST['searchTerm']);
         if (!get_magic_quotes_gpc()) {
             $searchType1 = addslashes($searchType1);
             $searchTerm = addslashes($searchTerm);
         }
         if ($searchType1 == '1') {
             $array = array('code' => $searchTerm);
         } elseif ($searchType1 == '2') {
             $array = array('money' => $searchTerm);
         } else {
             $message = 's_id有误';
             show_error($message);
         }
         $data['searchType'] = $this->getType();
         $data['Year'] = $this->getSearchYear();
         $data['Month'] = $this->getSearchMonth();
         $data['State'] = $this->getState();
         $data['Unit'] = $this->getUnit();
         $num = $this->m_baoxiao->getNum($array);
         $offset = $this->uri->segment(4);
         $data['baoxiao'] = $this->getBaoxiaoMange($array, $offset);
         $config['base_url'] = base_url() . 'index.php/manager/check/baoxiaoManage';
         $config['total_rows'] = $num;
         $config['uri_segment'] = 4;
         $this->pagination->initialize($config);
         $data['page'] = $this->pagination->create_links();
         $data['title'] = '普通报销审核列表';
         $data['num'] = $num;
         $data['type1'] = '1';
         $this->load->view('common/header3');
         $this->load->view('manager/check/baoxiaoSearch', $data);
         $this->load->view('manager/check/baoxiaoList', $data);
         $this->load->view('common/footer');
     }
 */
    //按报销按照金额,报销代码查询
    public function baoxiaoSearch() {
        $this->timeOut();
        $searchType1 = $_POST['searchType'];
        $searchTerm = trim($_POST['searchTerm']);
        if (!get_magic_quotes_gpc()) {
            $searchType1 = addslashes($searchType1);
            $searchTerm = addslashes($searchTerm);
        }
        $array1=array('code' => $searchTerm);
        $array2 = array('money' => $searchTerm);


        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();

        $offset = $this->uri->segment(4);
        $result1 = $this->getBaoxiaoMange($array1, $offset);
        $result2 = $this->getBaoxiaoMange($array2, $offset);
        if($result1==null and $result2 !==null){
            $array=$array2;
            $num = $this->m_baoxiao->getNumManage($array);
            $data['baoxiao']=$result2;
        }elseif($result2==null and $result1 !==null){
            $array=$array1;
            $num = $this->m_baoxiao->getNumManage($array);
            $data['baoxiao']=$result1;
        }else{
            echo "查询结果不存在，请检查输入内容！";
        }

        $config['base_url'] = base_url() . 'index.php/manager/check/baoxiaoManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '普通报销审核列表';
        $data['num'] = $num;
        $data['type1'] = '1';
        $this->load->view('common/header3');
        $this->load->view('manager/check/baoxiaoSearch', $data);
        $this->load->view('manager/check/baoxiaoList', $data);
        $this->load->view('common/footer');
    }
    //按差旅报销按照金额,报销代码查询--差旅查询
    public function travelSearch() {
        $this->timeOut();
        $searchType1 = $_POST['searchType'];
        $searchTerm = trim($_POST['searchTerm']);
        if (!get_magic_quotes_gpc()) {
            $searchType1 = addslashes($searchType1);
            $searchTerm = addslashes($searchTerm);
        }
        $array1=array('code' => $searchTerm);
        $array2 = array('totalMoney' => $searchTerm);


        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();

        $offset = $this->uri->segment(4);
        $result1 = $this->getTravelMange($array1, $offset);
        $result2 = $this->getTravelMange($array2, $offset);
        if($result1==null and $result2 !==null){
            $array=$array2;
            $num = $this->m_travel->getNumManage($array);
            $data['baoxiao']=$result2;
        }elseif($result2==null and $result1 !==null){
            $array=$array1;
            $num = $this->m_travel->getNumManage($array);
            $data['baoxiao']=$result1;
        }else{
            echo "查询结果不存在，请检查输入内容！";
        }

        $config['base_url'] = base_url() . 'index.php/manager/check/travelManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '差旅报销审核列表';
        $data['num'] = $num;
        $data['type1'] = '1';
        $this->load->view('common/header3');
        $this->load->view('manager/check/travelSearch', $data);
        $this->load->view('manager/check/travelList', $data);
        $this->load->view('common/footer');
    }
    //借款查询
    public function borrowSearch() {
        $this->timeOut();
        $searchType1 = $_POST['searchType'];
        $searchTerm = trim($_POST['searchTerm']);
        if (!get_magic_quotes_gpc()) {
            $searchType1 = addslashes($searchType1);
            $searchTerm = addslashes($searchTerm);
        }
        $array1=array('code' => $searchTerm);
        $array2 = array('money' => $searchTerm);


        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();

        $offset = $this->uri->segment(4);
        $result1 = $this->getBorrowMange($array1, $offset);
        $result2 = $this->getBorrowMange($array2, $offset);
        if($result1==null and $result2 !==null){
            $array=$array2;
            $num = $this->m_borrow->getNumManage($array);
            $data['baoxiao']=$result2;
        }elseif($result2==null and $result1 !==null){
            $array=$array1;
            $num = $this->m_borrow->getNumManage($array);
            $data['baoxiao']=$result1;
        }else{
            echo "查询结果不存在，请检查输入内容！";
        }

        $config['base_url'] = base_url() . 'index.php/manager/check/borrowManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '借款审核列表';
        $data['num'] = $num;
        $data['type1'] = '1';
        $this->load->view('common/header3');
        $this->load->view('manager/check/borrowSearch', $data);
        $this->load->view('manager/check/borrowList', $data);
        $this->load->view('common/footer');
    }
    //借款报销查询
    public function borrowBaoxiaoSearch() {
        $this->timeOut();
        $searchType1 = $_POST['searchType'];
        $searchTerm = trim($_POST['searchTerm']);
        if (!get_magic_quotes_gpc()) {
            $searchType1 = addslashes($searchType1);
            $searchTerm = addslashes($searchTerm);
        }
        $array1=array('code' => $searchTerm);
        $array2 = array('money' => $searchTerm);


        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();

        $offset = $this->uri->segment(4);
        $result1 = $this->getBorrowMange_2($array1, $offset);
        $result2 = $this->getBorrowMange_2($array2, $offset);
        if($result1==null and $result2 !==null){
            $array=$array2;
            $num = $this->m_borrow->getNumManage_2($array);
            $data['baoxiao']=$result2;
        }elseif($result2==null and $result1 !==null){
            $array=$array1;
            $num = $this->m_borrow->getNumManage_2($array);
            $data['baoxiao']=$result1;
        }else{
            echo "查询结果不存在，请检查输入内容！";
        }

        $config['base_url'] = base_url() . 'index.php/manager/check/borrowBaoxiao';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '借款报销审核列表';
        $data['num'] = $num;
        $data['type1'] = '1';
        $this->load->view('common/header3');
        $this->load->view('manager/check/borrowBaoxiaoSearch', $data);
        $this->load->view('manager/check/borrowList_2', $data);
        $this->load->view('common/footer');
    }
    //劳务费查询
    public function laowuSearch() {
        $this->timeOut();
        $searchType1 = $_POST['searchType'];
        $searchTerm = trim($_POST['searchTerm']);
        if (!get_magic_quotes_gpc()) {
            $searchType1 = addslashes($searchType1);
            $searchTerm = addslashes($searchTerm);
        }
        $array1=array('code' => $searchTerm);
        $array2 = array('money' => $searchTerm);


        $data['searchType'] = $this->getType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $data['Unit'] = $this->getUnit();

        $offset = $this->uri->segment(4);
        $result1 = $this->getlaowuMange($array1, $offset);
        $result2 = $this->getlaowuMange($array2, $offset);
        if($result1==null and $result2 !==null){
            $array=$array2;
            $num = $this->m_laowu->getNumManage($array);
            $data['laowu']=$result2;
        }elseif($result2==null and $result1 !==null){
            $array=$array1;
            $num = $this->m_laowu->getNumManage($array);
            $data['laowu']=$result1;
        }else{
            echo "查询结果不存在，请检查输入内容！";
        }

        $config['base_url'] = base_url() . 'index.php/manager/check/laowuManage';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '劳务费/专家费审核列表';
        $data['num'] = $num;
        $data['type1'] = '1';
        $this->load->view('common/header3');
        $this->load->view('manager/check/laowuSearch', $data);
        $this->load->view('manager/check/laowuList', $data);
        $this->load->view('common/footer');
    }
    // 分页获取报销经费信息
    public function getBaoxiaoMange($array, $offset) {

        $data = array();
        $result = $this->m_baoxiao->getBaoxiaoMange($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('bao_id' => $r->bao_id, 'date' => $r->date, 'code' => $r->code, 'baoxiaoType' => $r->baoxiaoType, 'num' => $r->num, 'money' => $r->money,
                'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit, 'subjectName' => $r->subjectName,
                'inherit' => $r->inherit, 'state' => $this->m_baoxiao->getState($r->state), 'state3' => $this->getState3($r->state),
                'display' => $this->getDisplay($r->state), 'display1' => $this->getDisplay1($r->state), 'stateShow3' => $this->getStateShow3($r->state),
                'state4' => $this->getState4($r->state), 'stateShow4' => $this->getStateShow4($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }
    // 分类别获取报销经费信息--不分页
    public function getBaoxiaoMange_1($array, $offset) {

        $data = array();
        $result = $this->m_baoxiao->getBaoxiaoMange_1($array,$offset);

        foreach ($result as $r) {
            $arr = array('bao_id' => $r->bao_id, 'date' => $r->date, 'code' => $r->code, 'baoxiaoType' => $r->baoxiaoType, 'num' => $r->num, 'money' => $r->money,
                'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit, 'subjectName' => $r->subjectName,
                'inherit' => $r->inherit, 'state' => $this->m_baoxiao->getState($r->state), 'state3' => $this->getState3($r->state),
                'display' => $this->getDisplay($r->state), 'display1' => $this->getDisplay1($r->state), 'stateShow3' => $this->getStateShow3($r->state),
                'state4' => $this->getState4($r->state), 'stateShow4' => $this->getStateShow4($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 分页获取差旅经费信息
    public function getTravelMange($array, $offset) {

        $data = array();
        $result = $this->m_travel->getTravelMange($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('bao_id' => $r->t_id, 'date' => $r->date, 'code' => $r->code, 'baoxiaoType' => $r->type, 'num' => $r->num, 'money' => $r->totalMoney,
                'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit, 'subjectName' => $r->subjectName,
                'inherit' => $r->inherit, 'state' => $this->m_baoxiao->getState($r->state), 'state3' => $this->getState3($r->state),
                'display' => $this->getDisplay($r->state), 'display1' => $this->getDisplay1($r->state), 'stateShow3' => $this->getStateShow3($r->state),
                'state4' => $this->getState4($r->state), 'stateShow4' => $this->getStateShow4($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }
    // 分类别获取差旅经费信息--不分页
    public function getTravelMange_1($array, $offset) {

        $data = array();
        $result = $this->m_travel->getTravelMange_1($array,$offset);

        foreach ($result as $r) {
            $arr = array('bao_id' => $r->t_id, 'date' => $r->date, 'code' => $r->code, 'baoxiaoType' => $r->type, 'num' => $r->num, 'money' => $r->totalMoney,
                'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit, 'subjectName' => $r->subjectName,
                'inherit' => $r->inherit, 'state' => $this->m_baoxiao->getState($r->state), 'state3' => $this->getState3($r->state),
                'display' => $this->getDisplay($r->state), 'display1' => $this->getDisplay1($r->state), 'stateShow3' => $this->getStateShow3($r->state),
                'state4' => $this->getState4($r->state), 'stateShow4' => $this->getStateShow4($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 分页获取借款全部信息
    public function getBorrowMange($array, $offset) {

        $data = array();
        $result = $this->m_borrow->getBorrowMange($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('b_id' => $r->b_id, 'date' => $r->date, 'date5' => $r->date5, 'code' => $r->code, 'type' => $r->type,
                'borrowType' => $r->borrowType,'moneyType' => $r->moneyType, 'money' => $r->money, 'moneyOld' => $r->moneyOld,
                'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit, 'subjectName' => $r->subjectName,
                'inherit' => $r->inherit, 'state' => $this->m_borrow->getState($r->state), 'state2' => $this->m_borrow->getState3($r->state2), 'state3' => $this->getState3($r->state),
                'display' => $this->getDisplay($r->state), 'display1' => $this->getDisplay1($r->state), 'stateShow3' => $this->getStateShow3($r->state),
                'state4' => $this->getState4($r->state), 'stateShow4' => $this->getStateShow4($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取借款分类全部信息--不分页
    public function getBorrowMange_1($array, $offset) {

        $data = array();
        $result = $this->m_borrow->getBorrowMange_1($array,$offset);

        foreach ($result as $r) {
            $arr = array('b_id' => $r->b_id, 'date' => $r->date, 'date5' => $r->date5, 'code' => $r->code, 'type' => $r->type,'moneyType' => $r->moneyType, 'money' => $r->money, 'moneyOld' => $r->moneyOld,
                'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit, 'subjectName' => $r->subjectName,
                'inherit' => $r->inherit, 'state' => $this->m_borrow->getState($r->state), 'state2' => $this->m_borrow->getState3($r->state2), 'state3' => $this->getState3($r->state),
                'display' => $this->getDisplay($r->state), 'display1' => $this->getDisplay1($r->state), 'stateShow3' => $this->getStateShow3($r->state),
                'state4' => $this->getState4($r->state), 'stateShow4' => $this->getStateShow4($r->state),'borrowType' => $r->borrowType,'moneyType' => $r->moneyType,
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 分页借款报销信息
    public function getBorrowMange_2($array, $offset) {

        $data = array();
        $result = $this->m_borrow->getBorrowMange_2($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('b_id' => $r->b_id, 'date' => $r->date, 'date5' => $r->date5, 'code' => $r->code, 'type' => $r->type, 'money' => $r->money, 'moneyType' => $r->moneyType, 'moneyOld' => $r->moneyOld,
                'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit, 'subjectName' => $r->subjectName,
                'inherit' => $r->inherit, 'state' => $this->m_borrow->getState($r->state), 'state2' => $this->m_borrow->getState($r->state2), 'state3' => $this->getState3($r->state2),
                'display' => $this->getDisplay($r->state2), 'display1' => $this->getDisplay1($r->state2), 'stateShow3' => $this->getStateShow3($r->state2),
                'state4' => $this->getState4($r->state2), 'stateShow4' => $this->getStateShow4($r->state2),
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 分页获取差旅经费信息
    public function getLaowuMange($array, $offset) {

        $data = array();
        $result = $this->m_laowu->getLaowuMange($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('laowu_id' => $r->laowu_id, 'date' => $r->date, 'code' => $r->code, 'type' => $r->type, 'peopleNum' => $r->peopleNum, 'money' => $r->money,
                'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit, 'subjectName' => $r->subjectName,
                'inherit' => $r->inherit, 'state' => $this->m_baoxiao->getState($r->state), 'state3' => $this->getState3($r->state),
                'display' => $this->getDisplay($r->state), 'display1' => $this->getDisplay1($r->state), 'stateShow3' => $this->getStateShow3($r->state),
                'state4' => $this->getState4($r->state), 'stateShow4' => $this->getStateShow4($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }
    // 分类别获取差旅经费信息--不分页
    public function getLaowuMange_1($array, $offset) {

        $data = array();
        $result = $this->m_laowu->getLaowuMange_1($array,$offset);

        foreach ($result as $r) {
            $arr = array('laowu_id' => $r->laowu_id, 'date' => $r->date, 'code' => $r->code, 'type' => $r->type, 'peopleNum' => $r->peopleNum, 'money' => $r->money,
                'subjectNum' => $r->subjectNum, 'subjectUnit' => $r->subjectUnit, 'subjectName' => $r->subjectName,
                'inherit' => $r->inherit, 'state' => $this->m_baoxiao->getState($r->state), 'state3' => $this->getState3($r->state),
                'display' => $this->getDisplay($r->state), 'display1' => $this->getDisplay1($r->state), 'stateShow3' => $this->getStateShow3($r->state),
                'state4' => $this->getState4($r->state), 'stateShow4' => $this->getStateShow4($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }

//获取报销类型
    function getType() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getBaoxiaoType();
        return $data;
    }

    //获取报销类型
    function getTypeTravel() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getTravelType();
        return $data;
    }

    //获取报销类型
    function getTypeLaowu() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getLaowuType();
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
        $data = $this->m_choice->getBaoxiaoState1();
        return $data;
    }

    //获取农大报销单位
    function getUnit() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getBaoxiaoUnit();
        return $data;
    }

    // 获取审核状态
    function getState3($state) {
        switch ($state) {

            case 3:
                return "4";

            case 4:
                return "3";
            case 5:
                return "5";
        }
    }

    // 获取审核状态
    function getStateShow3($state) {
        switch ($state) {

            case 3:
                return "收到";

            case 4:
                return "撤销";
        }
    }

    // 获取审核状态
    function getState4($state) {
        switch ($state) {

            case 3:
                return "3";
            case 4:
                return "5";

            case 5:
                return "4";
        }
    }

    // 获取审核状态
    function getStateShow4($state) {
        switch ($state) {

            case 4:
                return "完成";

            case 5:
                return "撤销";

            case 3:
                return "";
        }
    }

    function getDisplay($state) {
        switch ($state) {
            case 1:
                $data['display'] = 'display:none';
                break;
            case 2:
                $data['display'] = 'display:none';
                break;
            case 3:
                $data['display'] = 'display:none';
                break;
            case 4:
                $data['display'] = 'display';
                break;
            case 5:

                $data['display'] = 'display';
                break;
        }


        return $data['display'];
    }

    function getDisplay1($state) {
        switch ($state) {
            case 1:
                $data['display1'] = 'display';
                break;
            case 2:
                $data['display1'] = 'display';
                break;
            case 3:
                $data['display1'] = 'display';
                break;
            case 4:
                $data['display1'] = 'display';
                break;
            case 5:

                $data['display1'] = 'display:none';
                break;
        }


        return $data['display1'];
    }

    // session中的role不存在的时候退出系统
    function timeOut() {
        $role = $this->session->userdata('roleId');
        if ($role != 2) {
            $this->load->view('logout');
        }
    }

}
?>

