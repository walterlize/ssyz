<?php
class m_software extends CI_Model{

    var $softwareId = '';
    var $subjectId = '';
    var $state = '';
    var $softwareName = '';
    var $author = '';
    var $time = '';
    var $authorizeNum = '';
    var $workplace = '';
    var $remark = '';

    function saveInfo(){
        $this->softwareId = $this->input->post('softwareId');
        $this->subjectId = $this->input->post('subjectId');
        $this->state = $this->input->post('state');
        $this->softwareName = $this->input->post('softwareName');
        $this->author = $this->input->post('author');
        $this->authorizeNum = $this->input->post('authorizeNum');
        $this->time = $this->input->post('time');
        $this->workplace = $this->input->post('workplace');
        $this->remark = $this->input->post('remark');

        $id = $this->softwareId;
        if($id == 0){
            $this->db->insert('software', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('software', $this, array('softwareId' => $this->softwareId));
        }
        return $id;
    }

    function getSoftware($array){
        $this->db->select();
        $this->db->from('lz_software_subject');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getSoftwares($array, $per_page, $offset){
        $this->db->select();
        $this->db->where($array);
        $q = $this->db->get('lz_software_subject', $per_page, $offset);
        return $q->result();
    }

    function getOneInfo($id){
        $this->db->select();
        $this->db->from('lz_software_subject');
        $this->db->where('softwareId',  $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getNum($array){
        $this->db->from('lz_software_subject');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function updateInfo($id, $array){
        $this->db->where('softwareId', $id);
        $this->db->update('software', $array);
    }

    function delete($id){
        $this->db->where('softwareId',  $id);
        $this->db->delete('software');
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
