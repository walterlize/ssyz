<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3>课题详细信息编辑</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/subject/save" id="form1">
        <input type="hidden" value="<?= $subjectId ?>" name="subjectId" id="subjectId" />
        <input type="hidden" value="Subject" name="type" id="type" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px">课题名称</td>
                <td class="td2" ><input name="subjectName" type="text" id="subjectName" value="<?= $subjectName ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="subjectNameMsg" class="MsgHide">课题名称不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">课题编号</td>
                <td class="td2" ><input name="subjectNum" type="text" id="subjectNum" value="<?= $subjectNum ?>" size="50" isRequired="true"  />
                    <font color="red">*</font><span id="subjectNumMsg" class="MsgHide">课题编号必须为整数且不能为空！</span>      </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">课题单位名称</td>
                <td class="td2" ><input name="subjectUnit" type="text" id="subjectUnit" value="<?= $subjectUnit ?>" size="50" isRequired="true"  />
                    <font color="red">*</font><span id="subjectUnitMsg" class="MsgHide">课题单位名称不能为空！</span>      </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">课题起止年限</td>
                <td class="td2" >自：<input name="startDate" type="text" id="startDate" value="<?= $startDate ?>" size="20" class="Wdate" onfocus="WdatePicker()" isRequired="true"  />
                    <font color="red">*</font><span id="startDateMsg" class="MsgHide">课题开始时间不能为空！</span> 
                    至&nbsp;<input name="endDate" type="text" id="endDate" value="<?= $endDate ?>" size="20" class="Wdate" onfocus="WdatePicker()" isRequired="true"  />
                    <font color="red">*</font><span id="endDateMsg" class="MsgHide">课题开始时间不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">负责专家</td>
                <td class="td2" ><input name="expert" type="text" id="expert" value="<?= $expert ?>" size="50"/></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">课题简介</td>
                <td class="td2">
                    <script type="text/javascript">
                        KindEditor.ready(function(K) {
                            var editor1 = K.create('textarea[name="introduction"]', {
                                cssPath : '<?= base_url() ?>kindeditor/plugins/code/prettify.css',
                                uploadJson : '<?= base_url() ?>kindeditor/php/upload_json.php',
                                fileManagerJson : '<?= base_url() ?>kindeditor/php/file_manager_json.php',
                                allowFileManager : true,
                                afterCreate : function() {
                                    var self = this;
                                    K.ctrl(document, 13, function() {
                                        self.sync();
                                        K('form[name=introduction]')[0].submit();
                                    });
                                    K.ctrl(self.edit.doc, 13, function() {
                                        self.sync();
                                        K('form[name=introduction]')[0].submit();
                                    });
                                }
                            });
                            prettyPrint();
                        });
                    </script>
                    <textarea name="introduction" id="introduction" style="visibility:hidden; width:80%;"><?= $introduction ?></textarea>
                </td>
            </tr>
            
            <tr>
                <td class="td1" style="width: 111px">备注</td>
                <td class="td2">
                    <textarea name="remark" cols="60" rows="5" id="remark"><?= $remark ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />          
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/admin/subject/subjectDetail/<?= $subjectId ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />     
                </td>
            </tr>
        </table>
    </form>
</div>