<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee"><?= $title ?>编辑</div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/manager/workReport/save" id="form1">
        <input type="hidden" value="<?= $workReportId ?>" name="workReportId" id="workReportId" />
        <input type="hidden" value="<?= $subjectId ?>" name="subjectId" id="subjectId" />

        <input type="hidden" value="<?= $type ?>" name="type" id="type" />
        <input type="hidden" value="1" name="level" id="level" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <!--<td class="td2" colspan="5">
                请选择年份：
                <select id="year" name="year" onchange="changeYear('year', 'month', 'content', '<?= base_url() ?>index.php/manager/workReport/reportChange')">
            <?php if (is_array($years)) foreach ($years as $r): ?>
                                            <option value="<?= $r ?>"
                    <?php
                    if (isset($r) && $r == $year)
                        echo 'selected';
                    else
                        echo '';
                    ?>
                                                    ><?= $r ?>年</option>
                <?php endforeach; ?>
                </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                请选择月份：
                <select id="month" name="month">
            <?php for ($i = 1; $i <= 12; $i++) { ?>
                                <option value="<?= $i ?>"
                <?php
                if (isset($report->month) && $i == $month)
                    echo 'selected';
                else
                    echo '';
                ?>
                                        ><?= $i ?>月</option>
            <?php } ?>
                </select></td>
            </tr>-->
            <tr>
                <td class="td1" style="width: 111px">标题</td>
                <td class="td2" ><input name="title" type="text" id="title" value="<?= $title ?>" size="50"  isRequired="true" />
                    <font color="red">*</font><span id="titleMsg" class="MsgHide">标题不能为空！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">作者</td>
                <td class="td2" ><input name="author" type="text" id="author" value="<?= $author ?>" size="50"/>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">所在单位</td>
                <td class="td2" ><input name="subjectUnit" type="text" id="subjectUnit" value="<?= $subjectUnit ?>" size="40" readonly="readonly"/>
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">所在课题</td>
                <td class="td2" ><input name="subjectName" type="text" id="subjectName" value="<?= $subjectName ?>" size="50" readonly="readonly"/>
                </td>
            </tr>

            <tr>
                <td class="td1" style="width: 111px">内容</td>
                <td class="td2">
                    <textarea name="content" cols="50" rows="10" id="content" style="width:90%; height:400px; visibility:hidden"><?= $content ?></textarea>
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
                </td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">附件</td>
                <td class="td2">
                  <!--<input type="button" value="打开" class="input" onclick="open_dialog();"/>-->      	
                    <script type="text/javascript">
                        $(function () {
                            $("#dialog").dialog({
                                autoOpen: false,
                                modal: true,
                                buttons: {
                                    确定: function () {
                                        alert("您点击了登录按钮");
                                    },
                                    取消: function () {
                                        $(this).dialog('close');
                                    }
                                }
                            })
                        });

                        function open_dialog() {
                            $("#dialog").dialog("open");
                        }
                    </script>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnCancel" value="取 消" onclick="window.location.href = '<?= base_url() ?>index.php/manager/workReport/reportDetail/<?= $workReportId ?>';" id="btnCancel" class="input" style="<?php if (isset($show)) echo $show; ?>" />
                </td>
            </tr>
        </table>
    </form>
</div>
<!--
<div id="dialog" title="上传附件">
    <p id="login_tip"></p>
    <form id="login-form" action="<?= base_url() . "index.php/manager/upload/upload" ?>" enctype="multipart/form-data" method="post" >
        <fieldset>
            选择文件:<input type="file" name="fileName" id="fileName" />
            <input type="submit" value="提交" />
        </fieldset>
    </form>
</div>
-->
