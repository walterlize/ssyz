<?php

class m_subject extends CI_Model {

    var $subjectId = '';
    var $subjectNum = '';
    var $inherit = '';
    var $startDate = '';
    var $endDate = '';
    var $expert = '';
    var $type = '';
    var $subjectUnit = '';
    var $introduction = '';
    var $content = '';
    var $completion = '';
    var $remark = '';

    function saveInfo() {
        $this->subjectId = $this->input->post('subjectId');
        $this->inherit = $this->input->post('inherit');
        $this->expert = $this->input->post('expert');
        $this->type = $this->input->post('type');
        $this->startDate = $this->input->post('startDate');
        $this->endDate = $this->input->post('endDate');
        $this->subjectNum = $this->input->post('subjectNum');
        $this->subjectName = $this->input->post('subjectName');
        $this->subjectUnit = $this->input->post('subjectUnit');
        $this->introduction = $this->input->post('introduction');
        $this->content = $this->input->post('content');
        $this->completion = $this->input->post('completion');
        $this->remark = $this->input->post('remark');

        $id = $this->subjectId;
        if ($id == 0) {
            $this->db->insert('subject', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('subject', $this, array('subjectId' => $this->subjectId));
        }
        return $id;
    }

    function updateInfo($id, $array) {
        $this->db->where('subjectId', $id);
        $this->db->update('subject', $array);
    }

    function getSubject($array) {
        $this->db->select();
        $this->db->from('subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    //获取对应inherit下所有的课题单位
    function getSubject_name($array) {
        $this->db->select('subjectUnit');
        $this->db->from('subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }
    function getSubject1() {
        $this->db->select();
        $this->db->from('lz_money_total');
        $q = $this->db->get();
        return $q->result();
    }

    function getSubject3($array) {
        $this->db->select();
        $this->db->from('subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getSubject2($array) {
        $this->db->select();
        $this->db->from('subject');
        $this->db->where($array);
        $this->db->where('type', 'Ordinary');
        $q = $this->db->get();
        return $q->result();
    }

    function getWorkplace($array) {
        $this->db->select();
        $this->db->from('subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('subject');
        $this->db->where('subjectId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getSubjects($per_page, $offset) {
        $this->db->select();
        $this->db->where('type', 'Subject');
        $q = $this->db->get('subject', $per_page, $offset);
        return $q->result();
    }

    function getSubjects2($per_page, $offset, $array) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('subject', $per_page, $offset);
        return $q->result();
    }

    function getNum($array) {

        $this->db->from('subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateUserinfo($id, $array) {
        $this->db->where('subjectId', $id);
        $this->db->update('subject', $array);
    }

    function delete($id) {
        $this->db->where('subjectId', $id);
        $this->db->delete('subject');
    }

}

?>