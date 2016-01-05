<?php
class m_patent extends CI_Model{

    var $patentId = '';
    var $subjectId = '';
    var $state = '';
    var $patentName = '';
    var $patentNum = ''; 
    var $type = '';
    var $author = '';
    var $patentState = '';
    var $applyTime = '';
    var $authorizeTime = '';
    var $workplace = '';
    var $remark = '';

    function saveInfo(){
        $this->patentId = $this->input->post('patentId');
        $this->subjectId = $this->input->post('subjectId');
        $this->state = $this->input->post('state');
        $this->patentName = $this->input->post('patentName');
        $this->patentNum = $this->input->post('patentNum');
        $this->type = $this->input->post('type');
        $this->author = $this->input->post('author');
        $this->patentState = $this->input->post('patentState');
        $this->applyTime = $this->input->post('applyTime');
        $this->authorizeTime = $this->input->post('authorizeTime');
        $this->workplace = $this->input->post('workplace');
        $this->remark = $this->input->post('remark');

        $id = $this->patentId;
        if($id == 0){
            $this->db->insert('patent', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('patent', $this, array('patentId' => $this->patentId));
        }
        return $id;
    }

    function getPatent($array){
        $this->db->select();
        $this->db->from('lz_patent_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getPatents($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('lz_patent_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('lz_patent_subject');
        $this->db->where('patentId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('lz_patent_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array){
        $this->db->where('patentId', $id);
        $this->db->update('patent', $array);
    }

    function delete($id){
        $this->db->where('patentId',  $id);
        $this->db->delete('patent');
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
