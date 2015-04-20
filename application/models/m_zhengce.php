<?php

class m_zhengce extends CI_Model {

    var $z_id = '';
    var $title = '';
    var $content = '';
    var $date = '';
    var $type = '';
    var $state = '';

    function saveInfo() {
        $this->z_id = $this->input->post('z_id');
        $this->content = $this->input->post('content');
        $this->title = $this->input->post('title');
        $this->date = date("Y-m-d H:i:s");
        // $this->type = $this->input->post('email');
        //$this->remark = $this->input->post('remark');

        $id = $this->z_id;
        if ($id == 0) {
            $this->db->insert('zhengce', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('zhengce', $this, array('z_id' => $this->z_id));
        }
        return $id;
    }

    function getZhengce($array) {
        $this->db->select();
        $this->db->from('zhengce');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getZhengces($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('zhengce', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('zhengce');
        $this->db->where('z_id', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('zhengce');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateUserinfo($id, $array) {
        $this->db->where('z_id', $id);
        $this->db->update('zhengce', $array);
    }

    function delete($id) {
        $this->db->where('z_id', $id);
        $this->db->delete('zhengce');
    }

}

?>
