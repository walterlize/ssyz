<div style="margin-left:20px; margin-right:20px">
<br />
<h3  class="title_lee"><?=$title?>编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/admin/trend/save" id="form1">
<input type="hidden" value="<?=$trendId?>" name="trendId" id="trendId" />
<input type="hidden" value="<?=$linkNum?>" name="linkNum" id="linkNum" />
<input type="hidden" value="<?=$trendType?>" name="trendType" id="trendType" />
<input type="hidden" value="2" name="state" id="state" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">标题</td>
      <td class="td2" ><input name="trendName" type="text" id="trendName" value="<?=$trendName?>" size="50"  isRequired="true" />
      <font color="red">*</font><span id="trendNameMsg" class="MsgHide">标题不能为空！</span></td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">作者</td>
      <td class="td2" ><input name="trendAuthor" type="text" id="trendAuthor" value="<?=$trendAuthor?>" size="50"/>
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
      <td class="td2" ><input type="checkbox" name="trendTop" value="1" <?=$checked?> /></td>
    </tr>
    <tr>
      <td colspan="2" class="td3" align="center">
        <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
        <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/admin/trend/trendDetail/<?=$trendId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />
        </td>
    </tr>
  </table>
    </form>
 </div>