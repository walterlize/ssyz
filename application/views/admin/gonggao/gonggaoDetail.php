<div style="margin-left:20px; margin-right:20px">
  <br />
  <div class="title_lee"><?=$gtitle?>信息</div>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">标题</td>
      <td class="td2" ><?=$gonggao->title?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$top?></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">作者</td>
      <td class="td2" ><?=$gonggao->author?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">发表时间</td>
      <td class="td2"><?=$gonggao->date?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">内容</td>
      <td class="td2"><?=$gonggao->content?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">附件</td>
      <td class="td2" >&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">浏览量</td>
      <td class="td2"><?=$gonggao->linkNum?>次</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">审核信息</td>
      <td class="td2" style="color:red"><?=$gonggao->state?>次</td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
        <input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/admin/gonggao/gonggaoEdit/<?=$gonggao->gonggaoId?>';" id="btnEdit" class="input" />
        <input type="button" name="btnSave" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/admin/gonggao/gonggaoDelete/<?=$gonggao->gonggaoId?>/<?=$gonggao->type?>')" id="btnDelete" class="input" />
        <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/gonggao/gonggaoList/<?=$gonggao->type?>';" id="btnReturn" class="input" />      </td>
    </tr>
  </table>
</div>