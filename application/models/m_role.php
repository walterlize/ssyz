<?php
class m_role extends CI_Model{

    var $roleId = '';
    var $roleName = '';
    var $roleType = '';
    var $remark = '';

    function saveInfo(){
        $this->roleId = $this->input->post('roleId');
        $this->roleName = $this->input->post('roleName');
        $this->roleType = $this->input->post('roleType');
        $this->remark = $this->input->post('remark');

        $id = $this->roleId;
        if($id == 0){
            $this->db->insert('roles', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('roles', $this, array('roleId' => $this->roleId));
        }
        return $id;
    }

    function getRole($array){
        $this->db->select();
        $this->db->from('roles');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getRoles($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("roleType", "asc");
        $q = $this->db->get('roles', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('roles');
        $this->db->where('roleId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('roles');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function update($id, $array){
        $this->db->where('roleId', $id);
        $this->db->update('roles', $array);
    }
}
?>
