<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">报奖材料详细信息编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/manager/award/save" id="form1">
<input type="hidden" value="<?=$awardId?>" name="bookId" id="awardId" />
<input type="hidden" value="<?=$subjectId?>" name="subjectId" id="subjectId" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">报奖材料名称</td>
      <td colspan="3" class="td2" >
      	<input name="awardName" type="text" id="awardName" value="<?=$awardName?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="awardNameMsg" class="MsgHide">报奖材料名称不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td colspan="3" class="td2" >
      	<input name="author" type="text" id="author" value="<?=$author?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="authorMsg" class="MsgHide">完成人不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成单位</td>
      <td colspan="3" class="td2" >
      	<input name="workplace" type="text" id="workplace" value="<?=$workplace?>" size="50"/>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">报奖类型</td>
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
        </select>
      </td>
      <td class="td1" style="width: 111px">报奖级别</td>
      <td class="td2">
      	<select id="level" name="level" >
            	<?php foreach($levels as $r): ?>
          		<option value="<?=$r?>"
				  <?php
				  	if(isset($type) && $r == $level)
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
      <td class="td1" style="width: 111px">报奖等级</td>
      <td class="td2" style="width: 319px">
      	<select id="grade" name="grade" >
            	<?php foreach($grades as $r): ?>
          		<option value="<?=$r?>"
				  <?php
				  	if(isset($grade) && $r == $grade)
						echo 'selected';
					else echo '';?>
                   >
            <?=$r?>
          </option>
          <?php endforeach; ?>
        </select>
      </td>
      <td class="td1" style="width: 111px">报奖状态</td>
      <td class="td2">
      	<select id="awardState" name="awardState" >
            	<?php foreach($states as $r): ?>
          		<option value="<?=$r?>"
				  <?php
				  	if(isset($awardState) && $r == $awardState)
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
      <td class="td1" style="width: 111px">处理单位</td>
      <td colspan="3" class="td2">
      	<input name="processWorkplace" type="text" id="processWorkplace" value="<?=$processWorkplace?>" size="50"/>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">组织部门</td>
      <td colspan="3" class="td2">
      	<input name="organizationDepart" type="text" id="organizationDepart" value="<?=$organizationDepart?>" size="50"/>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">颁发部门</td>
      <td class="td2" colspan="3">
      	<input name="issueDepart" type="text" id="issueDepart" value="<?=$issueDepart?>" size="50"/>
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
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/manager/award/awardDetail/<?=$awardId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />
      </td>
    </tr>
  </table>
    </form>
 </div>