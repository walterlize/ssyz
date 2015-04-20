<?php

class m_laowu extends CI_Model {

    var $laowu_id = '';
    var $s_id = '';
    var $code = '';
    var $year = '';
    var $month = '';
    var $type = '';
    var $date = '';
    var $date2 = '';
    var $date3 = '';
    var $date4 = '';
    var $date5 = '';
    var $date6 = '';
    var $peopleNum = '';
    var $money = '';
    var $tax = '';
    var $upload = '';
    var $description = '';
    var $service = '';
    var $consultative = '';
    var $remark = '';
    var $state = '';

    function saveInfo() {
        $this->laowu_id = $this->input->post('laowu_id');
        $this->s_id = $this->input->post('s_id');
        $this->year = date("Y");
        $this->month = date("m");
        $this->date = date("Y-m-d");
        $this->type = $this->input->post('type');
        $this->money = $this->input->post('money');
        $this->tax = $this->input->post('tax');
        $this->peopleNum = $this->input->post('peopleNum');
        $this->description = $this->input->post('description');
        $this->state = $this->input->post('state');

        $id = $this->laowu_id;
        if ($id == 0) {
            $this->db->insert('laowu', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('laowu', $this, array('laowu_id' => $this->laowu_id));
        }
        return $id;
    }

    function getTotalMoney($array) {
        $this->db->select();
        $this->db->from('lz_money_total');
        $this->db->where($array);
        $q = $this->db->get();
        return $q->result();
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('laowu');
        $this->db->where('laowu_id ', $id);
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

    function getLaowuS($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "desc");
        $q = $this->db->get('laowu', $per_page, $offset);
        return $q->result();
    }

    function getNum($array) {
        $this->db->from('laowu');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function update($id, $array) {
        $this->db->where('laowu_id', $id);
        $this->db->update('laowu', $array);
    }

    function delete($id) {
        $this->db->where('laowu_id', $id);
        $this->db->delete('laowu');
    }

    function getSubjectId($array) {
        $this->db->select('subjectId');
        $this->db->where($array);

        $q = $this->db->get('totalmoney');
        return $q->result();
    }

    function getLaowuMange($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where('state >', 2);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "desc");
        $q = $this->db->get('lz_laowu_detail', $per_page, $offset);
        return $q->result();
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
        $this->db->update('laowu', $check, array('laowu_id' => $id));
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
        $this->db->update('laowu', $check, array('laowu_id' => $id));
        return $id;
    }

    function getNumManage($array) {
        $this->db->from('lz_laowu_detail');
        $this->db->where('state >', 2);
        $this->db->where($array);
        return $this->db->count_all_results();
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
                return "完成";
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
            case '完成':
                return "4";
            case '收到发票':
                return "5";
        }
    }

}

?>