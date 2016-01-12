<?php

class m_borrow extends CI_Model {

    var $b_id = '';
    var $code = '';
    var $s_id = '';
    var $type = '';
    var $b_name = '';
    var $b_num = '';
    var $bank_name = '';
    var $money = '';
    var $moneyOld = '';
    var $moneyType = '';
    var $equipment = '';
    var $material = '';
    var $experiment = '';
    var $fuel = '';
    var $travel = '';
    var $conference = '';
    var $international = '';
    var $information = '';
    var $service = '';
    var $consultative = '';
    var $other = '';
    var $ji_xiao = '';
    var $borrowType = '';
    var $contact = '';
    var $phone = '';
    var $b_remarks = '';
    var $state = '';
    var $state2 = '';
    var $date = '';
    var $date2 = '';
    var $date3 = '';
    var $date4 = '';
    var $date5 = '';
    var $date6 = '';
    var $date7 = '';
    var $year = '';
    var $month = '';
    var $description = '';

    // var $upload = '';
    //var $upload_date = '';

    function saveInfo() {
        $this->b_id = $this->input->post('b_id');
        $this->s_id = $this->input->post('s_id');
        $this->date = date("Y-m-d");
        $this->year = date("Y");
        $this->month = date("m");
        $this->b_name = $this->input->post('b_name');
        $this->b_num = $this->input->post('b_num');
        $this->bank_name = $this->input->post('bank_name');
        $this->money = $this->input->post('money');
        $this->moneyOld = $this->input->post('money');
        $this->num = $this->input->post('num');
        $this->type = $this->input->post('type');
        $this->borrowType = $this->input->post('borrowType');
        //$this->contact = $this->input->post('contact');
        //$this->phone = $this->input->post('phone');
        $this->b_remarks = $this->input->post('b_remarks');
        $this->state = $this->input->post('state');
        $this->state2 = $this->input->post('state2');
        $this->description = $this->input->post('description');



        $id = $this->b_id;
        if ($id == 0) {
            $this->db->insert('borrow', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('borrow', $this, array('b_id' => $this->b_id));
        }
        return $id;
    }

    function getTotalMoney($array) {
        $this->db->select();
        $this->db->from('lz_money_total');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('borrow');
        $this->db->where('b_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo1($subjectId) {
        $this->db->select();
        $this->db->from('lz_money_total');
        $this->db->where('subjectId', $subjectId);
        $q = $this->db->get();
        return $q->result();
    }
    //分页获取全部的借款信息
    function getBorrowS($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "asc");
        $q = $this->db->get('borrow', $per_page, $offset);
        return $q->result();
    }
    //获取分类的借款信息--不分页
    function getBorrowS_1($array,$offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "asc");
        $q = $this->db->get('borrow',$offset);
        return $q->result();
    }
    //管理员分页获取全部的借款信息
    function getBorrowMange($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where('state >', 2);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "desc");
        $q = $this->db->get('lz_borrow_detail', $per_page, $offset);
        return $q->result();
    }
    //管理员获取分类全部的借款信息--不分页
    function getBorrowMange_1($array,$offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where('state >', 2);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "desc");
        $q = $this->db->get('lz_borrow_detail',$offset);
        return $q->result();
    }
     function getBorrowMange_2($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where('state2 >', 2);
         $this->db->order_by("state", "asc");
         $this->db->order_by("date", "desc");
        $q = $this->db->get('lz_borrow_detail', $per_page, $offset);
        return $q->result();
    }

    function check($id) {
        $check = array(
            'state' => $this->input->post('state'),
            'remark' => $this->input->post('remark'),
            'date3' => date("Y-m-d")
        );
        if ($id == null) {
            show_404();
        }
        $this->db->update('borrow', $check, array('b_id' => $id));
        return $id;
    }

    function check2($id) {
        $check = array(
            'state' => $this->input->post('state'),
            'remark2' => $this->input->post('remark'),
            'date4' => date("Y-m-d")
        );
        if ($id == null) {
            show_404();
        }
        $this->db->update('borrow', $check, array('b_id' => $id));
        return $id;
    }

    function baoxiao($id) {
        $baoxiao = array(
            'money' => $this->input->post('money'),
            'num' => $this->input->post('num')
        );
        if ($id == null) {
            show_404();
        }
        $this->db->update('borrow', $baoxiao, array('b_id' => $id));
        return $id;
    }

    function getNumManage($array) {
        $this->db->from('lz_borrow_detail');
        $this->db->where('state >', 2);
        $this->db->where($array);
        return $this->db->count_all_results();
    }
      function getNumManage_2($array) {
        $this->db->from('lz_borrow_detail');
        $this->db->where('state2 >', 2);
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function gettotalMoneySum($array, $array1) {
        $this->db->select_sum('equipment');
        $this->db->select_sum('buyEquipment');
        $this->db->select_sum('tryEquipment');
        $this->db->select_sum('alterEquipment');
        $this->db->select_sum('material');
        $this->db->select_sum('experiment');
        $this->db->select_sum('fuel');
        $this->db->select_sum('travel');
        $this->db->select_sum('conference');
        $this->db->select_sum('international');
        $this->db->select_sum('information');
        $this->db->select_sum('service');
        $this->db->select_sum('consultative');
        $this->db->select_sum('management');
        $this->db->select_sum('othert');
        $this->db->select_sum('indirect_cost');
        $this->db->select_sum('ji_xiao');

        $this->db->select_sum('total');

        $this->db->from('lz_money_total');
        $this->db->where($array);
        $this->db->group_by($array1);
        $q = $this->db->get();
        return $q->result();
    }

    function gettotalMoneyCaption($array) {
        $arr = array('equipmentCaption', 'buyEquipmentCaption',
            'tryEquipmentCaption', 'alterEquipmentCaption', 'materialCaption',
            'experimentCaption', 'fuelCaption', 'travelCaption',
            'conferenceCaption', 'internationalCaption', 'informationCaption',
            'serviceCaption', 'consultativeCaption', 'managementCaption');
        $this->db->select($arr);
        $this->db->from('lz_money_total');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('borrow');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function update($id, $array) {
        $this->db->where('b_id', $id);
        $this->db->update('borrow', $array);
    }

    function delete($id) {
        $this->db->where('b_id', $id);
        $this->db->delete('borrow');
    }

    function getSubjectId($array) {
        $this->db->select('subjectId');
        $this->db->where($array);

        $q = $this->db->get('totalmoney');
        return $q->result();
    }

    // 获取审核状态
    function getState($state) {
        switch ($state) {
            case 1:
                return "草稿";
            case 2:
                return "重新申报";
            case 3:
                return "已提交";

            case 4:
                return "收到发票";

            case 5:
                return "完成";
        }
    }

    // 获取审核状态
    function getState3($state) {
        switch ($state) {
            case '未报销':
                return "1";
            case '重新申报':
                return "2";
            case '已提交':
                return "3";
            case '收到发票':
                return "4";
            case '完成':
                return "5";
        }
    }

    // 获取审核状态
    function getState4($state) {
        switch ($state) {
            case 1:
                return "未报销";
            case 2:
                return "重新申报";
            case 3:
                return "已提交";

            case 4:
                return "收到发票";

            case 5:
                return "完成";
        }
    }

    // 获取审核状态
    function getState1($state) {
        switch ($state) {
            case '草稿':
                return "1";
            case '重新申报':
                return "2";
            case '已提交':
                return "3";
            case '收到发票':
                return "4";
            case '完成':
                return "5";
        }
    }

}

?>