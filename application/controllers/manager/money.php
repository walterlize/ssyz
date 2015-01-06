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
        $this->load->helper('array');
        $this->load->model('m_totalmoney');
        $this->load->model('m_yearmoney');
        $this->load->model('m_monthmoney');
        $this->load->model('m_upload');
        $this->load->library('table');
        $this->load->helper('file');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
        $tmpl = array(
            'table_open' => '<table cellspacing="0" rules="all" border="1" style="width:100%;border-collapse:collapse;font-size:12px">',
            'row_start' => '<tr align="center">',
            'row_alt_start' => '<tr align="center">',
        );

        $this->table->set_template($tmpl);
    }

// 月度经费管理页面
    public function monthList() {
        $this->timeOut();
        $type = $this->uri->segment(4);
        $subjectId = $this->session->userdata('subjectId');
        $array = array('inherit' => $subjectId, 'type' => $type);

        $num = $this->m_monthmoney->getNum($array);
        $offset = $this->uri->segment(5);

        $data['money'] = $this->getMonthMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/money/monthList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('manager/money/monthList', $data);
        $this->load->view('common/footer');
    }

// 子课题年度经费预算页面
    public function yearList() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');

        $this->load->model('m_totalmoney');
        $num = $this->m_totalmoney->getNum(array('subjectId' => $subjectId));
        if ($num == 0) {
            $data['information'] = '管理员还未填写课题预算，请先联系系统管理员。';
            $this->load->view('common/header3');
            $this->load->view('common/information', $data);
            $this->load->view('common/footer');
        } else {


            $type = $this->uri->segment(4);
            $subjectId = $this->session->userdata('subjectId');
            $array = array('inherit' => $subjectId, 'type' => $type);

            $num = $this->m_yearmoney->getNum($array);
            $offset = $this->uri->segment(5);

            $data['money'] = $this->getYearMoneyS($array, $offset);
            $config['base_url'] = base_url() . 'index.php/admin/money/yearList';
            $config['total_rows'] = $num;
            $config['uri_segment'] = 4;
            $this->pagination->initialize($config);
            $data['page'] = $this->pagination->create_links();

            $this->load->view('common/header3');
            $this->load->view('manager/money/yearList', $data);
            $this->load->view('common/footer');
        }
    }

// 月度经费管理页面
    public function monthCheck() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $type = $this->uri->segment(4);
        $array = array('type' => $type, 'inherit' => $subjectId);

        $num = $this->m_monthmoney->getNum($array);

        $offset = $this->uri->segment(5);

        $data['money'] = $this->getMonthMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/money/monthList/2';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('manager/money/monthListCheck', $data);
        $this->load->view('common/footer');
    }

// 月度经费详细信息页面
    public function monthMoneyDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['monthMoney'] = $this->getMonthMoney($id);

        $subjectId = $data['monthMoney']->subjectId;


        $data['upload'] = $this->getUpload($id);

        $data['show1'] = 'display:none';
        $data['show2'] = 'display:none';
        $data['show3'] = 'display';
        switch ($data['monthMoney']->state) {
            case 1:
            case 2:
                $data['show1'] = '';
                break;
            case 3:
                $data['show2'] = '';
                break;
        }
        $state = $data['monthMoney']->state;
        if ($state == 3) {
            $data['show3'] = 'display:none';
        }
        $array = array('year' => $data['monthMoney']->year, 'subjectId' => $data['monthMoney']->subjectId);
        $data['yearMoney'] = $this->getYearMoney1($array);
        $array1 = array('moneyId' => $data['monthMoney']->monthMoneyId, 'subjectId' => $data['monthMoney']->subjectId);




        if ($data['upload']) {


            $data['moneyId'] = $id;
            $data['subjectId'] = $subjectId;
            $data['type'] = 'month';


            $data['show4'] = 'display';
            $data['isuploaded'] = "<br /><font color='ff0000'>(已上传)</font>";
            $result = $this->get_upload_info($array1);
            $year1 = $data['upload']->upload_date;
            $year = date('Ym', strtotime($year1));

            $data['url'] = base_url() . 'index.php/download/downloadfile/' . $year . '/' . $result->type . '_' . $subjectId .
                    '/' . $result->upload_name;
            $data['uploadId'] = $result->uploadId;
        } else {
            $data['show4'] = 'display:none';
            $data['uploadId'] = '';
            $data['type'] = 'month';
            $data['subjectId'] = $subjectId;
            $data['isuploaded'] = "<br /><font color='ff0000'>(还未上传任何文件！)</font>";
        }



        $this->load->view('common/header3');
        $this->load->view('manager/money/monthDetail', $data);
        $this->load->view('manager/upload/upload', $data);
        $this->load->view('common/footer');
    }

// 月度经费详细信息页面
    public function monthMoneyDetailCheck() {
        $this->timeOut();
        $id = $this->uri->segment(4);
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
        /* $array = array('subjectId' => $data['monthMoney']->subjectId);
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
          $data['rate'] = $result['rate']; */

        $this->load->view('common/header3');
        $this->load->view('manager/money/monthDetailCheck', $data);
        $this->load->view('common/footer');
    }

    public function monthMoneyUpdateCheck() {
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
        $this->load->view('manager/money/monthDetailCheck', $data);
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
        $data['yearMoney'] = $this->getYearMoney1($array);

        $this->load->view('common/header3');
        $this->load->view('manager/money/monthDetail', $data);
        $this->load->view('common/footer');
    }

// 年度经费详细信息编辑页面
    public function yearMoneyEdit() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['money'] = $this->getYearMoney($id);
        $data['subject'] = $this->getSubjects2();
        $this->load->view('common/header3');
        $this->load->view('manager/money/yearEdit', $data);
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

        $array = array('year' => $data['monthMoney']->year, 'subjectId' => $data['monthMoney']->subjectId);
        $data['yearMoney'] = $this->getYearMoney1($array);
        $data['subjectUnit'] = $this->session->userdata('subjectUnit');

        $this->load->view('common/header3');
        $this->load->view('manager/money/monthEdit', $data);
        $this->load->view('common/footer');
    }

// 年度经费详细信息新增页面
    public function yearMoneyNew() {
        $this->timeOut();

       @ $money->yearMoneyId = 0;
        $money->type = '';

        $money->year = date('Y');
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
        $money->year = '';
        $data['money'] = $money;
        $subjectId = $this->session->userdata('subjectId');
        $array = array('type' => 'Ordinary', 'inherit' => $subjectId);
        $data['subject'] = $this->getSubjects3($array);
        $data['subjectId'] = $this->session->userdata('subjectId');
        $data['year1'] = date('Y');
        $this->load->view('common/header3');
        $this->load->view('manager/money/yearEdit', $data);
        $this->load->view('common/footer');
    }

// 月度经费详细信息新增页面
    public function monthMoneyNew() {
        $this->timeOut();

        $subjectId = $this->session->userdata('subjectId');
        $data['subjectId'] = $subjectId;
        $data['type'] = 'month';
        $result = $this->getYears();
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
            $data['yearMoney'] = $this->getYearMoney1($array);
            $data['year'] = $data['monthMoney']->year;
            $data['month'] = $data['monthMoney']->month;
            $data['subjectUnit'] = $this->session->userdata('subjectUnit');



            $data['upload'] = $this->getEmptyDataUpload();
            $array = array('subjectId' => $subjectId, 'type' => 'total');
            $this->load->view('common/header3');
            $this->load->view('manager/money/monthEdit', $data);
            // $this->load->view('manager/upload/uploadNew', $data);
            $this->load->view('common/footer');
        }
    }

// 保存年度经费信息
    public function yearMoneySave() {
        $this->timeOut();

        $id = $this->m_yearmoney->saveInfo();

        $data['subject'] = $this->getSubjects2();
        $data['money'] = $this->getYearMoney($id);

        $this->load->view('common/header3');
        $this->load->view('manager/money/yearDetail', $data);
        $this->load->view('common/footer');
    }

// 保存月度经费信息
    public function monthMoneySave() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');
        $data['subjectId'] = $subjectId;
        $data['type'] = 'month';

        $id = $this->m_monthmoney->saveInfo();

        $data['monthMoney'] = $this->getMonthMoney($id);
        $array = array('year' => $data['monthMoney']->year, 'subjectId' => $data['monthMoney']->subjectId);
        $data['yearMoney'] = $this->getYearMoney1($array);

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
        $data['upload'] = $this->getEmptyDataUpload();
        $this->load->view('common/header3');
        $this->load->view('manager/money/monthDetail', $data);
        $this->load->view('manager/upload/uploadNew', $data);
        $this->load->view('common/footer');
    }

// 删除年度经费信息
    public function yearMoneyDelete() {
        $this->timeOut();
        $type = 2;
//$subjectId = $this->session->userdata('subjectId');
        $array = array('type' => $type);
        $this->load->model('m_yearmoney');
        $id = $this->uri->segment(4);
        $this->m_yearmoney->delete($id);

        $num = $this->m_yearmoney->getNum($array);
        $offset = 0;

        $data['money'] = $this->getYearMoneyS($array, $offset);
        $config['base_url'] = base_url() . 'index.php/manager/money/yearList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('manager/money/yearList', $data);
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
        $config['base_url'] = base_url() . 'index.php/manager/money/monthList';
        $config['total_rows'] = $num;
        $config['uri_segment'] = 4;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();

        $this->load->view('common/header3');
        $this->load->view('manager/money/monthList', $data);
        $this->load->view('common/footer');
    }

// 年度经费详细信息页面
    public function yearMoneyDetail() {
        $this->timeOut();
        $id = $this->uri->segment(4);
        $data['money'] = $this->getYearMoney($id);

        $this->load->view('common/header3');
        $this->load->view('manager/money/yearDetail', $data);
        $this->load->view('common/footer');
    }

// 更改月度经费信息
    public function monthMoneyChange() {
        $this->timeOut();
        extract($_REQUEST);
        $subjectId = $this->session->userdata('subjectId');
        $subjectUnit = $this->session->userdata('subjectUnit');
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
        $data['subjectUnit'] = $subjectUnit;
        $data['yearMoney'] = $this->getYearMoney($array1);
        $this->load->view('manager/money/monthEdit', $data);
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
            $array2 = array('year' => $year, 'subjectId' => $subjectId, 'state' => 3, 'type' => 1);
            $data['yearMoney'] = $this->getYearMoney2($array);
            $result = $this->getYears();
            $data['years'] = $result['years'];
            $data['year'] = $year;

            $this->load->model('m_monthMoney');
            $num = $this->m_monthMoney->getNum($array2);
            if ($num == 0) {
                $data['monthMoney'] = $this->getEmptyData();
            } else {
                $array1 = array('subjectId', 'year');
                $data['monthMoney'] = $this->getMonthMoneySum($array2, $array1);
            }

            $result = $this->getYearResult($data['yearMoney'], $data['monthMoney']);
            $data['last'] = $result['last'];
            $data['rate'] = $result['rate'];

            $data['caption'] = $this->getMonthMoneyCaption($array2);




            $id = $data['yearMoney']->yearMoneyId;
            $data['upload'] = $this->getUpload($id);
            $array1 = array('moneyId' => $id, 'subjectId' => $data['monthMoney']->subjectId);

            if ($data['upload']) {


                $data['moneyId'] = $id;
                $data['subjectId'] = $subjectId;
                $data['type'] = 'year';


                $data['show4'] = 'display';
                $data['isuploaded'] = "<br /><font color='ff0000'>(已上传)</font>";
                $result = $this->get_upload_info($array1);
                //$year = date('Ym');
                $year1 = $data['upload']->upload_date;
                $year = date('Ym', strtotime($year1));

                $data['url'] = base_url() . 'index.php/download/downloadfile/' . $year . '/' . $result->type . '_' . $subjectId .
                        '/' . $result->upload_name;
                $data['uploadId'] = $result->uploadId;
            } else {
                $data['show4'] = 'display:none';
                $data['uploadId'] = '';
                $data['type'] = 'year';
                $data['subjectId'] = $subjectId;
                $data['isuploaded'] = "<br /><font color='ff0000'>(还未上传任何文件！)</font>";
            }


            $this->load->view('common/header3');
            $this->load->view('manager/money/yearBudget', $data);
            $this->load->view('manager/upload/uploadYear', $data);
            $this->load->view('common/footer');
        }
    }

    public function projectBudget() {
        $this->timeOut();
        $subjectId = $this->session->userdata('subjectId');

        $this->load->model('m_totalmoney');
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
            $array2 = array('subjectId' => $subjectId, 'state' => 3);
            $data['totalMoney'] = $this->getTotalMoney($subjectId);


            $this->load->model('m_monthMoney');
            $num = $this->m_monthMoney->getNum($array2);
            if ($num == 0) {
                $data['monthMoney'] = $this->getEmptyData();
            } else {
                $data['monthMoney'] = $this->getMonthMoneySum($array2, $array1);
            }

            $result = $this->getTotalResult($data['totalMoney'], $data['monthMoney']);
            $data['last'] = $result['last'];
            $data['rate'] = $result['rate'];
            $data['subjectId'] = $subjectId;




            $data['upload'] = $this->getEmptyDataUpload();


            $array = array('subjectId' => $subjectId, 'type' => 'total');
            $this->load->model('m_upload');
            if ($this->m_upload->get_num($array) > 0) {
                $data['isuploaded'] = "<br /><font color='ff0000'>(已上传)</font>";
                $result = $this->get_upload_info($array);
                $year = date('Ym');

                $data['url'] = base_url() . 'index.php/download/downloadfile/' . $year . '/' . $this->get_name($subjectId) . '_' . $subjectId .
                        '/' . $result->upload_name;
            }
            $this->load->view('common/header3');
            $this->load->view('manager/money/projectBudget', $data);
            $this->load->view('common/footer');
        }
    }

    public function upload() {
        $this->load->helper('url');
        $config['upload_path'] = './upload/' . date('Ym', time()) . '/';
        $config['allowed_types'] = 'doc|docx';
        $config['file_name'] = date('Y_m_d', time()) . '_' . sprintf('%02d', rand(0, 99));
        $config['max_size'] = '500';
        $config['max_filename'] = '0';
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('common/error');
        } else {
            $data = array('upload_data' => $this->upload->data());
            $this->load->view('common/upload_success', $data);
        }
    }

// 获取课题信息
    public function getSubjects() {
        $this->load->model('m_subject');

        $result = $this->m_subject->getSubject();
        return $result;
    }

// 在分配完总课题经费之后获取年度课题信息
    public function getSubjects1() {
        $this->timeOut();
        $this->load->model('m_subject');
//$data = array('type' => 'Subject');
        $result = $this->m_subject->getSubject1();
        return $result;
    }

// 获取课题信息
    public function getSubjects2() {
        $this->timeOut();
        $this->load->model('m_subject');

        $data = array('type' => 'Ordinary');
        $result = $this->m_subject->getSubject($data);
        return $result;
    }

    // 获取课题信息
    public function getSubjects3($array) {
        $this->timeOut();
        $this->load->model('m_subject');


        $result = $this->m_subject->getSubject($array);
        return $result;
    }

// 分页获取全部年度经费信息
    public function getYearMoneyS($array, $offset) {
        $this->timeOut();
        $this->load->model('m_yearMoney');
        $data = array();
        $result = $this->m_yearMoney->getYearMoneyS($array, PER_PAGE, $offset);

        foreach ($result as $r) {
            $arr = array('yearMoneyId' => $r->yearMoneyId, 'year' => $r->year,
                'subjectName' => $r->subjectName, 'subjectUnit' => $r->subjectUnit, 'total' => $r->total,
                'subjectNum' => $r->subjectNum);
            array_push($data, $arr);
        }
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
                'state' => $r->state, 'stateInfo' => $this->m_monthMoney->getState($r->state));
            array_push($data, $arr);
        }
        return $data;
    }

// 获取月度经费信息
    public function getMonthMoney($id) {

        $data = array();
        $result = $this->m_monthmoney->getOneInfo($id);

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
        //$data = '';
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

// 分页获取课题总经费信息
    public function getTotalMoney1($id) {
        $this->timeOut();
        $this->load->model('m_totalmoney');
        $data = array();
        $result = $this->m_totalmoney->getOneInfo1($id);

        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

// 获取年度经费信息
    public function getYearMoney($id) {
        $this->load->model('m_yearMoney');
        $data = array();
        $result = $this->m_yearMoney->getYearMoney1($id);

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

// 获取年度经费信息
    public function getYearMoney2($array) {
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

// 获取本课题已有的年度预算
    public function getYears() {

        $subjectId = $this->session->userdata('subjectId');
        $array = array('subjectId' => $subjectId);
        $data['num'] = $this->m_yearmoney->getNum($array);
        $result = $this->m_yearmoney->getYearMoney2($subjectId);
        $arr = array();
        foreach ($result as $r) {
            array_push($arr, $r->year);
        }
        $data['years'] = $arr;
        return $data;
    }

// 计算年度经费预算结果
    public function getTotalResult($total, $spend) {
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
        @$money->monthMoneyId = 0;
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

// 保存上传文件信息
    function uploadfile() {
        $isUploaded = true;
        $monthMoneyId = $this->uri->segment(4);
        $subjectId = $this->uri->segment(5);
// 判断文件是否已经上传
//$array = array('monthMoneyId' => $monthMoneyId);
        $result = $this->m_monthmoney->getOneInfo($monthMoneyId);

        $file_exist = false;
// $uploadId = '';
        if (isset($result->upload_name)) {
            $monthMoneyId = $result->monthMoneyId;
            $subjectId = $result->subjectId;
            $file_exist = true;
        }

// 设置上传路径
        $year = date('Ym');
// $time = 2012;
        $name = $this->get_name($subjectId);

        $name = iconv("utf-8", "gbk", $name . '_' . $monthMoneyId);
        $dir = getcwd() . './upload/' . $year . '/' . $name . '_' . $subjectId . '/';
        if (!is_dir($dir))
            mkdir($dir, 0777, true);
// 控制上传文件类型

        $config['allowed_types'] = 'doc|docx';
        $config['upload_path'] = $dir;
        $config['overwrite'] = true;
        $config['max_size'] = '102400';
        $config['file_name'] = $name;

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
            $array = array('upload_date' => $date,
                'upload_name' => $upload_name);

            if ($file_exist) {
                $this->m_monthmoney->updateInfo($monthMoneyId, $array);
            } else {
                if ($monthMoneyId) {
                    echo "$monthMoneyId";
                } else {
                    show_404();
                }
                $this->m_monthmoney->updateInfo($monthMoneyId, $array);
            }
        }
        if ($isUploaded) {
            $data['isuploaded'] = "<br />(已上传)";
        }
//$data['upload_id'] = '';
//$data['state'] = '';
// $data['type'] = $this->get_upload_type();

        $data = array('upload_data' => $this->upload->data());
        $this->load->view('common/upload_success', $data);
    }

    /* function get_upload_info($array) {

      $result = $this->m_monthmoney->getMonthMoney($array);
      $data = '';
      foreach ($result as $r) {
      $data = $r;
      }
      return $data;
      }
     */

    function get_upload_info($array) {

        $result = $this->m_upload->get_one_info2($array);
        $data = '';
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
    }

// 获取空的填充信息
    function getEmptyDataUpload() {
        $data['uploadId'] = '';
        $data['moneyId'] = '';
        $data['subjectId'] = '';
        $data['type'] = 'month';
        $data['upload_date'] = '';
        $data['upload_name'] = '';
        return $data;
    }

// 获取课题编号
    function getID() {
        if (!isset($_SESSION['subjectId'])) {
            session_start();
        }
        $id = $_SESSION['subjectId'];
        return $id;
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

// 获取上传类别
    function get_upload_type() {
        $this->load->model('common');
        $data = $this->common->get_upload_type();
        return $data;
    }

    // 工作汇报列表页面
    public function moneyReportList() {
        $this->timeOut();
        $this->load->model('m_moneyreport');
        $type = $this->uri->segment(4);
        $level = $this->uri->segment(5);

        $year = $this->uri->segment(6);
        if (strcmp($year, 'all') == 0) {
            $array = array('type' => $type);
        } else {
            $array = array('year' => $year, 'type' => $type);
        }

        $num = $this->m_workReport->getNum($array, $level);
        $offset = $this->uri->segment(7);

        $data['workreports'] = $this->getReports($array, $offset, $level);
        if ($type == 'WeekReport') {
            $data['title'] = '工作月报列表';
            $config['base_url'] = base_url() . 'index.php/admin/workReport/reportList/WeekReport/1/all';
        } elseif ($type == 'WorkReport') {
            $data['title'] = '工作简报列表';
            $config['base_url'] = base_url() . 'index.php/admin/workReport/reportList/WorkReport/1/all';
        }
        $config['total_rows'] = $num;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['year'] = $year;
        $data['Year'] = $this->get_year();
        $data['Month'] = $this->get_month();

        $data['type'] = $type;
        $this->load->view('common/header3');
        $this->load->view('admin/workReport/search', $data);
        switch ($type) {
            case "WeekReport":
                $this->load->view('admin/workReport/weekReport', $data);
                break;
            case "WorkReport":
                $this->load->view('admin/workReport/workReport', $data);
                break;
        }
        $this->load->view('common/footer');
    }

    function getUpload($id) {
        $this->load->model('m_upload');

        $result = $this->m_upload->get_info1($id);
        $data = array();
        foreach ($result as $r) {
            $data = $r;
        }
        return $data;
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