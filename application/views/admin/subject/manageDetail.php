<div style="margin-left:20px; margin-right:20px;">
<br />
<div class="title_lee">课题执行专家组详情</div>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">姓名</td>
      <td class="td2" ><?=$name?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">类别</td>
      <td class="td2" ><?=$manageType?>&nbsp;</td>
    </tr>
 
    <tr>
      <td class="td1" style="width: 111px">职称</td>
      <td class="td2"><?=$title?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">邮箱地址</td>
      <td class="td2"><?=$email?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">参与子课题</td>
      <td class="td2" ><?=$subjectName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td class="td2"><?=$remark?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/admin/manage/manageEdit/<?=$manageId?>';" id="btnEdit" class="input" />
        <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/admin/manage/manageDelete/<?=$manageId?>')" id="btnDelete" class="input" />
      	  <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/manage/manageList';" id="btnReturn" class="input" />      </td>
    </tr>
  </table>
 </div>