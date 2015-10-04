<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv=X-UA-Compatible content=IE=EmulateIE7 />
        <title><?= $title ?></title>
        <link href="<?= base_url(); ?>css/index.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="<?= base_url(); ?>/images/admin/ssyz.ico" >
        <script src="<?= base_url(); ?>javascript/jquery.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>javascript/JQuery.MenuTree.js" type="text/javascript"></script>
        <script src="<?= base_url(); ?>javascript/update8.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(function () {
                $('#left_menu').menuTree();
            });
        </script>
    </head>

    <body>
        <div align="center">
            <div class="top"></div>
        </div>
        <div class="daohangword">
            <div align="center">
                <div class="daohang" id="allwd">
                    <div class="daohangword"><a href="<?= base_url() ?>">首页</a></div>
                    <div class="daohangword"><a href="<?= base_url() ?>index.php/head/subject/project/1">课题简介</a></div>
                    <div class="daohangword"><a href="<?= base_url() ?>index.php/head/subject/project/2">课题设置</a></div>
                    <div class="daohangword"><a href="<?= base_url() ?>index.php/head/paper/paperList">研究成果</a></div>
                    <div class="daohangword"><a href="<?= base_url() ?>index.php/head/trend/zhengce">政策规定</a></div>
                    <div class="daohangword"><a href="mailto:lize@cau.edu.cn">联系我们</a></div>
                </div>
            </div>
        </div>


