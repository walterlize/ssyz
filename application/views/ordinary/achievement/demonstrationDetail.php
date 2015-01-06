<div style="margin-left:20px; margin-right:20px;">
<br />
<h3>应用示范详细信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">示范内容简介</td>
      <td class="td2" ><?=$demonstration->introduction?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">示范技术</td>
      <td class="td2" ><?=$demonstration->technique?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">地点</td>
      <td class="td2"><?=$demonstration->place?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">辐射区域</td>
      <td class="td2"><?=$demonstration->area?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td class="td2"><?=$demonstration->remark?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/manager/demonstration/demonstrationEdit/<?=$demonstration->demonstrationId?>';" id="btnEdit" class="input" style="<?=$show?>" />
      	  <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/manager/demonstration/demonstrationDelete/<?=$demonstration->demonstrationId?>')" id="btnDelete" class="input" style="<?=$show?>" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/manager/demonstration/demonstrationList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>