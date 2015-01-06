<?php
class m_demonstration extends CI_Model{

    var $demonstrationId = '';
    var $subjectId = '';
    var $state = '';
    var $introduction = '';
    var $technique = '';
    var $place = '';
    var $area = '';
    var $remark = '';

    function saveInfo(){
        $this->demonstrationId = $this->input->post('demonstrationId');
        $this->subjectId = $this->input->post('subjectId');
        $this->state = $this->input->post('state');
        $this->introduction = $this->input->post('introduction');
        $this->technique = $this->input->post('technique');
        $this->place = $this->input->post('place');
        $this->area = $this->input->post('area');
        $this->remark = $this->input->post('remark');

        $id = $this->demonstrationId;
        if($id == 0){
            $this->db->insert('demonstration', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('demonstration', $this, array('demonstrationId' => $this->demonstrationId));
        }
        return $id;
    }

    function getDemonstration($array){
        $this->db->select();
        $this->db->from('ws_demonstration_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getDemonstrations($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('ws_demonstration_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('ws_demonstration_subject');
        $this->db->where('demonstrationId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('ws_demonstration_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array){
        $this->db->where('demonstrationId', $id);
        $this->db->update('demonstration', $array);
    }

    function delete($id){
        $this->db->where('demonstrationId',  $id);
        $this->db->delete('demonstration');
    }

    // 获取审核状态
    function  getState($state){
        switch ($state){
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
