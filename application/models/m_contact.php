<?php
class m_contact extends CI_Model{

    var $contactId = '';
    var $personName = '';
    var $firm = '';
    var $email = '';
    var $remark = '';

    function saveInfo(){
        $this->contactId = $this->input->post('contactId');
        $this->personName = $this->input->post('personName');
        $this->firm = $this->input->post('firm');
        $this->email = $this->input->post('email');
        $this->remark = $this->input->post('remark');

        $id = $this->contactId;
        if($id == 0){
            $this->db->insert('contact', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('contact', $this, array('contactId' => $this->contactId));
        }
        return $id;
    }

    function getContact($array){
        $this->db->select();
        $this->db->from('contact');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getContacts($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('contact', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('contact');
        $this->db->where('contactId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('contact');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateUserinfo($id, $array){
        $this->db->where('contactId', $id);
        $this->db->update('contact', $array);
    }

    function delete($id){
        $this->db->where('contactId',  $id);
        $this->db->delete('contact');
    }
}
?>
