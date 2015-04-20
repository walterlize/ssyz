<?php

class m_baoxiaohead extends CI_Model {

    var $bx_id = '';
    var $s_id = '';
    var $date = '';
    var $state = '';
    var $remark = '';

    function saveInfo() {
        $this->bx_id = $this->input->post('bx_id');
        $this->s_id = $this->input->post('s_id');
        //$this->date = $this->input->post('b_name');
        $this->state = $this->input->post('state');
                $id = $this->bx_id;
        if ($id == 0) {
            $this->db->insert('baoxiao', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('baoxiao', $this, array('bx_id' => $this->bx_id));
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
        $this->db->from('baoxiao');
        $this->db->where('bx_id', $id);
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

    function getBaoxiaoS($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("date", "asc");
        $q = $this->db->get('baoxiao', $per_page, $offset);
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
        $this->db->from('baoxiao');
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