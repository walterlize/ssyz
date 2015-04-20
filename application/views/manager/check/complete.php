<br/>
<div style="margin-left:20px; margin-right:20px" id="content">
    <form name="form1" method="post" action="<?= base_url() ?>index.php/manager/check/checkBaoxiao/<?= $baoxiao->bao_id ?>/2" id="form1">
        <table class="tablist2" cellpadding="0" cellspacing="1">

            <tr>
                <td class="td1" style="width: 111px"><font color="red" size="3px">审核情况：</font></td>
                <td class="td2" colspan="2" align="center">
                    <select name="state" id="state">
                        <option value="5">报销完成，请查收！</option>
                    </select>
                </td>
            </tr>
            <tr>  <td class="td1" style="width: 111px"><font color="red">批复情况：</font></td>
                <td class="td2" colspan="2">
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
                                        K('form[name=suggestion]')[0].submit();
                                    });
                                    K.ctrl(self.edit.doc, 13, function () {
                                        self.sync();
                                        K('form[name=suggestion]')[0].submit();
                                    });
                                }
                            });
                            prettyPrint();
                        });
                    </script>
                    <textarea name="remark" id="remark" style="visibility:hidden; width:100%; 
                              height:200px;"><?= $baoxiao->remark2 ?></textarea>

                    <font color="red">*退回整改前请填写批复意见</font></td></tr>

            <tr>
                <td colspan="3" class="td3" align="center">
                    <input type="submit" name="btnSave" value="提 交" onclick="return check_base('form1') && confirm('确认并保存?');" id="btnAdd"class="input"  />
                    <input type="button" name="btnNext" value="返 回" onclick="window.location.href = '<?= base_url(); ?>index.php/manager/check/baoxiaoManage';" id="btnSave"class="input"/> 
                </td></tr>
            </div>  </table>        
    </form>
</div>