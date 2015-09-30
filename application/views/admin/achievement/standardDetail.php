<div style="margin-left:20px; margin-right:20px;">
<br />
<h3 class="title_lee">标准详细信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">标准名称</td>
      <td colspan="3" class="td2" ><?=$standard->standardName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td colspan="3" class="td2" ><?=$standard->author?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">审核日期</td>
      <td class="td2" style="width: 319px"><?=$standard->time?>&nbsp;</td>
      <td class="td1" style="width: 111px">标准类型</td>
      <td class="td2"><?=$standard->type?></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成单位</td>
      <td colspan="3" class="td2"><?=$standard->workplace?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">标准简介</td>
      <td colspan="3" class="td2"><?=$standard->introduction?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td colspan="3" class="td2"><?=$standard->remark?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">状态</td>
      <td colspan="3" class="td2"><?=$standard->stateInfo?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	<input type="button" name="btnEdit" value="通 过" onclick="window.location.href='<?=base_url()?>index.php/admin/standard/updateStandardState/<?=$standard->standardId?>/2';" id="btnEdit" class="input"/>
      	  <input type="button" name="btnDelete" value="退 修" onclick="window.location.href='<?=base_url()?>index.php/admin/standard/updateStandardState/<?=$standard->standardId?>/1';" id="btnDelete" class="input" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/standard/standardList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>