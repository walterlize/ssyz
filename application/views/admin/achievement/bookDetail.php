<div style="margin-left:20px; margin-right:20px;">
<br />
<h3>论著详细信息</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">论著名称</td>
      <td colspan="3" class="td2" ><?=$book->bookName?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">出版社</td>
      <td colspan="3" class="td2" ><?=$book->publication?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">出版时间</td>
      <td class="td2" style="width: 319px"><?=$book->time?>&nbsp;</td>
      <td class="td1" style="width: 111px">论著类型</td>
      <td class="td2"><?=$book->type?></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">主编</td>
      <td colspan="3" class="td2"><?=$book->chiefEditor?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">副主编</td>
      <td colspan="3" class="td2"><?=$book->associateEditor?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">参编</td>
      <td colspan="3" class="td2"><?=$book->superviseEditor?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">主编单位</td>
      <td colspan="3" class="td2" ><?=$book->editorWorkplace?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td colspan="3" class="td2"><?=$book->remark?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">状态</td>
      <td colspan="3" class="td2"><?=$book->stateInfo?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	<input type="button" name="btnEdit" value="通 过" onclick="window.location.href='<?=base_url()?>index.php/admin/book/updateBookState/<?=$book->bookId?>/2';" id="btnEdit" class="input"/>
      	  <input type="button" name="btnDelete" value="退 修" onclick="window.location.href='<?=base_url()?>index.php/admin/book/updateBookState/<?=$book->bookId?>/1';" id="btnDelete" class="input" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/book/bookList';" id="btnReturn" class="input" />      </td>
      </td>
    </tr>
  </table>
 </div>