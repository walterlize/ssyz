<div style="margin-left:20px; margin-right:20px;">
<br />
<h3>其他详细信息</h3>
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
      <td class="td1" style="width: 111px">状态</td>
      <td colspan="3" class="td2"><?=$demonstration->stateInfo?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	<input type="button" name="btnEdit" value="通 过" onclick="window.location.href='<?=base_url()?>index.php/admin/demonstration/updateDemonstrationState/<?=$demonstration->demonstrationId?>/2';" id="btnEdit" class="input"/>
      	  <input type="button" name="btnDelete" value="退 修" onclick="window.location.href='<?=base_url()?>index.php/admin/demonstration/updateDemonstrationState/<?=$demonstration->demonstrationId?>/1';" id="btnDelete" class="input" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/demonstration/demonstrationList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>