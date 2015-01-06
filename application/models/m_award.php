<?php
class m_award extends CI_Model{

    var $awardId = '';
    var $subjectId = '';
    var $state = '';
    var $awardName = '';
    var $author = '';
    var $workplace = '';
    var $type = '';
    var $grade = '';
    var $level = '';
    var $awardState = '';
    var $processWorkplace = '';
    var $organizationDepart = '';    
    var $issueDepart = '';    
    var $remark = '';

    function saveInfo(){
        $this->awardId = $this->input->post('awardId');
        $this->subjectId = $this->input->post('subjectId');
        $this->state = $this->input->post('state');
        $this->awardName = $this->input->post('awardName');
        $this->author = $this->input->post('author');
        $this->workplace = $this->input->post('workplace');
        $this->type = $this->input->post('type');
        $this->grade = $this->input->post('grade');
        $this->level = $this->input->post('level');
        $this->awardState = $this->input->post('awardState');
        $this->processWorkplace = $this->input->post('processWorkplace');
        $this->organizationDepart = $this->input->post('organizationDepart');
        $this->issueDepart = $this->input->post('issueDepart');
        $this->remark = $this->input->post('remark');

        $id = $this->awardId;
        if($id == 0){
            $this->db->insert('award', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('award', $this, array('awardId' => $this->awardId));
        }
        return $id;
    }

    function getAward($array){
        $this->db->select();
        $this->db->from('ws_award_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getAwards($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('ws_award_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('ws_award_subject');
        $this->db->where('awardId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('ws_award_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array){
        $this->db->where('awardId', $id);
        $this->db->update('award', $array);
    }

    function delete($id){
        $this->db->where('awardId',  $id);
        $this->db->delete('award');
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
