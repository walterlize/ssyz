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
            <form method="post" action="<?= base_url() ?>index.php/manager/upload/uploadfile/<?= $yearMoney->yearMoneyId ?>/<?= $yearMoney->subjectId ?>/2" enctype="multipart/form-data" />

            <tr>
                <td class="td1" style="width: 123px">年度经费支出情况文字说明</td>
                <td class="td1" style="width: 123px">文件选择<?php if (isset($isuploaded)) echo($isuploaded); ?>
                    <input type="hidden" name="moneyId" id="moneyId" value="<?= $yearMoney->yearMoneyId ?>" />
                    <input type="hidden" name="uploadId" id="uploadId" value="<?= $uploadId ?>" />
                    <input type="hidden" name="type" id="type" value="<?= $type ?>" />
                    <input type="hidden" name="subjectId" id="subjectId" value="<?= $subjectId ?>" />
                </td>

                <td class="td2">          	
                    <input type="file" name="userfile" size="40" />
                    <input type="submit" value="上 传" class="input"/>
                    <input  style="<?=$show4?>" type="button" name="btnReturn" value="删 除" onclick="javascript:if(confirm('您确定要删除?'))window.location.href='<?= base_url() ?>index.php/manager/upload/delete/<?=$uploadId?>/<?= $yearMoney->subjectId ?>';" id="btnReturn" class="input" />
            </tr>
            <tr>
                <td colspan="3" class="td2"><font color="#FF0000">上传</font>文件之后，可以&nbsp;<a href="<?php if (isset($url)) echo $url; ?>" target="_blank"><font size="+1">点击此处</font></a>&nbsp;下载已上传的文件</td>
            </tr>

            </form>
        </table>


     
    </body>
</html>
