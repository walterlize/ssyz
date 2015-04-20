<?php

class m_money_record extends CI_Model {

    var $mc_id = '';
    var $m_type = '';
    var $date = '';
    var $year = '';
    var $month = '';
    var $money = '';
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

    function saveInfo($id) {
        $this->mc_id = $this->input->post('mc_id');
        $this->b_id = $id;
        $this->s_id = $this->input->post('s_id');
        $this->m_type = $this->input->post('m_type');
        $this->year = date("Y");
        $this->month = date("m");
        $this->date = date("Y-m-d");
        $mc_id = $this->mc_id;
        if ($mc_id == 0) {
            $this->db->insert('money_current', $this);
            $mc_id = $this->db->insert_id();
        } else {
            $this->db->update('money_current', $this, array('mc_id' => $this->mc_id));
        }
        return $mc_id;
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('money_current');
        $this->db->where('mc_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo1($id, $m_type) {
        $this->db->select();
        $this->db->from('money_current');
        $this->db->where('b_id', $id);

        $this->db->where('m_type', $m_type);
        $q = $this->db->get();
        return $q->result();
    }

    function getMoney_currentS($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("date", "asc");
        $q = $this->db->get('money_current', $per_page, $offset);
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('money_current');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function submit($id, $array) {

        $this->db->where('mc_id', $id);
        $this->db->update('money_current', $array);
    }

    function delete($id, $type) {
        $this->db->where('b_id', $id);
        $this->db->where('m_type', $type);
        $this->db->delete('money_current');
    }

    function update($id, $array) {

        $this->db->where('mc_id', $id);
        $this->db->update('money_current', $array);
    }

    function update_1($id, $type, $array) {

        $this->db->where('b_id', $id);
        $this->db->where('m_type', $type);
        $this->db->update('money_current', $array);
    }

    function updateBorrow($id, $type) {

        $this->db->where('b_id', $id);
        $this->db->where('m_type', $type);
        $baoxiao = array(
            'money' => $this->input->post('money'),
        );

        $this->db->update('money_current', $baoxiao);
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
                return "已提交";
            case 3:
                return "收到发票";
            case 4:
                return "钱已汇";
            case 5:
                return "钱收到，报销完成";
            case 6:
                return "有误，请重新申报";
        }
    }

}

?>