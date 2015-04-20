<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee"><?php if(isset($title)) echo $title;?></div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/project/projectSave" id="form1">
        <input type="hidden" value="<?php if (isset($project->id)) echo $project->id; ?>" name="id" id="id" />
        <input type="hidden" value="<?$type; ?>" name="type" id="type" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 111px"><?php if(isset($title))echo$title;?></td>
                <td class="td2">
                    <script type="text/javascript">
                        KindEditor.ready(function (K) {
                            var editor1 = K.create('textarea[name="content"]', {
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
                    <textarea name="content" style="visibility:hidden; width:100%; height:500px" id="content"><?php if (isset($project->content)) echo $project->content; ?></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href = '<?= base_url() ?>index.php/admin/project/projectDetail/<?=$project->id?>';" id="btnCancel" class="input"/>
                </td>
            </tr>
        </table>
    </form>
</div>