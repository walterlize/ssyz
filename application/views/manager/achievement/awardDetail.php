<div style="margin-left:20px; margin-right:20px;">
<br />
<h3>报奖材料详细信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">报奖材料名称</td>
      <td colspan="3" class="td2" ><?=$award->awardName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td colspan="3" class="td2" ><?=$award->author?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成单位</td>
      <td colspan="3" class="td2" ><?=$award->workplace?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">报奖类型</td>
      <td class="td2" style="width: 319px"><?=$award->type?>&nbsp;</td>
      <td class="td1" style="width: 111px">报奖级别</td>
      <td class="td2"><?=$award->level?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">报奖等级</td>
      <td class="td2" style="width: 319px"><?=$award->grade?>&nbsp;</td>
      <td class="td1" style="width: 111px">报奖状态</td>
      <td class="td2"><?=$award->awardState?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">处理单位</td>
      <td colspan="3" class="td2"><?=$award->processWorkplace?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">组织部门</td>
      <td colspan="3" class="td2"><?=$award->organizationDepart?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">颁发部门</td>
      <td colspan="3" class="td2"><?=$award->issueDepart?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td colspan="3" class="td2"><?=$award->remark?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/manager/award/awardEdit/<?=$award->awardId?>';" id="btnEdit" class="input" style="<?=$show?>" />
      	  <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/manager/award/awardDelete/<?=$award->awardId?>')" id="btnDelete" class="input" style="<?=$show?>" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/manager/award/awardList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>