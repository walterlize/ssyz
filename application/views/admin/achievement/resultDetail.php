<div style="margin-left:20px; margin-right:20px;">
<br />
<h3 class="title_lee">鉴定成果详细信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">鉴定成果名称</td>
      <td class="td2" ><?=$result->resultName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td class="td2" ><?=$result->author?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">鉴定日期</td>
      <td class="td2"><?=$result->time?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成单位</td>
      <td class="td2"><?=$result->workplace?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">鉴定意见</td>
      <td class="td2" ><?=$result->opinion?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td class="td2"><?=$result->remark?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">状态</td>
      <td colspan="3" class="td2"><?=$result->stateInfo?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	<input type="button" name="btnEdit" value="通 过" onclick="window.location.href='<?=base_url()?>index.php/admin/result/updateResultState/<?=$result->resultId?>/2';" id="btnEdit" class="input"/>
      	  <input type="button" name="btnDelete" value="退 修" onclick="window.location.href='<?=base_url()?>index.php/admin/result/updateResultState/<?=$result->resultId?>/1';" id="btnDelete" class="input" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/result/resultList';" id="btnReturn" class="input" />
      </td>
    </tr>
  </table>
 </div>