<?php

class M_choice extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

// 获取性别
    function getType() {
        $data = array('设备费', '材料费','测试化验加工费', '燃料动力费','差旅费', '会议费','国际合作交流费', '出版/文献/信息传播/知识产权事务费','劳务费', '专家咨询','管理费', '其它');
        return $data;
    }

}

?>
