<?php

class m_yearMoney extends CI_Model {

    var $yearMoneyId = '';
    var $type = '';
    var $subjectId = '';
    var $subjectUnit = '';
    var $year = '';
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
    var $equipmentCaption = '';
    var $buyEquipmentCaption = '';
    var $tryEquipmentCaption = '';
    var $alterEquipmentCaption = '';
    var $materialCaption = '';
    var $experimentCaption = '';
    var $fuelCaption = '';
    var $travelCaption = '';
    var $conferenceCaption = '';
    var $internationalCaption = '';
    var $informationCaption = '';
    var $serviceCaption = '';
    var $consultativeCaption = '';
    var $managementCaption = '';
    var $total = '';

    function saveInfo() {
        $this->yearMoneyId = $this->input->post('yearMoneyId');
        $this->subjectId = $this->input->post('subjectId');
        $this->type = $this->input->post('type');
        $this->year = $this->input->post('year');
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
        $this->equipmentCaption = $this->input->post('equipmentCaption');
        $this->buyEquipmentCaption = $this->input->post('buyEquipmentCaption');
        $this->tryEquipmentCaption = $this->input->post('tryEquipmentCaption');
        $this->alterEquipmentCaption = $this->input->post('alterEquipmentCaption');
        $this->materialCaption = $this->input->post('materialCaption');
        $this->experimentCaption = $this->input->post('experimentCaption');
        $this->fuelCaption = $this->input->post('fuelCaption');
        $this->travelCaption = $this->input->post('travelCaption');
        $this->conferenceCaption = $this->input->post('conferenceCaption');
        $this->internationalCaption = $this->input->post('internationalCaption');
        $this->informationCaption = $this->input->post('informationCaption');
        $this->serviceCaption = $this->input->post('serviceCaption');
        $this->consultativeCaption = $this->input->post('consultativeCaption');
        $this->managementCaption = $this->input->post('managementCaption');
        $this->total = $this->input->post('total');
        $id = $this->yearMoneyId;
        if ($id == 0) {
            $this->db->insert('yearmoney', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('yearmoney', $this, array('yearMoneyId' => $this->yearMoneyId));
        }
        return $id;
    }

    function saveInfo1($id, $array) {
        $this->db->where('subjectId', $id);
        $this->db->update('yearmoney', $array);
    }

    function getYearMoney($array) {
        $this->db->select();
        $this->db->from('ws_money_year');
        $this->db->where($array);
        $this->db->order_by("year", "asc");
        $q = $this->db->get();
        return $q->result();
    }

    function getYearMoney2($id) {
        $this->db->select();
        $this->db->from('ws_money_year');
        $this->db->where('subjectId', $id);
        $this->db->order_by("year", "asc");
        $q = $this->db->get();
        return $q->result();
    }

    function getYearMoney1($id) {
        $this->db->select();
        $this->db->from('ws_money_year');
        $this->db->where("yearMoneyId", $id);
        $this->db->order_by("year", "asc");
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('ws_money_year');
        $this->db->where('yearMoneyId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo1($id) {
        $this->db->select();
        $this->db->from('ws_money_year');
        $this->db->where('subjectId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getYearMoneyS($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("year", "desc");
        $this->db->order_by("yearMoneyId", "desc");
        $q = $this->db->get('ws_money_year', $per_page, $offset);
        return $q->result();
    }

    function getYearMoneyS1($array, $per_page) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("year", "desc");
        $this->db->order_by("yearMoneyId", "desc");
        $q = $this->db->get('ws_money_year', $per_page);
        return $q->result();
    }

    /*  function getYearMoneySum($array, $array1) {
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

      $this->db->from('ws_money_year');
      $this->db->where($array);
      $this->db->group_by($array1);
      $q = $this->db->get();
      return $q->result();
      } */

    function getYearMoneySum($array, $array1) {
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
        $this->db->select('totalgive');
        $this->db->select('subjectId');
        $this->db->select('subjectUnit');
        $this->db->select('subjectName');
        $this->db->select('year');

        $this->db->from('ws_money_year');

        $this->db->where($array);
        $this->db->group_by($array1);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('yearmoney');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function delete($id) {
        $this->db->where('yearMoneyId', $id);
        $this->db->delete('yearmoney');
    }

}

?>