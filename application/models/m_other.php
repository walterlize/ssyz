<?php
class m_other extends CI_Model{

    var $otherId = '';
    var $subjectId = '';
    var $state = '';
    var $otherName = '';
    var $content = '';
    var $remark = '';

    function saveInfo(){
        $this->otherId = $this->input->post('otherId');
        $this->subjectId = $this->input->post('subjectId');
        $this->state = $this->input->post('state');
        $this->otherName = $this->input->post('otherName');
        $this->content = $this->input->post('content');
        $this->remark = $this->input->post('remark');

        $id = $this->otherId;
        if($id == 0){
            $this->db->insert('other', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('other', $this, array('otherId' => $this->otherId));
        }
        return $id;
    }

    function getOther($array){
        $this->db->select();
        $this->db->from('ws_other_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getOthers($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('ws_other_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('ws_other_subject');
        $this->db->where('otherId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('ws_other_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array){
        $this->db->where('otherId', $id);
        $this->db->update('other', $array);
    }

    function delete($id){
        $this->db->where('otherId',  $id);
        $this->db->delete('other');
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
