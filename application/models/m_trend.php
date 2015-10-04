<?php

class m_trend extends CI_Model {

    var $trendId = '';
    var $trendName = '';
    var $trendType = '';
    var $trendAuthor = '';
    var $time = '';
    var $content = '';
    var $linkNum = '';
    var $trendTop = '';
    var $subject = '';
    var $publisherRole = '';
    var $state = '';

    function saveInfo() {
        $this->trendId = $this->input->post('trendId');
        $this->trendName = $this->input->post('trendName');
        $this->trendType = $this->input->post('trendType');
        $this->trendAuthor = $this->input->post('trendAuthor');
        $this->time = date('Y-m-d');
        $this->content = $this->input->post('content');
        $this->linkNum = $this->input->post('linkNum');
        $this->trendTop = $this->input->post('trendTop');
        $this->subject = $this->input->post('subject');
        $this->publisherRole = $this->input->post('publisherRole');
        $this->state = $this->input->post('state');

        $id = $this->trendId;
        if ($id == 0) {
            $this->db->insert('trend', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('trend', $this, array('trendId' => $this->trendId));
        }
        return $id;
    }

    function getTrend($array) {
        $this->db->select();
        $this->db->from('trend');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('trend');
        $this->db->where('trendId', $id);
        $q = $this->db->get();
        return $q->result();
    }

    function getTrends($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("state", "asc");
        $this->db->order_by("trendTop", "desc");
         
        $this->db->order_by("time", "desc");
        $this->db->order_by("trendId", "desc");
        $q = $this->db->get('trend', $per_page, $offset);
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('trend');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function getNum1($array) {
        $this->db->from('trend');
        $this->db->where($array);
        $this->db->where('state', 2);
        return $this->db->count_all_results();
    }

    function updateTrend($id, $array) {
        $this->db->where('trendId', $id);
        $this->db->update('trend', $array);
    }

    function updateLinkNum($id) {
        $this->db->where('trendId', $id);
        $this->db->set('linkNum', 'linkNum+1', false);
        $this->db->update('trend');
    }

    function delete($id) {
        $this->db->where('trendId', $id);
        $this->db->delete('trend');
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