<?php

class m_borrow extends CI_Model {

    var $b_id = '';
    var $s_id = '';
    var $b_name = '';
    var $b_num = '';
    var $bank_name = '';
    var $money = '';
    var $type = '';
    var $contact = '';
    var $phone = '';
    var $b_remarks = '';
    var $state = '';
    var $content = '';

    function saveInfo() {
        $this->b_id = $this->input->post('b_id');
        $this->s_id = $this->input->post('s_id');
        $this->b_name = $this->input->post('b_name');
        $this->b_num = $this->input->post('b_num');
        $this->bank_name = $this->input->post('bank_name');
        $this->money = $this->input->post('money');
        $this->type = $this->input->post('type');
        $this->contact = $this->input->post('contact');
        $this->phone = $this->input->post('phone');
        $this->b_remarks = $this->input->post('b_remarks');
        $this->state = $this->input->post('state');
        $this->content = $this->input->post('content');



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
        $this->db->from('lz_money_total');
        $this->db->where('totalMoneyId', $id);
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

    function getBorrowS($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("date", "asc");
        $q = $this->db->get('lz_borrow_money_subject', $per_page, $offset);
        return $q->result();
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

    function updateInfo($id, $array) {
        $this->db->where('totalMoneyId', $id);
        $this->db->update('totalmoney', $array);
    }

    function delete($id) {
        $this->db->where('totalMoneyId', $id);
        $this->db->delete('totalmoney');
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
            case 0:
                return "申请修改";
            case 1:
                return "待审核";
            case 2:
                return "审核未通过";
            case 3:
                return "审核通过";
        }
    }

}

?>