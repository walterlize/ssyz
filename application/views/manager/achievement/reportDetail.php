<div style="margin-left:20px; margin-right:20px;">
<br />
<h3 class="title_lee">报告详细信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">报告名称</td>
      <td colspan="3" class="td2" ><?=$report->reportName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td colspan="3" class="td2" ><?=$report->author?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">审核日期</td>
      <td class="td2" style="width: 319px"><?=$report->time?>&nbsp;</td>
      <td class="td1" style="width: 111px">报告类型</td>
      <td class="td2"><?=$report->type?></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成单位</td>
      <td colspan="3" class="td2" ><?=$report->workplace?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td colspan="3" class="td2"><?=$report->remark?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/manager/report/reportEdit/<?=$report->reportId?>';" id="btnEdit" class="input" style="<?=$show?>" />
      	  <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/manager/report/reportDelete/<?=$report->reportId?>')" id="btnDelete" class="input" style="<?=$show?>" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/manager/report/reportList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>