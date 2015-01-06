<?php
class m_standard extends CI_Model{

    var $standardId = '';
    var $subjectId = '';
    var $state = '';
    var $standardName = '';
    var $type = '';
    var $author = ''; 
    var $time = '';
    var $workplace = '';
    var $introduction = '';
    var $remark = '';

    function saveInfo(){
        $this->standardId = $this->input->post('standardId');
        $this->subjectId = $this->input->post('subjectId');
        $this->state = $this->input->post('state');
        $this->standardName = $this->input->post('standardName');
        $this->type = $this->input->post('type');
        $this->author = $this->input->post('author');
        $this->time = $this->input->post('time');
        $this->workplace = $this->input->post('workplace');
        $this->introduction = $this->input->post('introduction');
        $this->remark = $this->input->post('remark');

        $id = $this->standardId;
        if($id == 0){
            $this->db->insert('standard', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('standard', $this, array('standardId' => $this->standardId));
        }
        return $id;
    }

    function getStandard($array){
        $this->db->select();
        $this->db->from('ws_standard_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getStandards($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('ws_standard_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('ws_standard_subject');
        $this->db->where('standardId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('ws_standard_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array){
        $this->db->where('standardId', $id);
        $this->db->update('standard', $array);
    }

    function delete($id){
        $this->db->where('standardId',  $id);
        $this->db->delete('standard');
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
