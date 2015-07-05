<?php

class m_travel extends CI_Model {

    var $t_id = '';
    var $s_id = '';
    var $code = '';
    var $type = '';
    var $name = '';
    var $peopleNum = '';
    var $date = '';
    var $year = '';
    var $month = '';
    var $date3 = '';
    var $date4 = '';
    var $date5 = '';
    var $date6 = '';
    var $outDate = '';
    var $backDate = '';
    var $days = '';
    var $reason = '';
    var $destination = '';
    var $trainMoney = '';
    var $trainMoneyNum = '';
    var $planeMoney = '';
    var $planeMoneyNum = '';
    var $otherTravelMoney = '';
    var $otherTravelMoneyNum = '';
    var $accommodationNum = '';
    var $otherMoneyNum = '';
    var $accommodation = '';
    var $otherMoney = '';
    var $otherDetail = '';
    var $subsidy = '';
    var $totalMoney = '';
    var $num = '';
    var $description = '';
    var $remark = '';
    var $state = '';

    function saveInfo() {
        $trainMoney = $this->input->post('trainMoney');
        $planeMoney = $this->input->post('planeMoney');
        $otherTravelMoney = $this->input->post('otherTravelMoney');
        $accommodation = $this->input->post('accommodation');
        $otherMoney = $this->input->post('otherMoney');
        $subsidy = $this->input->post('subsidy');
        $trainMoneyNum = $this->input->post('trainMoneyNum');
        $planeMoneyNum = $this->input->post('planeMoneyNum');
        $otherTravelMoneyNum = $this->input->post('otherTravelMoneyNum');
        $accommodationNum = $this->input->post('accommodationNum');
        $otherMoneyNum = $this->input->post('otherMoneyNum');
        $this->t_id = $this->input->post('t_id');
        $this->s_id = $this->input->post('s_id');
        $this->type = $this->input->post('type');
        $this->name = $this->input->post('name');
        $this->peopleNum = $this->input->post('peopleNum');
        $this->date = date("Y-m-d");
        $this->year = date("Y");
        $this->month = date("m");
        $this->outDate = $this->input->post('outDate');
        $this->backDate = $this->input->post('backDate');
        $this->days = $this->input->post('days');
        $this->reason = $this->input->post('reason');
        $this->destination = $this->input->post('destination');
        $this->trainMoney = $this->input->post('trainMoney');
        $this->trainMoneyNum = $this->input->post('trainMoneyNum');
        $this->planeMoney = $this->input->post('planeMoney');
        $this->planeMoneyNum = $this->input->post('planeMoneyNum');
        $this->otherTravelMoney = $this->input->post('otherTravelMoney');
        $this->otherTravelMoneyNum = $this->input->post('otherTravelMoneyNum');
        $this->accommodationNum = $this->input->post('accommodationNum');
        $this->otherMoneyNum = $this->input->post('otherMoneyNum');
        $this->accommodation = $this->input->post('accommodation');
        $this->otherMoney = $this->input->post('otherMoney');
        $this->otherDetail = $this->input->post('otherDetail');
        $this->subsidy = $this->input->post('subsidy');
        $this->totalMoney = $trainMoney + $planeMoney + $otherTravelMoney + $accommodation + $otherMoney + $subsidy;
        $this->num = $trainMoneyNum + $planeMoneyNum + $otherTravelMoneyNum + $accommodationNum + $otherMoneyNum;
        $this->description = $this->input->post('description');
        $this->remark = $this->input->post('remark');
        $this->state = $this->input->post('state');
        $id = $this->t_id;
        if ($id == 0) {
            $this->db->insert('travel', $this);
            $id = $this->db->insert_id();
        } else {
            $this->db->update('travel', $this, array('t_id' => $this->t_id));
        }
        return $id;
    }

    function getOneInfo($id) {
        $this->db->select();
        $this->db->from('travel');
        $this->db->where('t_id', $id);
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
    //分页查询除所有的差旅报销信息
    function getTravelS($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "desc");
        $q = $this->db->get('travel', $per_page, $offset);
        return $q->result();
    }
    //查询除所有的差旅报销信息--分类别
    function getTravelS_1($array,$offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "desc");
        $q = $this->db->get('travel',$offset);
        return $q->result();
    }
    //管理员分页获取全部差旅报销
    function getTravelMange($array, $per_page, $offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where('state >', 2);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "desc");
        $q = $this->db->get('lz_travel_detail', $per_page, $offset);
        return $q->result();
    }
    //管理员获取不同类别差旅报销--不分页
    function getTravelMange_1($array,$offset) {
        $this->db->select();
        $this->db->where($array);
        $this->db->where('state >', 2);
        $this->db->order_by("state", "asc");
        $this->db->order_by("date", "desc");
        $q = $this->db->get('lz_travel_detail', $offset);
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
        $this->db->update('travel', $check, array('t_id' => $id));
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
        $this->db->update('travel', $check, array('t_id' => $id));
        return $id;
    }

    function getNum($array) {
        $this->db->from('travel');
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function getNumManage($array) {
        $this->db->from('lz_travel_detail');
        $this->db->where('state >', 2);
        $this->db->where($array);
        return $this->db->count_all_results();
    }

    function update($id, $array) {

        $this->db->where('t_id', $id);
        $this->db->update('travel', $array);
    }

    function submit($id) {
        $travel = array(
            'state' => '2',
            'date' => date("Y-m-d")
        );
        /*  if ($id == null) {
          show_404();
          } */
        $this->db->update('travel', $travel, array('t_id' => $id));
    }

    function delete($id) {
        $this->db->where('t_id', $id);
        $this->db->delete('travel');
    }

    function getSubjectId($array) {
        $this->db->select('subjectId');
        $this->db->where($array);

        $q = $this->db->get('totalmoney');
        return $q->result();
    }

    // 获取审核状态
    /*   function getState($state) {
      switch ($state) {
      case 1:
      return "草稿";
      case 2:
      return "已提交";
      case 3:
      return "收到发票";
      case 4:
      return "钱已汇";
      case 5:
      return "钱收到，报销完成";
      case 6:
      return "有误，请重新申报";
      }
      }
     */

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