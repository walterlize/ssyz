<div style="margin-left:20px; margin-right:20px">
<br />
 <div class="title_lee">课题执行专家组编辑</div>
<form name="form1" method="post" action="<?=base_url()?>index.php/admin/expert/save" id="form1">
<input type="hidden" value="<?=$expert->expertId?>" name="expertId" id="expertId" />
<input type="hidden" value="Subject" name="type" id="type" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">姓名</td>
      <td class="td2" ><input name="name" type="text" id="name" value="<?=$expert->name?>" size="50"  isRequired="true" />
      <font color="red">*</font><span id="nameMsg" class="MsgHide">姓名不能为空！</span></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">类别</td>
      <td class="td2" ><select id="type" name="type" >
            	<?php foreach($types as $r): ?>
          		<option value="<?=$r['type']?>"
				  <?php
				  	if(isset($expert->expertType) && $r['name'] == $expert->expertType)
						echo 'selected';
					else echo '';?>
                   >
            <?=$r['name']?>
          </option>
          <?php endforeach; ?>
            </select>
       </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">单位</td>
      <td class="td2" ><input name="firm" type="text" id="firm" value="<?=$expert->firm?>" size="50"/></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">职称</td>
      <td class="td2"><input name="title" type="text" id="title" value="<?=$expert->title?>" size="50"/></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">邮箱地址</td>
      <td class="td2">
      	<input name="email" type="text" id="email" value="<?=$expert->email?>" size="50" />
       
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">参与课题</td>
      <td class="td2">
	  	<select id="subjectId" name="subjectId">
        	<option value="0">----请选择----</option>
            	<?php foreach($subject as $r): ?>
          		<option value="<?=$r->subjectId?>"
				  <?php
				  	if(isset($expert->subjectId) && $r->subjectId == $expert->subjectId)
						echo 'selected';
					else echo '';?>
                   >
            <?=$r->subjectName?>
          </option>
          <?php endforeach; ?>
            </select>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td class="td2">
      	<textarea name="remark" cols="50" rows="5" id="remark"><?=$expert->remark?></textarea>      </td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	  <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/admin/expert/expertDetail/<?=$expert->expertId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />      </td>
    </tr>
  </table>
  </form>
 </div>