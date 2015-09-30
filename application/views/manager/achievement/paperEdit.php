<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">论文详细信息编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/manager/paper/save" id="form1">
<input type="hidden" value="<?=$paperId?>" name="paperId" id="paperId" />
<input type="hidden" value="<?=$subjectId?>" name="subjectId" id="subjectId" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">论文名称</td>
      <td colspan="3" class="td2" >
      	<input name="paperName" type="text" id="paperName" value="<?=$paperName?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="paperNameMsg" class="MsgHide">论文名称不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">刊物名称</td>
      <td colspan="3" class="td2" >
      	<input name="publication" type="text" id="publication" value="<?=$publication?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="publicationMsg" class="MsgHide">刊物名称不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">发表时间</td>
      <td colspan="3" class="td2" >
      	<input id="birthday" name="time" value="<?=$time?>" class="Wdate" onfocus="WdatePicker()" type="text" isRequired="true"/>
        <font color="red">*</font><span id="timeMsg" class="MsgHide">发表时间不能为空！</span>
        <input name="volume" type="text" id="volume" value="<?=$volume?>" size="5"/>卷
        <input name="period" type="text" id="period" value="<?=$period?>" size="5"/>期
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">页码范围</td>
      <td colspan="3" class="td2">
      	第<input name="fromPage" type="text" id="fromPage" value="<?=$fromPage?>" size="10"/>页 到
	  	第<input name="endPage" type="text" id="endPage" value="<?=$endPage?>" size="10"/>页
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">论文类型</td>
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
      <td class="td1" style="width: 111px">收录类型</td>
      <td class="td2">
      	<select id="record" name="record" >
            	<?php foreach($records as $r): ?>
          		<option value="<?=$r?>"
				  <?php
				  	if(isset($record) && $r == $record)
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
      <td class="td1" style="width: 111px">作者</td>
      <td colspan="3" class="td2" >
      	<input name="author" type="text" id="author" value="<?=$author?>" isRequired="true"/>
        <font color="red">*</font><span id="authorMsg" class="MsgHide">作者称不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">第一作者单位</td>
      <td colspan="3" class="td2" >
      	<input name="authorWorkplace" type="text" id="authorWorkplace" value="<?=$authorWorkplace?>" size="50"/>
      </td>
    </tr>

    <tr>
      <td class="td1" style="width: 111px">内容信息：</td>
      <td class="td2" colspan="3">
        <script type="text/javascript">
          KindEditor.ready(function (K) {
            var editor1 = K.create('textarea[name="remark"]', {
              cssPath: '<?= base_url() ?>kindeditor/plugins/code/prettify.css',
              uploadJson: '<?= base_url() ?>kindeditor/php/upload_json.php',
              fileManagerJson: '<?= base_url() ?>kindeditor/php/file_manager_json.php',
              allowFileManager: true,
              afterCreate: function () {
                var self = this;
                K.ctrl(document, 13, function () {
                  self.sync();
                  K('form[name=content]')[0].submit();
                });
                K.ctrl(self.edit.doc, 13, function () {
                  self.sync();
                  K('form[name=content]')[0].submit();
                });
              }
            });
            prettyPrint();
          });
        </script>
        <textarea name="remark" id="remark" style="visibility:hidden; width:80%; height:200px;"><?= $remark ?></textarea>
      </td></tr>

    <tr>
      <td colspan="4" class="td3" align="center">
      	  <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/manager/paper/paperDetail/<?=$paperId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />
      </td>
    </tr>
  </table>
    </form>
 </div>