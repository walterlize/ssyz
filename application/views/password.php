<div style="margin-left:20px; margin-right:20px; width:70%">
<br />
<div class="title_lee">更改密码</div>
<form name="form1" method="post" action="<?=base_url()?>index.php/user/changePassword" id="form1">
<table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1" style="width: 179px">
                旧密码</td>
            <td class="td2">
                <input name="oldpassword" type="password" value="" id="oldpassword" isRequired="true" onblur="check_password('oldpassword', 'oldpass', '<?=base_url()?>index.php/user/passwordCheck')"/>
                <font color="red">*</font> <span id="oldpasswordMsg" class="MsgHide">旧密码不能为空！</span>
                <span id="oldpass"></span>
            </td>
        </tr>
        <tr>

            <td class="td1" style="width: 179px">
                新密码</td>
            <td class="td2">
                <input name="newpassword" type="password" value="" id="newpassword" isRequired="true" onblur="valid_password('newpassword', 'newpassValid')" />
                <font color="red">*</font> <span id="newpasswordMsg" class="MsgHide">新密码不能为空！</span>
                <span id="newpassValid">请使用字母和数字的组合，长度在6-20之间</span>
            </td>
        </tr>
        <tr>
            <td class="td1" style="width: 179px">
                再次输入新密码</td>
            <td class="td2">
              <input name="newpassword2" type="password" value="" id="newpassword2" isrequired="true"  onblur="check_next_password('newpassword', 'newpassword2', 'newpass2Valid')"/>
            <font color="red">*</font> <span id="newpassword2Msg" class="MsgHide">再次输入密码不能为空！</span>
            <span id="newpass2Valid">请使用字母和数字的组合，长度在6-20之间</span>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2" class="td3">
                <input type="submit" name="btnSave" value="确 定" onclick="return check('form1')&&check_next_password('newpassword', 'newpassword2', 'newpass2Valid');" id="btnSave" class="input" />
                <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/user/password';" id="btnCancel" class="input" />
            </td>
        </tr>

    </table>
    <br />
    <?=$result?>
</form>
<p>&nbsp;</p>

</div>
