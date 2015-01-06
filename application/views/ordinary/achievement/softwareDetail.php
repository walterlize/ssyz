<div style="margin-left:20px; margin-right:20px;">
<br />
<h3>软件著作权详细信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">软著名称</td>
      <td class="td2" ><?=$software->softwareName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td class="td2" ><?=$software->author?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">授权号</td>
      <td class="td2"><?=$software->authorizeNum?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">授权日期</td>
      <td class="td2"><?=$software->time?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成单位</td>
      <td class="td2" ><?=$software->workplace?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td class="td2"><?=$software->remark?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/manager/software/softwareEdit/<?=$software->softwareId?>';" id="btnEdit" class="input" style="<?=$show?>" />
      	  <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/manager/software/softwareDelete/<?=$software->softwareId?>')" id="btnDelete" class="input" style="<?=$show?>" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/manager/software/softwareList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>