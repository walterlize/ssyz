<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">专利详细信息编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/manager/patent/save" id="form1">
<input type="hidden" value="<?=$patentId?>" name="patentId" id="patentId" />
<input type="hidden" value="<?=$subjectId?>" name="subjectId" id="subjectId" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">专利名称</td>
      <td colspan="3" class="td2" >
      	<input name="patentName" type="text" id="patentName" value="<?=$patentName?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="patentNameMsg" class="MsgHide">专利名称不能为空！</span>      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">专利号</td>
      <td colspan="3" class="td2" >
      	<input name="patentNum" type="text" id="patentNum" value="<?=$patentNum?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="patentNumMsg" class="MsgHide">出版社不能为空！</span>      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">专利类型</td>
      <td class="td2" style="width: 319px">
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
        </select>      </td>
      <td class="td1" style="width: 111px">状态</td>
      <td class="td2">
      	<select id="patentState" name="patentState" >
            	<?php foreach($states as $r): ?>
          		<option value="<?=$r?>"
				  <?php
				  	if(isset($patentState) && $r == $patentState)
						echo 'selected';
					else echo '';?>
                   >
            <?=$r?>
          </option>
          <?php endforeach; ?>
        </select>      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td colspan="3" class="td2">
      	<input name="author" type="text" id="author" value="<?=$author?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="authorMsg" class="MsgHide">完成人不能为空！</span>      
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成单位</td>
      <td colspan="3" class="td2">
      	<input name="workplace" type="text" id="workplace" value="<?=$workplace?>" size="50"/>      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">申报日期</td>
      <td class="td2">
      	<input name="applyTime" type="text" id="applyTime" value="<?=$applyTime?>" class="Wdate" onfocus="WdatePicker()" isRequired="true"/>
        <font color="red">*</font><span id="applyTimeMsg" class="MsgHide">申报日期不能为空！</span>      
      </td>
      <td class="td1" style="width: 111px">授权日期</td>
      <td class="td2">
      	<input name="authorizeTime" type="text" id="authorizeTime" value="<?=$authorizeTime?>" class="Wdate" onfocus="WdatePicker()" isRequired="true"/>
        <font color="red">*</font><span id="authorizeTimeMsg" class="MsgHide">授权日期不能为空！</span>      
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td colspan="3" class="td2">
      	<textarea name="remark" cols="50" rows="5" id="remark"><?=$remark?></textarea>      </td>
    </tr>
    <tr>
      <td colspan="4" class="td3" align="center">
      	  <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/manager/patent/patentDetail/<?=$patentId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />      </td>
    </tr>
  </table>
  </form>
 </div>