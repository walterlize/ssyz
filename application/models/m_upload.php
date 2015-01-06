<?php

class m_upload extends CI_Model {

    var $uploadId = '';
    var $subjectId = '';
    var $type = '';
    var $name = '';

    function save_info($array,$uploadId) {
        $this->db->insert('upload', $array, array('uploadId' => $uploadId));
    }

    function update_info($array, $uploadId) {
        $this->db->update('upload', $array, array('uploadId' => $uploadId));
    }

    function get_info($id) {
        $this->subjectId = $id;
        $this->db->select();
        $this->db->from('upload');
        $this->db->where('subjectId', $this->subjectId);
        $q = $this->db->get();
        return $q->result();
    }
     function get_info1($id) {
      
        $this->db->select();
        $this->db->from('upload');
        $this->db->where('moneyId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function get_one_info($id) {
        $this->db->select();
        $this->db->from('upload');
        $this->db->where('uploadId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function get_one_info2($array) {
        $this->db->select();
        $this->db->from('upload');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function get_num($array) {
        $this->db->from('upload');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function delete_one_info($id) {
        $this->db->where('uploadId', $id);
        $this->db->delete('upload');
    }

}

?>
