<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Download extends CI_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('array');
        $this->load->library('pagination');
        ini_set('max_execution_time', '0');
        date_default_timezone_set('PRC');
    }

    // 下载
    function downloadfile() {
        $year = $this->uri->segment(3);

        $folder = $this->uri->segment(4);
        $folder = iconv("utf-8", "gbk", $folder);
        $name = $this->uri->segment(5);
        $name = iconv("utf-8", "gbk", $name);
        $file_dir = getcwd() . "/upload/$year/$folder/";

        if (!file_exists($file_dir . $name)) {
            Header("Content-type: text/html; charset=utf-8");
            echo $file_dir . $name . "<br>";
            echo "文件不存在！";
            exit;
        } else {
            $file = fopen($file_dir . $name, "r");
            Header("Content-type: application/octet-stream");
            Header("Accept-Ranges: bytes");
            Header("Accept-Length: " . filesize($file_dir . $name));
            Header("Content-Disposition: attachment; filename=" . $name);
            echo fread($file, filesize($file_dir . $name));
            fclose($file);
        }
    }

    // 下载提供的文件
    function downloadcommonfile() {
        $folder = $this->uri->segment(3);
        $folder = iconv("utf-8", "gbk", $folder);
        $name = $this->uri->segment(4);
        $name = iconv("utf-8", "gbk", $name);
        $file_dir = getcwd() . "./$folder/";

        if (!file_exists($file_dir . $name)) {
            Header("Content-type: text/html; charset=utf-8");
            echo $file_dir . $name . "<br>";
            echo "文件不存在！";
            exit;
        } else {
            $file = fopen($file_dir . $name, "r");
            Header("Content-type: application/octet-stream");
            Header("Accept-Ranges: bytes");
            Header("Accept-Length: " . filesize($file_dir . $name));
            Header("Content-Disposition: attachment; filename=" . $name);
            echo fread($file, filesize($file_dir . $name));
            fclose($file);
        }
    }

}

?>