<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee"><?=$title?>信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">标题</td>
      <td class="td2" ><?=$trend->trendName?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$top?></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">作者</td>
      <td class="td2" ><?=$trend->trendAuthor?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">发表时间</td>
      <td class="td2"><?=$trend->time?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">内容</td>
      <td class="td2"><?=$trend->content?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">附件</td>
      <td class="td2" >&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">浏览量</td>
      <td class="td2"><?=$trend->linkNum?>次</td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center"><input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/manager/trend/trendEdit/<?=$trend->trendId?>';" id="btnEdit" class="input" />
      <input type="button" name="btnSave" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/manager/trend/trendDelete/<?=$trend->trendId?>/<?=$trend->trendType?>')" id="btnDelete" class="input" />
      <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/manager/trend/trendList';" id="btnReturn" class="input" />      </td>
    </tr>
  </table>
 </div>