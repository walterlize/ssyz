<div style="margin-left:20px; margin-right:20px;">
<br />
<h3 class="title_lee">论文详细信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">论文名称</td>
      <td colspan="3" class="td2" ><?=$paper->paperName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">刊物名称</td>
      <td colspan="3" class="td2" ><?=$paper->publication?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">发表时间</td>
      <td class="td2" style="width: 319px"><?=$paper->time?>&nbsp;</td>
      <td class="td1" style="width: 111px">页码范围</td>
      <td class="td2" >第<?=$paper->fromPage?>页 到 第<?=$paper->endPage?>页</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">论文类型</td>
      <td class="td2" style="width: 319px"><?=$paper->type?>&nbsp;</td>
      <td class="td1" style="width: 111px">收录收录</td>
      <td class="td2"><?=$paper->record?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">作者</td>
      <td colspan="3" class="td2"><?=$paper->author?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">第一作者单位</td>
      <td colspan="3" class="td2" ><?=$paper->authorWorkplace?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td colspan="3" class="td2"><?=$paper->remark?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/manager/paper/paperEdit/<?=$paper->paperId?>';" id="btnEdit" class="input" style="<?=$show?>" />
      	  <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/manager/paper/paperDelete/<?=$paper->paperId?>')" id="btnDelete" class="input" style="<?=$show?>" />          
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/manager/paper/paperList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>