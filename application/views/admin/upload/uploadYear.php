<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>无标题文档</title>
        <link href="<?= base_url(); ?>css/candidate_style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>    
        <br />
        <table cellpadding="0" cellspacing="1" class="tablist2">
                <form method="post" action="<?= base_url() ?>index.php/manager/upload/uploadfile/<?=$money->yearMoneyId?>/<?=$money->subjectId?>" enctype="multipart/form-data" />

                <tr>
                    <td class="td1" style="width: 123px">文件选择<?php if (isset($isuploaded)) echo($isuploaded); ?>
                 
                 
               
                    <td colspan="2" class="td2" style="<?=$show4?>"><a href="<?php if (isset($url)) echo $url; ?>" target="_blank"><font size="+1">点击此处</font></a>&nbsp;下载已上传的文件</td>
                </tr>
               
                </form>
            </table>


       
    </body>
</html>
