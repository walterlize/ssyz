<div style="margin-left:20px; margin-right:20px;">
<br />
<h3 class="title_lee">软件著作权详细信息</h3>
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
      <td class="td1" style="width: 111px">状态</td>
      <td colspan="3" class="td2"><?=$software->stateInfo?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	<input type="button" name="btnEdit" value="通 过" onclick="window.location.href='<?=base_url()?>index.php/admin/software/updateSoftwareState/<?=$software->softwareId?>/2';" id="btnEdit" class="input"/>
      	  <input type="button" name="btnDelete" value="退 修" onclick="window.location.href='<?=base_url()?>index.php/admin/software/updateSoftwareState/<?=$software->softwareId?>/1';" id="btnDelete" class="input" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/software/softwareList';" id="btnReturn" class="input" /> 
      </td>
    </tr>
  </table>
 </div>