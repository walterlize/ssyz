<?php

class m_user extends CI_Model {

    var $userId = '';
    var $userName = '';
    var $password = '';
    var $roleId = '';
    var $subjectId = '';
    //var $subjectUnit = '';
    var $state = '';

    function saveInfo() {
        $this->userId = $this->input->post('userId');
        $this->userName = $this->input->post('userName');
        $this->password = $this->input->post('password');
        $this->roleId = $this->input->post('roleId');
        $this->subjectId = $this->input->post('subjectId');
        // $this->subjectUnit = $this->input->post('subjectUnit');
        $this->state = $this->input->post('state');

        $id = $this->userId;
        if ($id == 0) {
            $this->db->insert('users', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('users', $this, array('userId' => $this->userId));
        }
        return $id;
    }

    function getUser($array) {
        $this->db->select();
        $this->db->from('lz_user_role_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getUsers($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("roleId", "asc");
        $q = $this->db->get('lz_user_role_subject', $per_page, $offset);
        return $q->result();
    }
      function getUsers1($per_page, $offset,$array) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("roleId", "asc");
        $q = $this->db->get('lz_user_role_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('lz_user_role_subject');
        $this->db->where('userId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('lz_user_role_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateUserinfo($id, $array) {
        $this->db->where('userId', $id);
        $this->db->update('users', $array);
    }

    function delete($id) {
        $this->db->where('userId', $id);
        $this->db->delete('users');
    }

    // 获取审核状态
    function getState($state) {
        switch ($state) {
            case 0:
                return "已激活";
            case 1:
                return "已注销";
        }
    }

}

?>
