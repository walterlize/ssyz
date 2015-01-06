<div style="margin-left:20px; margin-right:20px">
<br />
<h3>课题详细信息编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/ordinary/subject/save" id="form1">
<input type="hidden" value="<?=$subjectId?>" name="subjectId" id="subjectId" />
<input type="hidden" value="Subject" name="type" id="type" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">课题名称</td>
      <td class="td2" >
      	<?=$subjectName?>&nbsp;
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">课题编号</td>
      <td class="td2" >
      	<?=$subjectNum?>&nbsp;
      </td>
        <tr>
      <td class="td1" style="width: 111px">课题单位名称</td>
      <td class="td2" >
      	<?=$subjectUnit?>&nbsp;
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">负责专家</td>
      <td class="td2" >
      	<input name="expert" type="text" id="expert" value="<?=$expert?>" size="50"/>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">课题简介</td>
      <td class="td2">
      	<?=$introduction?>&nbsp;
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px"> 课题内容</td>
      <td class="td2">
      	<script type="text/javascript">
			KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : '<?=base_url()?>kindeditor/plugins/code/prettify.css',
				uploadJson : '<?=base_url()?>kindeditor/php/upload_json.php',
				fileManagerJson : '<?=base_url()?>kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=content]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=content]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		</script>
      	<textarea name="content" id="content" style="visibility:hidden; width:80%;"><?=$content?></textarea>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px"> 课题完成情况</td>
      <td class="td2" >
      	<script type="text/javascript">
			KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="completion"]', {
				cssPath : '<?=base_url()?>kindeditor/plugins/code/prettify.css',
				uploadJson : '<?=base_url()?>kindeditor/php/upload_json.php',
				fileManagerJson : '<?=base_url()?>kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=completion]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=completion]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		</script>
      	<textarea name="completion" id="completion" style="visibility:hidden; width:80%;"><?=$completion?></textarea>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td class="td2">
      	<textarea name="remark" cols="50" rows="5" id="remark"><?=$remark?></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	  <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/ordinary/subject/subjectDetail';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />
      </td>
    </tr>
  </table>
    </form>
 </div>