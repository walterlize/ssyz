<?php

class M_choice extends CI_Model {

    public function __construct() {
        $this->load->database();
        $this->load->library('session');
    }

// 获取报销类别
    function getBaoxiaoType() {
        $data = array('设备费', '材料费', '测试化验加工费', '燃料动力费', '差旅费','国际合作交流费', '会议费',  '出版/文献/信息传播/知识产权事务费', '劳务费', '专家咨询费',  '其它', '间接经费','间接经费-用于绩效');
        return $data;
    }

// 获取劳务费专家咨询费类别
    function getLaowuType() {
        $data = array('劳务费', '专家咨询费');
        return $data;
    }

// 获取差旅费类别
    function getTravelType() {
        $data = array('差旅费', '国际合作交流费');
        return $data;
    }

    // 获取差旅费类别
    function getTravelType1() {
        $data = array('国内差旅', '国际差旅');
        return $data;
    }

// 获取汇款或支票类别
    function getType() {
        $data = array('汇款', '支票');
        return $data;
    }

// 获取借款或汇款时候的类别
    function getBorrowType() {
        $data = array('实验试剂及耗材', '国内机票', '国际机票', '仪器设备', '办公设备', '测试合成费', '实验费', '版面费', '复印费', '印刷费', '住宿费', '参会费', '会议费', '租车费', '租赁费', '维修、配件费', '图书费', '电费', '水费', '其他');
        return $data;
    }

//获取搜索的年
    function getSearchYear() {
        $data = array('2014', '2015', '2016', '2017');
        return $data;
    }

//获取搜索的月
    function getSearchMonth() {
        $data = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
        return $data;
    }

// 获取报销状态
    function getBaoxiaoState() {
        $data = array('草稿', '已提交', '收到发票', '已报销', '重新申报');
        return $data;
    }

// 获取报销状态
    function getBaoxiaoState1() {
        $data = array('已提交', '收到发票', '已报销');
        return $data;
    }
    // 获取报销状态
    function getBorrowState() {
        $data = array('已提交', '收到', '完成');
        return $data;
    }

    // 获取中国农大报销单位
    function getBaoxiaoUnit() {
        $data = array('中国农业大学账户', '内蒙古农业大学', '北京农业信息技术研究中心', '北京德青源农业科技股份有限公司', '中国农大学孟老师团队', '中国农大学劳老师团队', '中国农大学赵老师团队', '中国农大学陈刚老师团队');
        return $data;
    }

}
