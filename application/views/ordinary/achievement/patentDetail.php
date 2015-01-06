<div style="margin-left:20px; margin-right:20px;">
<br />
<h3>专利详细信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">专利名称</td>
      <td colspan="3" class="td2" ><?=$patent->patentName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">专利号</td>
      <td colspan="3" class="td2" ><?=$patent->patentNum?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">专利类型</td>
      <td class="td2" style="width: 319px"><?=$patent->type?>&nbsp;</td>
      <td class="td1" style="width: 111px">状态</td>
      <td class="td2"><?=$patent->patentState?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td colspan="3" class="td2"><?=$patent->author?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成单位</td>
      <td colspan="3" class="td2"><?=$patent->workplace?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">申报日期</td>
      <td class="td2" style="width: 319px"><?=$patent->applyTime?>&nbsp;</td>
      <td class="td1" style="width: 111px">授权日期</td>
      <td class="td2"><?=$patent->authorizeTime?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td colspan="3" class="td2"><?=$patent->remark?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/manager/patent/patentEdit/<?=$patent->patentId?>';" id="btnEdit" class="input" style="<?=$show?>" />
      	  <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/manager/patent/patentDelete/<?=$patent->patentId?>')" id="btnDelete" class="input" style="<?=$show?>" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/manager/patent/patentList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>