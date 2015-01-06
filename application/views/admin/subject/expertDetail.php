<div style="margin-left:20px; margin-right:20px;">
<br />
<h3>项目执行专家信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">姓名</td>
      <td class="td2" ><?=$name?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">类别</td>
      <td class="td2" ><?=$expertType?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">单位</td>
      <td class="td2" ><?=$firm?>&nbsp;</td>
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
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/admin/expert/expertEdit/<?=$expertId?>';" id="btnEdit" class="input" />
        <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/admin/expert/expertDelete/<?=$expertId?>')" id="btnDelete" class="input" />
      	  <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/expert/expertList';" id="btnReturn" class="input" />      </td>
    </tr>
  </table>
 </div>