<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">报告详细信息编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/manager/report/save" id="form1">
<input type="hidden" value="<?=$reportId?>" name="reportId" id="reportId" />
<input type="hidden" value="<?=$subjectId?>" name="subjectId" id="subjectId" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">报告名称</td>
      <td colspan="3" class="td2" >
      	<input name="reportName" type="text" id="reportName" value="<?=$reportName?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="reportNameMsg" class="MsgHide">报告名称不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td colspan="3" class="td2" >
      	<input name="author" type="text" id="author" value="<?=$author?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="authorMsg" class="MsgHide">出版社不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">审核日期</td>
      <td class="td2" style="width: 319px">
      	<input id="time" name="time" value="<?=$time?>" class="Wdate" onfocus="WdatePicker()" type="text" isRequired="true"/>
        <font color="red">*</font><span id="timeMsg" class="MsgHide">审核日期不能为空！</span>
      </td>
      <td class="td1" style="width: 111px">报告类型</td>
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
      <td class="td1" style="width: 111px">完成单位</td>
      <td colspan="3" class="td2" >
      	<input name="workplace" type="text" id="workplace" value="<?=$workplace?>" size="50"/>
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
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/manager/report/reportDetail/<?=$reportId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />
      </td>
    </tr>
  </table>
    </form>
 </div>