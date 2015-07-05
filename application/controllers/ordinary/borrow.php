<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Borrow extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('Upload');
        $this->load->model('m_borrow');
        $this->load->model('m_money_record');
   
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    // 借款管理页面
    public function borrowList() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_borrow->getNum($array);
        $offset = $this->uri->segment(4);
        $data['borrow'] = $this->getBorrowS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '汇款/支票列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getMoneyType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();

        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/borrowSearch', $data);
        $this->load->view('ordinary/borrow/borrowList', $data);
        $this->load->view('common/footer');
    }

    // 借款报销管理页面
    public function baoxiaoList() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId, 'state' => '5');
        $num = $this->m_borrow->getNum($array);
        $offset = $this->uri->segment(4);
        $data['borrow'] = $this->getBorrowS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '汇款/支票报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getMoneyType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();

        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/baoxiaoSearch_2', $data);
        $this->load->view('ordinary/borrow/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

// 变换显示
    function changeOption() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $s = $this->m_borrow->getState1($state);
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
                        $array = array('moneyType' => $type, 's_id' => $subjectId);
                    } else {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'state' => $s);
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
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'month' => $month);
                    } else {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'state' => $s, 'month' => $month);
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
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'year' => $year);
                    } else {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'state' => $s, 'year' => $year);
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
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'month' => $month, 'year' => $year);
                    } else {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'state' => $s, 'month' => $month, 'year' => $year);
                    }
                }
            }
        }
        $num = $this->m_borrow->getNum($array);
        $offset = $this->uri->segment(4);
        $data['borrow'] = $this->getBorrowS_1($array, $offset);
        /*
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        */
        $data['title'] = '汇款/支票列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getMoneyType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();


        $this->load->view('ordinary/borrow/borrowList_1', $data);
        $this->load->view('common/footer');
    }

    // 变换显示
    function changeOption_2() {
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $s = $this->m_borrow->getState1($state);
        if (strcmp($year, 'all') == 0) {
            if (strcmp($month, 'all') == 0) {
                if (strcmp($type, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('s_id' => $subjectId, 'state' => '5');
                    } else {
                        $array = array('s_id' => $subjectId, 'state2' => $s, 'state' => '5');
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'state' => '5');
                    } else {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'state2' => $s, 'state' => '5');
                    }
                }
            } else {
                if (strcmp($type, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('s_id' => $subjectId, 'month2' => $month, 'state' => '5');
                    } else {
                        $array = array('s_id' => $subjectId, 'state2' => $s, 'month2' => $month, 'state' => '5');
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'month2' => $month, 'state' => '5');
                    } else {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'state2' => $s, 'month2' => $month, 'state' => '5');
                    }
                }
            }
        } else {
            if (strcmp($month, 'all') == 0) {
                if (strcmp($type, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('s_id' => $subjectId, 'year2' => $year, 'state' => '5');
                    } else {
                        $array = array('s_id' => $subjectId, 'state2' => $s, 'year2' => $year, 'state' => '5');
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'year2' => $year, 'state' => '5');
                    } else {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'state2' => $s, 'year2' => $year, 'state' => '5');
                    }
                }
            } else {
                if (strcmp($type, 'all') == 0) {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('s_id' => $subjectId, 'month2' => $month, 'year2' => $year, 'state' => '5');
                    } else {
                        $array = array('s_id' => $subjectId, 'state2' => $s, 'month2' => $month, 'year2' => $year, 'state' => '5');
                    }
                } else {
                    if (strcmp($state, 'all') == 0) {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'month2' => $month, 'year2' => $year, 'state' => '5');
                    } else {
                        $array = array('moneyType' => $type, 's_id' => $subjectId, 'state2' => $s, 'month2' => $month, 'year2' => $year, 'state' => '5');
                    }
                }
            }
        }

        $num = $this->m_borrow->getNum($array);
        $offset = $this->uri->segment(4);
        $data['borrow'] = $this->getBorrowS_1($array, $offset);
        /*
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        */
        $data['title'] = '汇款/支票报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getMoneyType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();


        $this->load->view('ordinary/borrow/baoxiaoList_1', $data);
        $this->load->view('common/footer');
    }

    // 借款信息明细页面
    public function borrowDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['borrow'] = $this->getBorrow($id);
        if (strcmp($data['borrow']->state, '1') == 0) {
            $show = 'display';$show2 = 'display:none';
        } elseif (strcmp($data['borrow']->state, '2') == 0) {
            $show = 'display';$show2 = 'display';
        } elseif (strcmp($data['borrow']->state, '3') == 0) {
            $show = 'display:none';$show2 = 'display';
        } elseif (strcmp($data['borrow']->state, '4') == 0) {
            $show = 'display:none';$show2 = 'display';
        } elseif (strcmp($data['borrow']->state, '5') == 0) {
            $show = 'display:none';$show2 = 'display';
        } else {
            echo "状态有误";
        }


        $data['show'] = $show;
        $data['show2'] = $show2;
        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/borrowDetail', $data);
        $this->load->view('common/footer');
    }

    // 借款报销信息明细页面
    public function baoxiaoDetail() {
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

    //新增页面
    public function borrowNew() {
        $this->timeOut();
        $data = $this->getEmptyData();
        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/borrowEdit', $data);
        $this->load->view('common/footer');
    }

    // 保存汇款/支票信息
    public function borrowSave() {
        $this->timeOut();
        $this->form_validation->set_rules('type', 'Type', 'required');
        $this->form_validation->set_rules('b_name', 'B_name', 'required');
        //$this->form_validation->set_rules('bank_name', 'Bank_name', 'required');
        //$this->form_validation->set_rules('b_num', 'b_num', 'required');

        $this->form_validation->set_rules('money', 'Money', 'required');
        if ($this->form_validation->run() === FALSE) {
            $data['detail'] = "保存报销信息有误！请检查填写的相应信息！";
            $this->load->view('common/header3');
            $this->load->view('common/error_1', $data);
            $this->load->view('common/footer');
        } else {


            $id = $this->m_borrow->saveInfo();
            $mc_id = $this->m_money_record->saveInfo($id);

            /* if (!empty($_FILES['userfile1']['name'])) {
              $username = $this->session->userdata('subjectId');
              $year = date('Ym');
              $name = iconv("utf-8", "gbk", $username);
              $dir = getcwd() . '/upload/' . $year;
              if (!is_dir($dir))
              mkdir($dir, 0777, true);
              $config['allowed_types'] = 'doc|docx|pdf|rar|zip';
              $config['upload_path'] = $dir;
              $config['overwrite'] = true;
              $config['max_size'] = '20480';
              $config['file_name'] = 'remit' . '_' . $name . '_' . $id;
              $this->load->library('upload', $config);
              $this->upload->initialize($config);
              $isUploaded = true;
              if (!$this->upload->do_upload('userfile1')) {
              $data['error'] = '<font color=#ff0000>文件未能成功上传！请检查文件类型和大小。</font>';
              $isUploaded = false;
              echo $data['error'];
              }
              if ($isUploaded) {
              $result_upload = $this->upload->data();
              $upload_name1 = $result_upload['file_name'];
              $upload_name = iconv("gbk", "utf-8", $upload_name1);
              $date = date("Ym");
              // 将文件信息保存至数据库
              $array = array(
              'upload' => $upload_name,
              'upload_date' => $year
              );
              $this->m_borrow->update($id, $array);
              } else {
              echo "保存数据库不成功";
              }
              } else {
              echo "";
              } */

            $data['borrow'] = $this->getBorrow($id);
            $subjectId = $this->session->userdata('subjectId');
            if (strcmp($data['borrow']->borrowType, '仪器设备') == 0 or strcmp($data['borrow']->borrowType, '办公设备') == 0) {
                $money = $data['borrow']->money;
                //第一位代表课题号码；第二位代表类型（1，普通报销2，差旅报销3，借款，4，劳务5，借款报销）；第三位代表报销Id;第四位代表报销类型（1，设备费，2，材料费。。）；第伍位时间
                $code = $subjectId . '3' . $id . '1' . date('Ymd');
                $array = array('equipment' => $money, 'moneyType' => '设备费', 'code' => $code);
                $array1 = array('equipment' => $money, 'moneyType' => '设备费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['borrow']->borrowType, '实验试剂及耗材') == 0 or strcmp($data['borrow']->borrowType, '维修、配件费') == 0) {
                $money = $data['borrow']->money;
                $code = $subjectId . '3' . $id . '2' . date('Ymd');
                $array = array('material' => $money, 'moneyType' => '材料费', 'code' => $code);
                $array1 = array('material' => $money, 'moneyType' => '材料费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['borrow']->borrowType, '测试合成费') == 0 or strcmp($data['borrow']->borrowType, '实验费') == 0) {
                $money = $data['borrow']->money;
                $code = $subjectId . '3' . $id . '3' . date('Ymd');
                $array = array('experiment' => $money, 'moneyType' => '测试化验加工费', 'code' => $code);
                $array1 = array('experiment' => $money, 'moneyType' => '测试化验加工费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['borrow']->borrowType, '电费') == 0 or strcmp($data['borrow']->borrowType, '水费') == 0) {
                $money = $data['borrow']->money;
                $code = $subjectId . '3' . $id . '4' . date('Ymd');
                $array = array('fuel' => $money, 'moneyType' => '燃料动力费', 'code' => $code);
                $array1 = array('fuel' => $money, 'moneyType' => '燃料动力费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['borrow']->borrowType, '国内机票') == 0 or strcmp($data['borrow']->borrowType, '参会费') == 0 or strcmp($data['borrow']->borrowType, '住宿费') == 0) {
                $money = $data['borrow']->money;
                $code = $subjectId . '3' . $id . '5' . date('Ymd');
                $array = array('travel' => $money, 'moneyType' => '差旅费', 'code' => $code);
                $array1 = array('travel' => $money, 'moneyType' => '差旅费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['borrow']->borrowType, '会议费') == 0) {
                $money = $data['borrow']->money;
                $code = $subjectId . '3' . $id . '6' . date('Ymd');
                $array = array('conference' => $money, 'moneyType' => '会议费', 'code' => $code);
                $array1 = array('conference' => $money, 'moneyType' => '会议费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['borrow']->borrowType, '国际机票') == 0) {
                $money = $data['borrow']->money;
                $code = $subjectId . '3' . $id . '7' . date('Ymd');
                $array = array('international' => $money, 'moneyType' => '国际合作交流费', 'code' => $code);
                $array1 = array('international' => $money, 'moneyType' => '国际合作交流费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['borrow']->borrowType, '版面费') == 0 or strcmp($data['borrow']->borrowType, '图书费') == 0 or strcmp($data['borrow']->borrowType, '复印费') == 0 or strcmp($data['borrow']->borrowType, '印刷费') == 0) {
                $money = $data['borrow']->money;
                $code = $subjectId . '3' . $id . '8' . date('Ymd');
                $array = array('information' => $money, 'moneyType' => '出版/文献/信息传播/知识产权事务费', 'code' => $code);
                $array1 = array('information' => $money, 'moneyType' => '出版/文献/信息传播/知识产权事务费', 'money' => $money, 'code' => $code);
            } elseif (strcmp($data['borrow']->borrowType, '其他') == 0 or strcmp($data['borrow']->borrowType, '租赁费') == 0) {
                $money = $data['borrow']->money;
                $code = $subjectId . '3' . $id . '12' . date('Ymd');
                $array = array('other' => $money, 'moneyType' => '其它', 'code' => $code);
                $array1 = array('other' => $money, 'moneyType' => '其它', 'money' => $money, 'code' => $code);
            }
            $this->m_borrow->update($id, $array);
            $this->m_money_record->update($mc_id, $array1);
            if (strcmp($data['borrow']->state, '1') == 0) {
                $show = 'display';$show2 = 'display:none';
            } elseif (strcmp($data['borrow']->state, '2') == 0) {
                $show = 'display'; $show2 = 'display';
            } elseif (strcmp($data['borrow']->state, '3') == 0) {
                $show = 'display:none'; $show2 = 'display';
            }elseif (strcmp($data['borrow']->state, '4') == 0) {
                $show = 'display'; $show2 = 'display';
            } elseif (strcmp($data['borrow']->state, '5') == 0) {
                $show = 'display:none'; $show2 = 'display';
            }
            else {
                echo "状态有误,请联系管理员!";
            }


            $data['show'] = $show;
            $data['show2'] = $show2;

            $this->load->view('common/header3');
            $this->load->view('ordinary/borrow/borrowDetail', $data);
            $this->load->view('common/footer');
        }
    }

// 提交信息
    public function baoxiaoUpdate() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $type = '3';
        $b_id = $this->m_borrow->baoxiao($id);
        $this->m_money_record->updateBorrow($b_id, $type);

        $data['baoxiao'] = $this->getBorrow($b_id);
        $money = $data['baoxiao']->money;
        if (strcmp($data['baoxiao']->moneyType, '设备费') == 0) {
            $array = array('equipment' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '材料费') == 0) {
            $money = $data['baoxiao']->money;
            $array = array('material' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '测试化验加工费') == 0) {
            $array = array('experiment' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '燃料动力费') == 0) {
            $array = array('fuel' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '差旅费') == 0) {
            $array = array('travel' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '会议费') == 0) {
            $array = array('conference' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '国际合作交流费') == 0) {
            $array = array('international' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '出版/文献/信息传播/知识产权事务费') == 0) {
            $array = array('information' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '劳务费') == 0) {

            $array = array('service' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '专家咨询费') == 0) {

            $array = array('consultative' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '其它') == 0) {

            $array = array('other' => $money);
        } elseif (strcmp($data['baoxiao']->moneyType, '其它-用于绩效') == 0) {

            $array = array('ji_xiao' => $money);
        } else {
            echo "类别有误";
        }
        $this->m_borrow->update($b_id, $array);
        $this->m_money_record->update_1($b_id, $type ,$array);

        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId, 'state' => '5');
        $num = $this->m_borrow->getNum($array);
        $offset = $this->uri->segment(5);
        $data['borrow'] = $this->getBorrowS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '汇款/支票报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getMoneyType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();

        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/borrowSearch', $data);
        $this->load->view('ordinary/borrow/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

    // 借款信息编辑页面
    public function borrowEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $m_type = 3;
        $data = $this->getData($id);
        $upload = $data['upload'];
        if ($upload) {
            $data['isuploaded'] = "<br /><font color='ff0000'>(已上传)</font>";
        } else {
            $data['isuploaded'] = "<br /><font color='ff0000'>(未上传任何文件！)</font>";
        }
        $data2['record'] = $this->getMoneyRecord($id, $m_type);
        $mc_id = $data2['record']->mc_id;
        $data['mc_id'] = $mc_id;
        $data['m_type'] = $m_type;
        $data['title'] = '汇款/支票单编辑';
        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/borrowEdit', $data);
        $this->load->view('common/footer');
    }

    // 报销信息编辑页面
    public function baoxiaoEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $m_type = 3;
        $data = $this->getData($id);
        $upload = $data['upload'];
        if ($upload) {
            $data['isuploaded'] = "<br /><font color='ff0000'>(已上传)</font>";
        } else {
            $data['isuploaded'] = "<br /><font color='ff0000'>(未上传任何文件！)</font>";
        }
        $data2['record'] = $this->getMoneyRecord($id, $m_type);
        $mc_id = $data2['record']->mc_id;
        $data['mc_id'] = $mc_id;
        $data['m_type'] = $m_type;
        $data['title'] = '汇款/支票单编辑';
        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/baoxiaoEdit', $data);
        $this->load->view('common/footer');
    }

    // 删除费信息
    public function borrowDelete() {
        $this->timeOut();
        $id = $this->uri->segment('4');
        $type = 1;
        $this->m_borrow->delete($id);
        $this->m_money_record->delete($id, $type);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_borrow->getNum($array);
        $offset = $this->uri->segment(5);
        $data['borrow'] = $this->getBorrowS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getMoneyType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/borrowSearch', $data);
        $this->load->view('ordinary/borrow/borrowList', $data);
        $this->load->view('common/footer');
    }

// 提交信息
    public function submit() {
        $this->timeOut();
        $b_id = $this->uri->segment(4);
        $arraySubmit = array('state' => '3', 'date' => date("Y-m-d"), 'year' => date("Y"), 'month' => date("m"));
        $this->m_borrow->update($b_id, $arraySubmit);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId);
        $num = $this->m_borrow->getNum($array);
        $offset = $this->uri->segment(5);
        $data['borrow'] = $this->getBorrowS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/baoxiao/baoxiaoList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '汇款/支票列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getMoneyType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/borrowSearch', $data);
        $this->load->view('ordinary/borrow/borrowList', $data);
        $this->load->view('common/footer');
    }

// 提交信息
    public function submitBaoxiao() {
        $this->timeOut();
        $b_id = $this->uri->segment(4);
        $arraySubmit = array('state2' => '3', 'date5' => date("Y-m-d"), 'year2' => date("Y"), 'month2' => date("m"));
        $this->m_borrow->update($b_id, $arraySubmit);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('s_id' => $subjectId, 'state' => '5');
        $num = $this->m_borrow->getNum($array);
        $offset = $this->uri->segment(5);
        $data['borrow'] = $this->getBorrowS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '汇款/支票报销列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getMoneyType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();
        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/baoxiaoSearch_2', $data);
        $this->load->view('ordinary/borrow/baoxiaoList', $data);
        $this->load->view('common/footer');
    }

    //按金额查询
    public function borrowSearch() {
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
        $num = $this->m_borrow->getNum($array);
        $offset = $this->uri->segment(4);
        $data['borrow'] = $this->getBorrowS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/ordinary/borrow/borrowList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['title'] = '汇款/支票列表';
        $data['num'] = $num;
        $data['searchType'] = $this->getType();
        $data['moneyType'] = $this->getMoneyType();
        $data['Year'] = $this->getSearchYear();
        $data['Month'] = $this->getSearchMonth();
        $data['State'] = $this->getState();

        $this->load->view('common/header3');
        $this->load->view('ordinary/borrow/borrowSearch', $data);
        $this->load->view('ordinary/borrow/borrowList', $data);
        $this->load->view('common/footer');
    }

    // 获取课题信息
    public function getSubjects() {
        $this->load->model('m_subject');
        $data = array();
        $result = $this->m_subject->getSubject($data);
        return $result;
    }

    public function getBorrow($id) {
        $data = array();
        $result = $this->m_borrow->getOneInfo($id);
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

    // 分页获取全部借款信息
    public function getBorrowS($array, $offset) {

        $data = array();
        $result = $this->m_borrow->getBorrowS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('b_id' => $r->b_id, 'type' => $r->type, 'code' => $r->code, 'borrowType' => $r->borrowType, 'money' => $r->money, 'b_name' => $r->b_name,
                'date' => $r->date, 'date4' => $r->date4, 'moneyType' => $r->moneyType, 'contact' => $r->contact, 'state' => $this->m_borrow->getState($r->state),
                'state2' => $this->m_borrow->getState4($r->state2),'color' => $this->getColor($r->state),'color' => $this->getColor($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 获取分类借款信息--不分页
    public function getBorrowS_1($array, $offset) {

        $data = array();
        $result = $this->m_borrow->getBorrowS_1($array,$offset);

        foreach ($result as $r) {
            $arr = array('b_id' => $r->b_id, 'type' => $r->type, 'code' => $r->code, 'borrowType' => $r->borrowType, 'money' => $r->money, 'b_name' => $r->b_name,
                'date' => $r->date, 'date4' => $r->date4, 'moneyType' => $r->moneyType, 'contact' => $r->contact, 'state' => $this->m_borrow->getState($r->state),
                'state2' => $this->m_borrow->getState4($r->state2),'color' => $this->getColor($r->state),'color' => $this->getColor($r->state),
            );
            array_push($data, $arr);
        }
        return $data;
    }

    // 设置月度经费空值
    function getEmptyData() {
        @ $money->b_id = 0;
        @ $money->mc_id = 0;
        $money->s_id = $this->session->userdata('subjectId');
        $money->title = '汇款/支票申请表';
        $money->b_name = '';
        $money->code = '';
        $money->b_num = '';
        $money->bank_name = '';
        $money->money = '';
        $money->moneyOld = '';
        $money->moneyType = '';
        $money->type = '';
        $money->borrowType = '';
        $money->equipment = '';
        $money->material = '';
        $money->experiment = '';
        $money->fuel = '';
        $money->travel = '';
        $money->conference = '';
        $money->international = '';
        $money->information = '';
        $money->service = '';
        $money->consultative = '';
        $money->other = '';
        $money->ji_xiao = '';
        $money->contact = '';
        $money->phone = '';
        $money->b_remarks = '';
        $money->state = '';
        $money->state2 = '';
        $money->date = '';
        $money->date2 = '';
        $money->date3 = '';
        $money->date4 = '';
        $money->date5 = '';
        $money->date6 = '';
        $money->date7 = '';

        $money->year = '';
        $money->month = '';
        $money->year2 = '';
        $money->month2 = '';
        $money->description = '';
        $money->borrowDetail = '';
        $money->upload_date = '';
        $money->upload = '';
        $money->type1 = $this->getType();
        $money->borrowType1 = $this->getBorrowType();
        return $money;
    }

    //获取已有的填充信息
    function getData($id) {
        $result = $this->m_borrow->getOneInfo($id);
        foreach ($result as $r) {
            $data['b_id'] = $r->b_id;
            $data['code'] = $r->code;
            $data['s_id'] = $this->session->userdata('subjectId');
            $data['type'] = $r->type;
            $data['b_name'] = $r->b_name;
            $data['b_num'] = $r->b_num;
            $data['bank_name'] = $r->bank_name;
            $data['money'] = $r->money;
            $data['moneyOld'] = $r->moneyOld;
            $data['num'] = $r->num;
            $data['moneyType'] = $r->moneyType;
            $data['borrowType'] = $r->borrowType;
            $data['borrowDetail'] = $r->borrowDetail;
            $data['contact'] = $r->contact;
            $data['phone'] = $r->phone;
            $data['b_remarks'] = $r->b_remarks;
            $data['state'] = $r->state;
            $data['state2'] = $r->state2;

            $data['date'] = $r->date;
            $data['date2'] = $r->date2;
            $data['date3'] = $r->date4;
            $data['date4'] = $r->date4;
            $data['date5'] = $r->date5;
            $data['date6'] = $r->date6;
            $data['date7'] = $r->date7;



            $data['description'] = $r->description;
            $data['upload_date'] = $r->upload_date;
            $data['upload'] = $r->upload;
            $data['type1'] = $this->getType();
            $data['borrowType1'] = $this->getBorrowType();
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

//获取报销类型
    function getType() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getType();
        return $data;
    }

    //获取报销类型
    function getMoneyType() {
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
    function getBorrowType() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getBorrowType();
        return $data;
    }

//获取报销类型
    function getState() {
        $this->load->model('m_choice');
        $data = $this->m_choice->getBorrowState();
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