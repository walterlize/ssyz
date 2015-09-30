<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">软件著作权详细信息编辑</h3>
<form name="form1" method="post" action="<?=base_url()?>index.php/manager/software/save" id="form1">
<input type="hidden" value="<?=$softwareId?>" name="softwareId" id="softwareId" />
<input type="hidden" value="<?=$subjectId?>" name="subjectId" id="subjectId" />
  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
      <td class="td1" style="width: 111px">软著名称</td>
      <td class="td2" >
      	<input name="softwareName" type="text" id="softwareName" value="<?=$softwareName?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="softwareNameMsg" class="MsgHide">软著名称不能为空！</span>      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成人</td>
      <td class="td2" >
      	<input name="author" type="text" id="author" value="<?=$author?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="authorMsg" class="MsgHide">完成人不能为空！</span>      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">授权号</td>
      <td class="td2" >
      	<input name="authorizeNum" type="text" id="authorizeNum" value="<?=$authorizeNum?>" size="50" isRequired="true"/>
        <font color="red">*</font><span id="authorizeNumMsg" class="MsgHide">授权号不能为空！</span>      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">授权日期</td>
      <td class="td2">
      	<input id="time" name="time" value="<?=$time?>" class="Wdate" onfocus="WdatePicker()" type="text" isRequired="true"/>
        <font color="red">*</font><span id="timeMsg" class="MsgHide">授权日期不能为空！</span>
      </td>
    </tr>
    <tr>
      <td class="td1" style="width: 111px">完成单位</td>
      <td class="td2" >
      	<input name="workplace" type="text" id="workplace" value="<?=$workplace?>" size="50"/>      
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
      	  <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?=base_url()?>index.php/manager/software/softwareDetail/<?=$softwareId?>';" id="btnCancel" class="input" style="<?php if(isset($show)) echo $show;?>" />      </td>
    </tr>
  </table>
  </form>
 </div>