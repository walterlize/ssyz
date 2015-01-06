<?php
class m_paper extends CI_Model{

    var $paperId = '';
    var $subjectId = '';
    var $state = '';
    var $paperName = '';
    var $publication = '';
    var $time = '';
    var $volume = '';
    var $period = '';
    var $fromPage = '';
    var $endPage = '';
    var $type = '';
    var $record = '';
    var $author = '';
    var $authorWorkplace = '';
    var $remark = '';

    function saveInfo(){
        $this->paperId = $this->input->post('paperId');
        $this->subjectId = $this->input->post('subjectId');
        $this->state = $this->input->post('state');
        $this->paperName = $this->input->post('paperName');
        $this->publication = $this->input->post('publication');
        $this->time = $this->input->post('time');
        $this->volume = $this->input->post('volume');
        $this->period = $this->input->post('period');
        $this->fromPage = $this->input->post('fromPage');
        $this->endPage = $this->input->post('endPage');
        $this->type = $this->input->post('type');
        $this->record = $this->input->post('record');
        $this->author = $this->input->post('author');
        $this->authorWorkplace = $this->input->post('authorWorkplace');
        $this->remark = $this->input->post('remark');

        $id = $this->paperId;
        if($id == 0){
            $this->db->insert('paper', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('paper', $this, array('paperId' => $this->paperId));
        }
        return $id;
    }

    function getPaper($array){
        $this->db->select();
        $this->db->from('ws_paper_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getPapers($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('ws_paper_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('ws_paper_subject');
        $this->db->where('paperId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('ws_paper_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array){
        $this->db->where('paperId', $id);
        $this->db->update('paper', $array);
    }

    function delete($id){
        $this->db->where('paperId',  $id);
        $this->db->delete('paper');
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
