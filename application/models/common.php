<?php

class common extends CI_Model {

    // 获取专家类别
    function getExpertType() {
        $data = array(
           // array('type' => 'Chief', 'name' => '首席'),
            array('type' => 'Leader', 'name' => '组长'),
            array('type' => 'Member', 'name' => '成员'),
            array('type' => 'Assistance', 'name' => '秘书')
            );
        return $data;
    }

    // 获取论文类别
    function getPaperType() {
        $data = array('期刊', '国内会议', '国际会议', '其他');
        return $data;
    }

    // 获取论文收录情况
    function getPaperRecord() {
        $data = array('SCI', 'EI', 'ISTP', '一级学报', '核心期刊', '其他');
        return $data;
    }

    // 获取论著收录情况
    function getBookType() {
        $data = array('著', '编著', '编', '其他');
        return $data;
    }

    // 获取论著收录情况
    function getPatentType() {
        $data = array('发明专利', '实用新型', '外观', '其他');
        return $data;
    }

    // 获取论著收录情况
    function getPatentState() {
        $data = array('授权', '受理', '实质审查', '其他');
        return $data;
    }

    // 获取标准类型
    function getStandardType() {
        $data = array('国家标准', '行业标准', '地方标准', '企业标准', '其他');
        return $data;
    }

    // 获取报告类型
    function getReportType() {
        $data = array('年度报告', '调研报告', '研究报告', '其他');
        return $data;
    }

    // 获取获奖类型
    function getAwardType() {
        $data = array('科技进步奖', '推广奖', '神农奖', '其他');
        return $data;
    }

    // 获取获奖级别
    function getAwardGrade() {
        $data = array('国家级', '省部级', '部门行业', '地方', '其他');
        return $data;
    }

    // 获取获奖等级
    function getAwardLevel() {
        $data = array('特等奖', '一等奖', '二等奖', '三等奖', '其他');
        return $data;
    }

    // 获取获奖状态
    function getAwardState() {
        $data = array('受理', '初评', '授奖', '其他');
        return $data;
    }
 // 获取获奖状态
    function getYear() {
        $data = array('2012','2013', '2014', '2015', '2016', );
        return $data;
    }
     // 获取获奖状态
    function getMonth() {
        $data = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12');
        return $data;
    }
    
    
    // 获取文件上传类型
    function  get_upload_type()
    {
        $data = array(
            array('type'=>'image', 'name'=>'本人免冠近照', 'shortname' => '照片'),
            array('type'=>'card', 'name'=>'本人身份证(正反面)', 'shortname' => '身份证'),
            array('type'=>'hukou', 'name'=>'户口本首页(集体户口首页)', 'shortname' => '户口本首页'),
            array('type'=>'selfpage', 'name'=>'户口本人所在页', 'shortname' => '户口本人所在页'),
            array('type'=>'letters', 'name'=>'带签名的同行专家推荐信(2-3封)', 'shortname' => '推荐信'),
            array('type'=>'degreebook', 'name'=>'最高学位证书', 'shortname' => '学位证书'),
            array('type'=>'educationbook', 'name'=>'最高学历证书', 'shortname' => '学历证书'),
            array('type'=>'report', 'name'=>'成绩单(应届毕业生需上传)', 'shortname' => '成绩单'),
            array('type'=>'zhicheng', 'name'=>'职称证明', 'shortname' => '职称证明'),
            array('type'=>'other', 'name'=>'其他', 'shortname' => '其他'),
            array('type'=>'ppt', 'name'=>'面试PPT', 'shortname' => 'PPT')
        );
        return $data;
    }
}

?>
