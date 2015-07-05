<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laowu extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->model('m_laowu');
        $this->load->model('m_money_record');

        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    // 报销列表管理页面
    public function laowuList() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_laowu->getNum($array);
        $offset = $this->uri->segment(4);
        $data['laowu'] = $this->getlaowuS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/laowu/laowuList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $data['title'] = '劳务费/专家咨询费申请列表';
        $data['num'] = $num;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getLaowuType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $this->load->view('common/header3');
        $this->load->view('ordinary/laowu/laowuSearch', $data);
        $this->load->view('ordinary/laowu/laowuList', $data);
        $this->load->view('common/footer');
    }

// 报销信息编辑页面
    public function laowuEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $m_type = 4;
        $data = $this->getData($id);

        /* if ($upload) {
          $data['isuploaded'] = "<br /><font color='ff0000'>(已上传)</font>";
          } else {
          $data['isuploaded'] = "<br /><font color='ff0000'>(未上传任何文件！)</font>";
          } */
        $data2['record'] = $this->getMoneyRecord($id, $m_type);
        $mc_id = $data2['record']->mc_id;
        $data['mc_id'] = $mc_id;
        $data['m_type'] = $m_type;
        $data['title'] = '汇款/支票单编辑';
        $this->load->view('common/header3');
        $this->load->view('ordinary/laowu/laowuEdit', $data);
        $this->load->view('common/footer');
    }

    // 月度经费详细信息页面
    public function laowuDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['laowu'] = $this->getlaowu($id);
        if (strcmp($data['laowu']->state, '1') == 0) {
            $show = 'display';$show2 = 'display:none';
        } elseif (strcmp($data['laowu']->state, '2') == 0) {
            $show = 'display';$show2 = 'display';
        } elseif (strcmp($data['laowu']->state, '3') == 0) {
            $show = 'display:none';$show2 = 'display';
        }elseif (strcmp($data['laowu']->state, '4') == 0) {
            $show = 'display:none';$show2 = 'display';
        }elseif (strcmp($data['laowu']->state, '5') == 0) {
            $show = 'display:none';$show2 = 'display';
        } else {
            echo "状态有误";
        }

        $data['show'] = $show;
        $data['show2'] = $show2;
        $money=$data['laowu']->money;
        $tax=$data['laowu']->tax;
        $data['money1']=$money-$tax;
        $this->load->view('common/header3');
        $this->load->view('ordinary/laowu/laowuDetail', $data);
        $this->load->view('common/footer');
    }

    public function getLaowu($id) {

        $data = array();
        $result = $this->m_laowu->getOneInfo($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    //新增页面
    public function laowuNew() {
        $this->timeOut();
        $data = $this->getEmptyLaowu();
        $this->load->view('common/header3');
        $this->load->view('ordinary/laowu/laowuEdit', $data);
        $this->load->view('common/footer');
    }

// 保存报销信息
    public function laowuSave() {
        $this->timeOut();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('peopleNum', 'PeopleNum', 'required');
        $this->form_validation->set_rules('money', 'Money', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['detail'] = "保存报销信息有误！请检查填写的相应信息！";
            $this->load->view('common/header3');
            $this->load->view('common/error_1', $data);
            $this->load->view('common/footer');
        } else {
            $subjectId = $this->session->userdata('subjectId');
            $id = $this->m_laowu->saveInfo();
            $data['laowu'] = $this->getLaowu($id);
            $mc_id = $this->m_money_record->saveInfo($id);
            if (strcmp($data['laowu']->type, '劳务费') == 0) {
                $money = $data['laowu']->money;
                //第一位代表课题号码；第二位代表类型（1，普通报销2，差旅报销3，借款，4，劳务5，借款报销）；第三位代表报销Id;第四位代表报销类型（1，设备费，2，材料费。。）；第伍位时间
                $code = $subjectId . '4' . $id . '9' . date('Ymd');
                $array = array('service' => $money, 'code' => $code);
                $array1 = array('service' => $money, 'moneyType' => '劳务费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['laowu']->type, '专家咨询费') == 0) {
                $money = $data['laowu']->money;
                 $code = $subjectId . '4' . $id . '10' . date('Ymd');
                $array = array('consultative' => $money, 'code' => $code);
                $array1 = array('consultative' => $money, 'moneyType' => '专家咨询费', 'money' => $money, 'code' => $code);
            }
            $this->m_laowu->update($id, $array);
            $this->m_money_record->update($mc_id, $array1);
            if (strcmp($data['laowu']->state, '1') == 0) {
                $show = 'display';$show2 = 'display:none';
            } elseif (strcmp($data['laowu']->state, '2') == 0) {
                $show = 'display';$show2 = 'display';
            } elseif (strcmp($data['laowu']->state, '3') == 0) {
                $show = 'display:none';$show2 = 'display';
            } else {
                echo "状态有误";
            }


            $data['show'] = $show;
            $data['show2'] = $show2;
            $money=$data['laowu']->money;
            $tax=$data['laowu']->tax;
            $data['money1']=$money-$tax;

            $this->load->view('common/header3');
            $this->load->view('ordinary/laowu/laowuDetail', $data);
            $this->load->view('common/footer');
        }
    }

// 变换显示
    function changeOption() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $s = $this->m_laowu->getState1($state);
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
        $num = $this->m_laowu->getNum($array);
        $offset = $this->uri->segment(4);
        $data['laowu'] = $this->getlaowuS_1($array, $offset);
        $data['title'] = '劳务费/专家咨询费申请列表';
        $data['num'] = $num;
        /*
        $config['base_url'] = base_url() . 'index.php/ordinary/laowu/laowuList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        */
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getLaowuType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();

        $this->load->view('ordinary/laowu/laowuList_1', $data);
        $this->load->view('common/footer');
    }

// 提交信息
    public function submit() {
        $this->timeOut();
        $laowu_id = $this->uri->segment(4);
        $arraySubmit = array('state' => '3', 'date' => date("Y-m-d"), 'year' => date("Y"), 'month' => date("m"));
        $this->m_laowu->update($laowu_id, $arraySubmit);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_laowu->getNum($array);
        $offset = $this->uri->segment(5);
        $data['laowu'] = $this->getlaowuS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/laowu/laowuList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $data['title'] = '劳务费/专家咨询费申请列表';
        $data['num'] = $num;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getLaowuType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $this->load->view('common/header3');
        $this->load->view('ordinary/laowu/laowuSearch', $data);
        $this->load->view('ordinary/laowu/laowuList', $data);
        $this->load->view('common/footer');
    }

// 删除费信息
    public function laowuDelete() {
        $this->timeOut();
        $id = $this->uri->segment('4');
        $type = 1;
        $this->m_laowu->delete($id);
        $this->m_money_record->delete($id, $type);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_laowu->getNum($array);
        $offset = $this->uri->segment(5);
        $data['laowu'] = $this->getlaowuS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/laowu/laowuList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $data['title'] = '劳务费/专家咨询费申请列表';
        $data['num'] = $num;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getLaowuType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $this->load->view('common/header3');
        $this->load->view('ordinary/laowu/laowuSearch', $data);
        $this->load->view('ordinary/laowu/laowuList', $data);
        $this->load->view('common/footer');
    }

    //按金额查询
    public function laowuSearch() {
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
        $num = $this->m_laowu->getNum($array);
        $offset = $this->uri->segment(4);
        $data['laowu'] = $this->getlaowuS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/laowu/laowuList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $data['title'] = '劳务费/专家咨询费申请列表';
        $data['num'] = $num;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getLaowuType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $this->load->view('common/header3');
        $this->load->view('ordinary/laowu/laowuSearch', $data);
        $this->load->view('ordinary/laowu/laowuList', $data);
        $this->load->view('common/footer');
    }

    // 获取课题信息
    public function getSubjects() {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getSubject($data);
        return $result;
    }

    // 分页劳务申报所有信息
    public function getLaowuS($array, $offset) {

        $data = array();
        $result = $this->m_laowu->getLaowuS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('laowu_id' => $r->laowu_id, 'date' => $r->date, 'code' => $r->code, 'peopleNum' => $r->peopleNum,
                'type' => $r->type, 'money1' => ($r->money)-($r->tax),'money' => $r->money, 'tax' => $r->tax,
                'state' => $this->m_laowu->getState($r->state),'color' => $this->getColor($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }
    // 分类劳务申报所有信息--不分页
    public function getLaowuS_1($array, $offset) {
        $data = array();
        $result = $this->m_laowu->getLaowuS_1($array,$offset);
        foreach ($result as $r) {
            $arr = array('laowu_id' => $r->laowu_id, 'date' => $r->date, 'code' => $r->code, 'peopleNum' => $r->peopleNum,
                'type' => $r->type, 'money1' => ($r->money)-($r->tax),'money' => $r->money, 'tax' => $r->tax,
                'state' => $this->m_laowu->getState($r->state),'color' => $this->getColor($r->state),
            );
            array_push($data, $arr);
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

    // 设置报销单空值
    function getEmptyLaowu() {
        @$laowu->laowu_id = 0;
        @$laowu->mc_id = 0;
        $laowu->s_id = $this->session->userdata('subjectId');
        $laowu->title = '劳务费/专家咨询费申请表';
        $laowu->year = '';
        $laowu->code = '';
        $laowu->month = '';
        $laowu->date = '';
        $laowu->type = '';
        $laowu->peopleNum = '';
        $laowu->money = '';
        $laowu->tax = '';
        $laowu->upload = '';
        $laowu->description = '';
        $laowu->remark = '';
        $laowu->state = '';

        $laowu->type1 = $this->getType();
        $laowu->moneyLeft = 0;
        return $laowu;
    }

    //获取已有的填充信息
    function getData($id) {
        $result = $this->m_laowu->getOneInfo($id);
        foreach ($result as $r) {
            $data['laowu_id'] = $r->laowu_id;
            $data['s_id'] = $this->session->userdata('subjectId');
            $data['year'] = $r->year;
            $data['code'] = $r->code;
            $data['month'] = $r->month;
            $data['type'] = $r->type;
            $data['date'] = $r->date;
            $data['date2'] = $r->date2;
            $data['date3'] = $r->date3;
            $data['date4'] = $r->date4;
            $data['date5'] = $r->date5;
            $data['date6'] = $r->date6;
            $data['peopleNum'] = $r->peopleNum;
            $data['money'] = $r->money;
            $data['tax'] = $r->tax;
            $data['money'] = $r->money;
            $data['service'] = $r->service;
            $data['consultative'] = $r->consultative;
            $data['description'] = $r->description;
            $data['remark'] = $r->remark;
            $data['state'] = $r->state;
            $data['type1'] = $this->getType();
        }
        return $data;
    }

//获取职称
    function getType() {
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
    function getLaowuType() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getLaowuType();
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