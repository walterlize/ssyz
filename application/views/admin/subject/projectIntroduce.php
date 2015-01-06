<div style="margin-left:20px; margin-right:20px">
<br />
<h3>项目简介</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">项目简介</td>
      <td class="td2" ><?php if(isset($content)) echo $content;?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/admin/project/projectEdit';" id="btnEdit" class="input" />
      </td>
    </tr>
  </table>
</div>