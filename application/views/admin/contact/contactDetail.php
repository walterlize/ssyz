<div style="margin-left:20px; margin-right:20px;">
<br />
<div class="title_lee">联系我们详情</div>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">负责人姓名</td>
      <td class="td2" ><?=$personName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">电子邮箱</td>
      <td class="td2" ><?=$email?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">所在单位</td>
      <td class="td2" ><?=$firm?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td class="td2"><?=$remark?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/admin/contact/contactEdit/<?=$contactId?>';" id="btnEdit" class="input" />
        <input type="button" name="btnDelete" value="删 除" onclick="window.location.href='<?=base_url()?>index.php/admin/contact/contactDelete/<?=$contactId?>';" id="btnDelete" class="input" />
      	  <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/contact/contactList';" id="btnReturn" class="input" />      </td>
    </tr>
  </table>
 </div>