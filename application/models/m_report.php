<?php
class m_report extends CI_Model{

    var $reportId = '';
    var $subjectId = '';
    var $state = '';
    var $reportName = '';    
    var $author = '';
    var $time = '';
    var $workplace = '';
    var $type = '';
    var $remark = '';

    function saveInfo(){
        $this->reportId = $this->input->post('reportId');
        $this->subjectId = $this->input->post('subjectId');
        $this->state = $this->input->post('state');
        $this->reportName = $this->input->post('reportName');
        $this->author = $this->input->post('author');
        $this->time = $this->input->post('time');
        $this->workplace = $this->input->post('workplace');
        $this->type = $this->input->post('type');
        $this->remark = $this->input->post('remark');

        $id = $this->reportId;
        if($id == 0){
            $this->db->insert('report', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('report', $this, array('reportId' => $this->reportId));
        }
        return $id;
    }

    function getReport($array){
        $this->db->select();
        $this->db->from('lz_report_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getReports($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('lz_report_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('lz_report_subject');
        $this->db->where('reportId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('lz_report_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array){
        $this->db->where('reportId', $id);
        $this->db->update('report', $array);
    }

    function delete($id){
        $this->db->where('reportId',  $id);
        $this->db->delete('report');
    }

    // 获取审核状态
    function  getState($state){
        switch ($state){
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
