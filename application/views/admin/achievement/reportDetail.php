<div style="margin-left:20px; margin-right:20px;">
<br />
<h3>报告详细信息</h3>
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
      <td class="td1" style="width: 111px">状态</td>
      <td colspan="3" class="td2"><?=$report->stateInfo?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	<input type="button" name="btnEdit" value="通 过" onclick="window.location.href='<?=base_url()?>index.php/admin/report/updateReportState/<?=$report->reportId?>/2';" id="btnEdit" class="input"/>
      	  <input type="button" name="btnDelete" value="退 修" onclick="window.location.href='<?=base_url()?>index.php/admin/report/updateReportState/<?=$report->reportId?>/1';" id="btnDelete" class="input" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/report/reportList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>