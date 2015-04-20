<?php

class m_totalmoney extends CI_Model {

    var $totalMoneyId = '';
    var $subjectId = '';
    var $direct_cost = '';
    var $subjectUnit = '';
    var $equipment = '';
    var $buyEquipment = '';
    var $tryEquipment = '';
    var $alterEquipment = '';
    var $material = '';
    var $experiment = '';
    var $fuel = '';
    var $travel = '';
    var $conference = '';
    var $international = '';
    var $information = '';
    var $service = '';
    var $consultative = '';
    var $management = '';
    var $other = '';
    var $ji_xiao = '';
    var $indirect_cost = '';
    var $total = '';

    function saveInfo() {
        $this->totalMoneyId = $this->input->post('totalMoneyId');
        $this->subjectId = $this->input->post('subjectId');
        $this->subjectUnit = $this->input->post('subjectUnit');
        $this->direct_cost = $this->input->post('direct_cost');
        $this->equipment = $this->input->post('equipment');
        $this->buyEquipment = $this->input->post('buyEquipment');
        $this->tryEquipment = $this->input->post('tryEquipment');
        $this->alterEquipment = $this->input->post('alterEquipment');
        $this->material = $this->input->post('material');
        $this->experiment = $this->input->post('experiment');
        $this->fuel = $this->input->post('fuel');
        $this->travel = $this->input->post('travel');
        $this->conference = $this->input->post('conference');
        $this->international = $this->input->post('international');
        $this->information = $this->input->post('information');
        $this->service = $this->input->post('service');
        $this->consultative = $this->input->post('consultative');
        $this->management = $this->input->post('management');
        $this->other = $this->input->post('other');
        $this->indirect_cost = $this->input->post('indirect_cost');
        $this->ji_xiao = $this->input->post('ji_xiao');
        $this->total = $this->input->post('total');


        $id = $this->totalMoneyId;
        if ($id == 0) {
            $this->db->insert('totalmoney', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('totalmoney', $this, array('totalMoneyId' => $this->totalMoneyId));
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

    function getOneInfo_1($id) {
        $this->db->select();
        $this->db->from('lz_money_total');
        $this->db->where('totalMoneyId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo3($array) {
        $this->db->select();
        $this->db->from('lz_money_total');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getTotalMoneyS($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("totalMoneyId", "asc");

        $q = $this->db->get('lz_money_total', $per_page, $offset);
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
        $this->db->from('totalmoney');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function getNum_zi($array) {
        $this->db->from('lz_money_total');
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