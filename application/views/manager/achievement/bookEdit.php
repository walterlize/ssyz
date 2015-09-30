<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">论著详细信息编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/manager/book/save" id="form1">
<input type="hidden" value="<?=$bookId?>" name="bookId" id="bookId" />
<input type="hidden" value="<?=$subjectId?>" name="subjectId" id="subjectId" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">论著名称</td>
      <td colspan="3" class="td2" >
      	<input name="bookName" type="text" id="bookName" value="<?=$bookName?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="bookNameMsg" class="MsgHide">论著名称不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">出版社</td>
      <td colspan="3" class="td2" >
      	<input name="publication" type="text" id="publication" value="<?=$publication?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="publicationMsg" class="MsgHide">出版社不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">出版时间</td>
      <td class="td2" style="width: 319px">
      	<input id="time" name="time" value="<?=$time?>" class="Wdate" onfocus="WdatePicker()" type="text" isRequired="true"/>
        <font color="red">*</font><span id="timeMsg" class="MsgHide">出版时间不能为空！</span>
      </td>
      <td class="td1" style="width: 111px">论著类型</td>
      <td class="td2">
      	<select id="type" name="type" >
            	<?php foreach($types as $r): ?>
          		<option value="<?=$r?>"
				  <?php
				  	if(isset($type) && $r == $type)
						echo 'selected';
					else echo '';?>
                   >
            <?=$r?>
          </option>
          <?php endforeach; ?>
        </select>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">主编</td>
      <td colspan="3" class="td2">
      	<input name="chiefEditor" type="text" id="chiefEditor" value="<?=$chiefEditor?>" size="50"/>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">副主编</td>
      <td colspan="3" class="td2">
      	<input name="associateEditor" type="text" id="associateEditor" value="<?=$associateEditor?>" size="50"/>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">参编</td>
      <td class="td2" colspan="3">
      	<input name="superviseEditor" type="text" id="superviseEditor" value="<?=$superviseEditor?>" size="50"/>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">主编单位</td>
      <td colspan="3" class="td2" >
      	<input name="editorWorkplace" type="text" id="editorWorkplace" value="<?=$editorWorkplace?>" size="50"/>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td colspan="3" class="td2">
      	<textarea name="remark" cols="50" rows="5" id="remark"><?=$remark?></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	  <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/manager/book/bookDetail/<?=$bookId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />
      </td>
    </tr>
  </table>
    </form>
 </div>