<div style="margin-left:20px; margin-right:20px">
<br />
<div class="title_lee">联系我们编辑</div>
<form name="form1" method="post" action="<?=base_url()?>index.php/admin/contact/save" id="form1">
<input type="hidden" value="<?=$contact->contactId?>" name="contactId" id="contactId" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">负责人姓名</td>
      <td class="td2" ><input name="personName" type="text" id="personName" value="<?=$contact->personName?>" size="50"  isRequired="true" />
      <font color="red">*</font><span id="personNameMsg" class="MsgHide">负责人姓名不能为空！</span></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">电子邮箱</td>
      <td class="td2" ><input name="email" type="text" id="email" value="<?=$contact->email?>" size="50"  isRequired="true"  validEnum="Email"/>
      <font color="red">*</font><span id="emailMsg" class="MsgHide">电子邮箱不能为空！</span></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">所在单位</td>
      <td class="td2" ><input name="firm" type="text" id="firm" value="<?=$contact->firm?>" size="50"  isRequired="true" />
      <font color="red">*</font><span id="firmMsg" class="MsgHide">所在单位不能为空！</span></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td class="td2">
	  	<textarea name="remark" id="remark" cols="50" rows="5"><?=$contact->remark?></textarea> </td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	  <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/admin/contact/contactDetail/<?=$contact->contactId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />      </td>
    </tr>
  </table>
  </form>
 </div>