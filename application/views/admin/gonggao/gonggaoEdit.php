<div style="margin-left:20px; margin-right:20px">
<br />
<h3  class="title_lee"><?=$gtitle?>编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/admin/gonggao/save" id="form1">
<input type="hidden" value="<?=$gonggaoId?>" name="gonggaoId" id="gonggaoId" />
<input type="hidden" value="<?=$linkNum?>" name="linkNum" id="linkNum" />
<input type="hidden" value="<?=$type?>" name="type" id="type" />
<input type="hidden" value="2" name="state" id="state" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">标题</td>
      <td class="td2" ><input name="title" type="text" id="title" value="<?=$title?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="titleMsg" class="MsgHide">标题不能为空！</span></td>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">作者</td>
      <td class="td2" ><input name="author" type="text" id="author" value="课题组管理员" size="50" readonly="readonly"/>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">发布日期</td>
      <td class="td2" ><input name="date" type="text" id="date" value="<?=$date?>" size="50"  class="Wdate" onfocus="WdatePicker()"/>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">内容</td>
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
      	<textarea name="content" id="content" style="visibility:hidden; width:80%; height:400px;"><?=$content?></textarea>
        
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">附件</td>
      <td class="td2">&nbsp;</td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">置顶</td>
      <td class="td2" ><input type="checkbox" name="gonggaoTop" value="1" <?=$checked?> /></td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
        <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
        <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/admin/gonggao/gonggaoDetail/<?=$gonggaoId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />
        </td>
    </tr>
  </table>
    </form>
 </div>