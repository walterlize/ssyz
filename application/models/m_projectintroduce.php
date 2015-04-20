<?php
class m_projectIntroduce extends CI_Model{

    var $id = '';
    var $content = '';


    function saveInfo(){
        $this->id = $this->input->post('id');
        $this->content = $this->input->post('content');

        $id = $this->id;
        if($id == 0){
            $this->db->insert('projectintroduce', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('projectintroduce', $this, array('id' => $this->id));
        }
        return $id;
    }

    function getProjectIntroduce($array){
        $this->db->select();
        $this->db->from('projectintroduce');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('projectintroduce');
        $this->db->where('id',  $id);
        $q = $this->db->get();
        return $q->result();
    }

//    function getProjectIntroduces($type){
//        $this->db->select();
//        $this->db->from('projectintroduce');
//        $this->db->where('type',  $type);
//        $q = $this->db->get();
//        return $q->result();
//    }

    function getNum(){
        $this->db->from('projectintroduce');
        return $this->db->count_all_results();
    }

}
?>