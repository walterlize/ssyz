<?php

class m_manage extends CI_Model {

    var $manageId = '';
    var $name = '';
    var $type = '';
    var $firm = '';
    var $title = '';
    var $email = '';
    var $subjectId = '';
 

    function saveInfo() {
        $this->manageId = $this->input->post('manageId');
        $this->name = $this->input->post('name');
        $this->type = $this->input->post('type');
        $this->firm = $this->input->post('firm');
        $this->title = $this->input->post('title');
        $this->email = $this->input->post('email');
        $this->subjectId = $this->input->post('subjectId');
    

        $id = $this->manageId;
        if ($id == 0) {
            $this->db->insert('manage', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('manage', $this, array('manageId' => $this->manageId));
        }
        return $id;
    }

    function getManage($array) {
        $this->db->select();
        $this->db->from('manage');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getManages($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('manage', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('manage');
        $this->db->where('manageId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum() {
        $this->db->from('manage');
        return $this->db->count_all_results();
    }

    function delete($id) {
        $this->db->where('manageId', $id);
        $this->db->delete('manage');
    }

    // 获取审核状态
    function getType($type) {
        switch ($type) {
            case 'Chief':
                return "首席";
            case 'Leader':
                return "组长";
            case 'Member':
                return "成员";
            case 'Assistance':
                return "秘书";
        }
    }

}

?>
