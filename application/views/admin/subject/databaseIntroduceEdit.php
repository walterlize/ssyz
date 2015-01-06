<div style="margin-left:20px; margin-right:20px">
<br />
<h3>数据库平台介绍编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/admin/database/databaseSave" id="form1">
<input type="hidden" value="<?php if(isset($id)) echo $id;?>" name="id" id="id" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">数据库平台介绍</td>
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
        <textarea name="content" style="visibility:hidden; width:80%; height:350px" id="content"><?php if(isset($content)) echo $content;?></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
      	  <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/admin/database/databaseDetail';" id="btnCancel" class="input"/>
      </td>
    </tr>
  </table>
    </form>
 </div>