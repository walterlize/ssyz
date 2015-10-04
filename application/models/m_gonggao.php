<?php

class m_gonggao extends CI_Model {

    var $gonggaoId = '';
    var $title = '';
    var $type = '';
    var $author = '';
    var $date = '';
    var $content = '';
    var $linkNum = '';
    var $gonggaoTop = '';
    var $state = '';

    function saveInfo() {
        $this->gonggaoId = $this->input->post('gonggaoId');
        $this->title = $this->input->post('title');
        $this->type = $this->input->post('type');
        $this->author = $this->input->post('author');
        $this->date = date('Y-m-d');
        $this->content = $this->input->post('content');
        $this->linkNum = $this->input->post('linkNum');
        $this->gonggaoTop = $this->input->post('gonggaoType');
        $this->state = $this->input->post('state');

        $id = $this->gonggaoId;
        if ($id == 0) {
            $this->db->insert('gonggao', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('gonggao', $this, array('gonggaoId' => $this->gonggaoId));
        }
        return $id;
    }

    function getGonggao($array) {
        $this->db->select();
        $this->db->from('gonggao');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('gonggao');
        $this->db->where('gonggaoId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getGonggaos($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("state", "asc");
        $this->db->order_by("gonggaoTop", "desc");
         
        $this->db->order_by("date", "desc");
        $this->db->order_by("gonggaoId", "desc");
        $q = $this->db->get('gonggao', $per_page, $offset);
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('gonggao');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function getNum1($array) {
        $this->db->from('gonggao');
        $this->db->where($array);
        $this->db->where('state', 2);
        return $this->db->count_all_results();
    }

    function updateGonggao($id, $array) {
        $this->db->where('gonggaoId', $id);
        $this->db->update('gonggao', $array);
    }

    function updateLinkNum($id) {
        $this->db->where('gonggaoId', $id);
        $this->db->set('linkNum', 'linkNum+1', false);
        $this->db->update('gonggao');
    }

    function delete($id) {
        $this->db->where('gonggaoId', $id);
        $this->db->delete('gonggao');
    }

    // 获取审核状态
    function getState($state) {
        switch ($state) {
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