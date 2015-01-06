<?php
class m_result extends CI_Model{

    var $resultId = '';
    var $subjectId = '';
    var $state = '';
    var $resultName = '';
    var $author = '';
    var $time = '';
    var $opinion = '';
    var $workplace = '';
    var $remark = '';

    function saveInfo(){
        $this->resultId = $this->input->post('resultId');
        $this->subjectId = $this->input->post('subjectId');
        $this->state = $this->input->post('state');
        $this->resultName = $this->input->post('resultName');
        $this->author = $this->input->post('author');
        $this->opinion = $this->input->post('opinion');
        $this->time = $this->input->post('time');
        $this->workplace = $this->input->post('workplace');
        $this->remark = $this->input->post('remark');

        $id = $this->resultId;
        if($id == 0){
            $this->db->insert('result', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('result', $this, array('resultId' => $this->resultId));
        }
        return $id;
    }

    function getResult($array){
        $this->db->select();
        $this->db->from('ws_result_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getResults($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('ws_result_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('ws_result_subject');
        $this->db->where('resultId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('ws_result_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array){
        $this->db->where('resultId', $id);
        $this->db->update('result', $array);
    }

    function delete($id){
        $this->db->where('resultId',  $id);
        $this->db->delete('result');
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
