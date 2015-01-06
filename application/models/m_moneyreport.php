<?php

class m_moneyreport extends CI_Model {

    var $id = '';
    
    var $subjectUnit = '';
 
    var $author = '';
 
    var $date = '';
 
    var $title = '';
    var $content = '';
    var $state = '';
  

    function saveInfo() {
        $this->workReportId = $this->input->post('workReportId');
        $this->subjectId = $this->input->post('subjectId');
        $this->inherit = $this->input->post('inherit');
        $this->subjectUnit = $this->input->post('subjectUnit');
        $this->type = $this->input->post('type');
        $this->level = $this->input->post('level');
        $this->author = $this->input->post('author');
        $this->year = date('Y');
        $this->month = date('m');
        $this->title = $this->input->post('title');
        $this->content = $this->input->post('content');
        $this->state = 0;
        $this->remark = $this->input->post('remark');

        $id = $this->workReportId;
        if ($id == 0) {
            $this->db->insert('workreport', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('workreport', $this, array('workReportId' => $this->workReportId));
        }
        return $id;
    }

    function getWorkReport($array) {
        $this->db->select();
        $this->db->from('workreport');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getReports($array, $per_page, $offset, $level) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where('level', $level);
        $this->db->order_by("state", 'asc');

        $this->db->order_by("workReportId", "desc");
        $q = $this->db->get('workreport', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('workreport');
        $this->db->where('workReportId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array, $level) {
        $this->db->from('workreport');
        $this->db->where($array);
        $this->db->where('level', $level);
        return $this->db->count_all_results();
    }

    function updateReport($id, $array) {
        $this->db->where('workReportId', $id);
        $this->db->update('workreport', $array);
    }

    function deleteReport($id) {
        $this->db->where('workReportId', $id);
        $this->db->delete('workreport');
    }

    function search($per_page, $offset, $array, $searchterm, $level) {
        $this->db->select();
        $this->db->from('workreport');
        $this->db->where($array);
        $this->db->where('level', $level);
        ;
        $this->db->where('subjectUnit', $searchterm, $per_page, $offset);
        $q = $this->db->get();
        return $q->result();
    }

    // 获取审核状态
    function getState($state) {
        switch ($state) {
            case 0:
                return "待审核";
            case 1:
                return "审核未通过";
            case 2:
                return "审核通过";
        }
    }

}

?>
