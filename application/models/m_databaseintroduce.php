<?php
class m_databaseIntroduce extends CI_Model{

    var $id = '';
    var $content = '';

    function saveInfo(){
        $this->id = $this->input->post('id');
        $this->content = $this->input->post('content');

        $id = $this->id;
        if($id == 0){
            $this->db->insert('databaseintroduce', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('databaseintroduce', $this, array('id' => $this->id));
        }
        return $id;
    }

    function getDatabaseIntroduce($array){
        $this->db->select();
        $this->db->from('databaseintroduce');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('databaseintroduce');
        $this->db->where('id',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getDatabaseIntroduces(){
        $this->db->select();
        $this->db->from('databaseintroduce');
        $q = $this->db->get();
        return $q->result();
    }

    function getNum(){
        $this->db->from('databaseintroduce');
        return $this->db->count_all_results();
    }

}
?>