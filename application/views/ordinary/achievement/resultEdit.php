<div style="margin-left:20px; margin-right:20px">
<br />
<h3>鉴定成果详细信息编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/manager/result/save" id="form1">
<input type="hidden" value="<?=$resultId?>" name="resultId" id="resultId" />
<input type="hidden" value="<?=$subjectId?>" name="subjectId" id="subjectId" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">鉴定成果名称</td>
      <td class="td2" >
      	<input name="resultName" type="text" id="resultName" value="<?=$resultName?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="resultNameMsg" class="MsgHide">论著名称不能为空！</span>      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td class="td2" >
      	<input name="author" type="text" id="author" value="<?=$author?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="authorMsg" class="MsgHide">出版社不能为空！</span>      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">鉴定日期</td>
      <td class="td2" style="width: 319px">
      	<input id="time" name="time" value="<?=$time?>" class="Wdate" onfocus="WdatePicker()" type="text" isRequired="true"/>
        <font color="red">*</font><span id="timeMsg" class="MsgHide">出版时间不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成单位</td>
      <td class="td2" >
      	<input name="workplace" type="text" id="workplace" value="<?=$workplace?>" size="50"/>      </td>
    </tr>
     <tr>
      <td class="td1" style="width: 111px">鉴定意见</td>
      <td class="td2">
      	<script type="text/javascript">
			KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="opinion"]', {
				cssPath : '<?=base_url()?>kindeditor/plugins/code/prettify.css',
				uploadJson : '<?=base_url()?>kindeditor/php/upload_json.php',
				fileManagerJson : '<?=base_url()?>kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=opinion]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=opinion]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
		</script>
      	<textarea name="opinion" id="opinion" style="visibility:hidden; width:80%;"><?=$opinion?></textarea>      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">备注</td>
      <td class="td2">
      	<textarea name="remark" cols="50" rows="5" id="remark"><?=$remark?></textarea>      </td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	  <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/manager/result/resultDetail/<?=$resultId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />      </td>
    </tr>
  </table>
  </form>
 </div>