<div style="margin-left:20px; margin-right:20px;">
<br />
<h3 class="title_lee">其他详细信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">名称</td>
      <td class="td2" ><?=$other->otherName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">内容</td>
      <td class="td2" ><?=$other->content?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td class="td2"><?=$other->remark?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/manager/other/otherEdit/<?=$other->otherId?>';" id="btnEdit" class="input" style="<?=$show?>" />
      	  <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/manager/other/otherDelete/<?=$other->otherId?>')" id="btnDelete" class="input" style="<?=$show?>" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/manager/other/otherList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>