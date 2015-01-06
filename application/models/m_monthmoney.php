<?php

class m_monthmoney extends CI_Model {

    var $monthMoneyId = '';
    var $type = '';
    var $subjectId = '';
    var $inherit = '';
    var $subjectUnit = '';
    var $year = '';
    var $month = '';
    var $state = '';
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
    var $total = '';
    var $totalyear = '';

    function saveInfo() {
        $this->monthMoneyId = $this->input->post('monthMoneyId');
        $this->type = $this->input->post('type');
        $this->inherit = $this->input->post('inherit');
        $this->subjectId = $this->input->post('subjectId');
        $this->subjectUnit = $this->input->post('subjectUnit');
        $this->year = $this->input->post('year');
        $this->month = $this->input->post('month');
        $this->state = $this->input->post('state');
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
        $this->total = $this->input->post('total');
        $this->totalyear = $this->input->post('totalyear');


        $id = $this->monthMoneyId;
        if ($id == 0) {
            $this->db->insert('monthmoney', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('monthmoney', $this, array('monthMoneyId' => $this->monthMoneyId));
        }
        return $id;
    }

    function getMonthMoney($array) {
        $this->db->select();
        $this->db->from('ws_money_month');
        $this->db->where($array);

        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_money_month');
        $this->db->where('monthMoneyId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getMonthMoneyS($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("year", "desc");
        $this->db->order_by("month", "desc");
        $this->db->order_by("state", "asc");


        $q = $this->db->get('ws_money_month', $per_page, $offset);
        return $q->result();
    }

    /*  function getMonthMoneySum($array, $array1) {
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
      $this->db->select_sum('total');

      $this->db->from('ws_money_month');
      $this->db->where($array);
      $this->db->group_by($array1);
      $q = $this->db->get();
      return $q->result();
      } */

    function getMonthMoneySum($array, $array1) {
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
        $this->db->select_sum('total');
        $this->db->select('totalyear');
        $this->db->select('subjectId');
        $this->db->select('subjectUnit');
        $this->db->select('subjectName');
        $this->db->select('year');
        $this->db->select('month');
        $this->db->from('ws_money_month');

        $this->db->where($array);
        $this->db->group_by($array1);
        $q = $this->db->get();
        return $q->result();
    }

    function getMonthMoneyTotal($subjectId) {



        $this->db->select('subjectId', $subjectId);

        $this->db->select_sum('total');
        $q = $this->db->get('ws_money_month');
        return $q;
    }

    function getMonthMoneyTotal1($array1, $offset) {

        $this->db->where($array1);
        //$this->db->where('subjectId', $subjectId);
        $this->db->select_sum('total');

        $q = $this->db->get('ws_money_month', $offset);

        return $q->result();
    }

    function getMonthMoneyTotal2($subjectId) {
        $array1 = array('subjectId');

        $this->db->where('subjectId', $subjectId);
        $this->db->select_sum('total');
        $this->db->group_by($array1);
        $q = $this->db->get('ws_money_month');

        return $q->result();
    }

    function getMonthMoneyCaption($array) {
        $arr = array('equipmentCaption', 'buyEquipmentCaption',
            'tryEquipmentCaption', 'alterEquipmentCaption', 'materialCaption',
            'experimentCaption', 'fuelCaption', 'travelCaption',
            'conferenceCaption', 'internationalCaption', 'informationCaption',
            'serviceCaption', 'consultativeCaption', 'managementCaption');
        $this->db->select($arr);
        $this->db->from('ws_money_month');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('monthmoney');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function get_upload_exist($array) {
        $this->db->from('upload');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array) {
        $this->db->where('monthMoneyId', $id);
        $this->db->update('monthmoney', $array);
    }

    function delete($id) {
        $this->db->where('monthMoneyId', $id);
        $this->db->delete('monthmoney');
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