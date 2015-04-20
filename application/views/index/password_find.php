
<div align="center">
    <link href="<?= base_url(); ?>css/candidate_style.css" rel="stylesheet" type="text/css" />

    <br />
       <div class="title_lee">找回密码</div>
    <div style="width:68%;height:440px;">
        
        <script src="<?= base_url(); ?>javascript/validation.js" type="text/javascript"></script>
        <form name="form1" method="post" action="<?= base_url() ?>index.php/password/find" id="form1">
            <table cellpadding="0" cellspacing="1" class="tablist2" style="<?= $show ?>">
                <tr>
                    <td class="td1" style="width: 179px">
                        <font size="3px">邮箱地址:</font></td>
                    <td class="td2">
                        <input name="e_mail" type="text" value="" id="e_mail" isRequired="true" validEnum="Email"/>
                        <font color="red">*请输入预留的电子邮箱，密码将发送至电子邮箱。</font> <span id="e_mailMsg" class="MsgHide">邮箱地址不能为空或者格式错误！</span>
                        <span id="mail"><?= $check_mail ?></span></td>
                </tr>
                <tr>
                    <td align="center" colspan="2" class="td3">
                        <input type="submit" name="btnSave" value="确 定" onclick="return check('form1')" id="btnSave" class="input" />
                        <input type="button" name="btnCancel" value="取 消" onclick="window.location.href = '<?= base_url() ?>index.php';" id="btnCancel" class="input" />
                    </td>
                </tr>
             
            </table>
            <br />
           
        </form></div>
</div>
