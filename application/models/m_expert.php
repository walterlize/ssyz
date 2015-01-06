<?php

class m_expert extends CI_Model {

    var $expertId = '';
    var $name = '';
    var $type = '';
    var $firm = '';
    var $title = '';
    var $email = '';
    var $subjectId = '';
    var $remark = '';

    function saveInfo() {
        $this->expertId = $this->input->post('expertId');
        $this->name = $this->input->post('name');
        $this->type = $this->input->post('type');
        $this->firm = $this->input->post('firm');
        $this->title = $this->input->post('title');
        $this->email = $this->input->post('email');
        $this->subjectId = $this->input->post('subjectId');
        $this->remark = $this->input->post('remark');

        $id = $this->expertId;
        if ($id == 0) {
            $this->db->insert('expert', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('expert', $this, array('expertId' => $this->expertId));
        }
        return $id;
    }

    function getExpert($array) {
        $this->db->select();
        $this->db->from('expert');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getExperts($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('expert', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('expert');
        $this->db->where('expertId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum() {
        $this->db->from('expert');
        return $this->db->count_all_results();
    }

    function delete($id) {
        $this->db->where('expertId', $id);
        $this->db->delete('expert');
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
        }
    }

}

?>
