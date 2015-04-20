<?php

class m_baoxiao extends CI_Model {

    var $bao_id = '';
    var $date = '';
    var $year = '';
    var $month = '';
    var $date3 = '';
    var $date4 = '';
    var $date5 = '';
    var $date6 = '';
    var $type = '';
    var $baoxiaoDetail = '';
    var $num = '';
    var $money = '';
    var $equipment = '';
    var $material = '';
    var $experiment = '';
    var $fuel = '';
    var $conference = '';
    var $international = '';
    var $information = '';
    var $service = '';
    var $consultative = '';
    var $other = '';
    var $ji_xiao = '';
    var $baoxiao_name = '';
    var $description = '';
    var $state = '';
    var $remark = '';
    var $remark2 = '';

    function saveInfo() {
        $this->bao_id = $this->input->post('bao_id');
        $this->s_id = $this->input->post('s_id');
        $this->type = $this->input->post('type');
        $this->date = date("Y-m-d");
        $this->year = date("Y");
        $this->month = date("m");
        $this->baoxiaoDetail = $this->input->post('baoxiaoDetail');
        $this->money = $this->input->post('money');
        $this->num = $this->input->post('num');
        $this->baoxiao_name = $this->input->post('baoxiao_name');
        $this->description = $this->input->post('description');

        $this->state = $this->input->post('state');

        $id = $this->bao_id;
        if ($id == 0) {
            $this->db->insert('baoxiao', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('baoxiao', $this, array('bao_id' => $this->bao_id));
        }
        return $id;
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('baoxiao');
        $this->db->where('bao_id', $id);
        $q = $this->db->get();
        return $q->result();
    }
    function getOneInfo_search($array) {
        $this->db->select();
        $this->db->from('lz_baoxiao_detail');
        $this->db->where($array);
        //$this->db->where('state >', 2);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo1($subjectId) {
        $this->db->select();
        $this->db->from('lz_money_total');
        $this->db->where('subjectId', $subjectId);
        $q = $this->db->get();
        return $q->result();
    }

    function getBaoxiaoS($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "desc");
        $q = $this->db->get('baoxiao', $per_page, $offset);
        return $q->result();
    }

    function getBaoxiaoMange($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where('state >', 2);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "desc");
        $q = $this->db->get('lz_baoxiao_detail', $per_page, $offset);
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('baoxiao');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function getNumManage($array) {
        $this->db->from('lz_baoxiao_detail');
        $this->db->where('state >', 2);
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function update($id, $array) {

        $this->db->where('bao_id', $id);
        $this->db->update('baoxiao', $array);
    }

    function submit($id) {
        $baoxiao = array(
            'state' => '2',
            'date' => date("Y-m-d")
        );
        /*  if ($id == null) {
          show_404();
          } */
        $this->db->update('baoxiao', $baoxiao, array('bao_id' => $id));
    }

    function check($id) {
        $check = array(
            'state' => $this->input->post('state'),
            'remark' => $this->input->post('remark'),
            'date3' => date("Y-m-d")
        );
        if ($id == null) {
            show_404();
        }
        $this->db->update('baoxiao', $check, array('bao_id' => $id));
        return $id;
    }

    function check2($id) {
        $check = array(
            'state' => $this->input->post('state'),
            'remark2' => $this->input->post('remark'),
            'date4' => date("Y-m-d")
        );
        if ($id == null) {
            show_404();
        }
        $this->db->update('baoxiao', $check, array('bao_id' => $id));
        return $id;
    }

    function delete($id) {
        $this->db->where('bao_id', $id);
        $this->db->delete('baoxiao');
    }

    function getSubjectId($array) {
        $this->db->select('subjectId');
        $this->db->where($array);

        $q = $this->db->get('totalmoney');
        return $q->result();
    }

    // 获取审核状态
    function getState($state) {
        switch ($state) {
            case 1:
                return "草稿";
            case 2:
                return "重新申报";
            case 3:
                return "已提交";
            case 4:
                return "收到发票";
            case 5:
                return "已报销";
        }
    }

    // 获取审核状态
    function getState1($state) {
        switch ($state) {
            case '草稿':
                return "1";
            case '重新申报':
                return "2";
            case '已提交':
                return "3";
            case '收到发票':
                return "4";
            case '已报销':
                return "5";
        }
    }

}

?>