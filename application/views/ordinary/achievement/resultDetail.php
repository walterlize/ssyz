<div style="margin-left:20px; margin-right:20px;">
<br />
<h3>鉴定成果详细信息</h3>
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
      <td colspan="2" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/manager/result/resultEdit/<?=$result->resultId?>';" id="btnEdit" class="input" style="<?=$show?>" />
      	  <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/manager/result/resultDelete/<?=$result->resultId?>')" id="btnDelete" class="input" style="<?=$show?>" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/manager/result/resultList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>