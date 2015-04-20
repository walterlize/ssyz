<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee"><?= $title ?></div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/ordinary/borrow/borrowSave" id="form1" enctype="multipart/form-data">
        <input type="hidden" name="s_id" id="s_id" value="<?= $s_id ?>" />
        <input type="hidden" name="b_id" id="b_id" value="<?= $b_id ?>" />
        <input type="hidden" name="mc_id" id="mc_id" value="<?= $mc_id ?>" />
        <input type="hidden" name="m_type" id="m_type" value="3" />
        <input type="hidden" name="state" id="state" value="1" />
        <input type="hidden" name="state2" id="state2" value="1" />
        <input type="hidden" name="upload" id="upload" value="<?= $upload ?>" />
        <table class="tablist2" cellpadding="0" cellspacing="1">
            <tr>
                <td class="td1" style="width: 110px"> 申请类别： </td>
                <td class="td2" style="width: 320px"><select name="type" id="type">

                        <?php foreach ($type1 as $r): ?>                
                            <option value="<?= $r ?>"
                            <?php
                            if (isset($type) && $r == $type)
                                echo 'selected';
                            else
                                echo '';
                            ?>
                                    >
                                        <?= $r ?>
                            </option>
                        <?php endforeach; ?>
                    </select><font color="red">*</font><span id="typeMsg" class="MsgHide"> 不能为空！</span> </td>
                <td class="td1" style="width: 110px">收款单位; </td>
                <td class="td2"style="width: 200px"><div style=""><input id="b_name" name="b_name" type="text" isRequired="true" class="RegInput"value="<?= $b_name ?>" /> 
                        <font color="red">*</font><span id="b_nameMsg" class="MsgHide">不能为空！</span></div></td>
            </tr>
            <tr> 

                <td class="td1" style="width: 110px"> 开户行： </td>
                <td class="td2" style="width: 200px">
                    <div style="">
                        <input id="bank_name" name="bank_name"  type="text" class="RegInput" value="<?= $bank_name ?>"/>
                          <font color="blue">*汇款必填；借支票可不填</font>
                    </div>
                </td>
                <td class="td1" style="width: 110px">银行账号： </td>
                <td class="td2" style="width: 320px"><input id="b_num" name="b_num" value="<?= $b_num ?>"class="RegInput" type="text" />
                    <font color="blue">*汇款必填；借支票可不填</font>
                </td>
            </tr>
            <tr> 
                <td class="td1" style="width: 110px"> 经费类别： </td>
                <td class="td2" style="width: 320px"><select name="borrowType" id="borrowType">

                        <?php foreach ($borrowType1 as $r): ?>                
                            <option value="<?= $r ?>"
                            <?php
                            if (isset($borrowType) && $r == $borrowType)
                                echo 'selected';
                            else
                                echo '';
                            ?>
                                    >
                                        <?= $r ?>
                            </option>
                        <?php endforeach; ?>
                    </select><font color="red">*</font><span id="borrowTypeMsg" class="MsgHide"> 不能为空！</span>&nbsp;&nbsp;&nbsp;
                    详情：<input id="detaiborrowDetaill" name="borrowDetail"class="RegInput" size="25"value="<?= $borrowDetail ?>" type="text" /> </td>
                <td class="td1" style="width: 110px">金额（元）： </td>
                <td class="td2" style="width: 320px">
                    <input id="money" name="money"class="RegInput" value="<?= $money ?>" isRequired="true"validEnum="Double" type="text" />
                    <font color="red">*</font><span id="moneyMsg" class="MsgHide"> 不能为空！</span> 
                </td>
            </tr>
           <!-- <tr>
                <td class="td1" style="width: 123px">上传附件（合同）：</td>
                <td class="td2" colspan="3">          	
                    <input type="file" name="userfile1" size="15" id="userfile1" value="<?= $upload ?>" class="RegInput"/>
            <?php if (isset($isuploaded)) echo($isuploaded); ?><?= $upload ?><font color="blue">支持docx及xlsx格式，如多个文件请打包（zip或者rar）上传！</font>
                </td>
            </tr>-->

            <tr>
                <td class="td1" style="width: 111px">其他信息（可上传附件）：</td>
                <td class="td2" colspan="3">
                    <script type="text/javascript">
                        KindEditor.ready(function (K) {
                            var editor1 = K.create('textarea[name="description"]', {
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
                    <textarea name="description" id="description" style="visibility:hidden; width:80%; height:200px;"><?= $description ?></textarea>
                </td>
            </tr>
            <tr >
                <td colspan="4" class="td3" align="center">
                    <input type="submit" name="btnSave" value="提 交" onclick="return check_base('form1') && confirm('确认并存为草稿?然后您可以通过申请表管理对申请表进行管理。');" id="btnAdd"class="input"  />
                    <input type="button" name="cancel" value="取 消" onclick="window.location.href = 'javascript:history.go(-1)';" id="btnSave"class="input"/> 
            </tr>
        </table>
    </form>
</div>