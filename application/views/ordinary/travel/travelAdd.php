
<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee">差旅报销单填写</div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/ordinary/travel/travelSave" id="form1">
        <input type="hidden" name="s_id" id="s_id" value="<?= $s_id ?>" />
        <input type="hidden" name="t_id" id="t_id" value="<?= $t_id ?>" />
        <input type="hidden" name="mc_id" id="mc_id" value="<?= $mc_id ?>" />
        <input type="hidden" name="m_type" id="m_type" value="2" />
        <input type="hidden" name="state" id="state" value="1" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1" style="width: 110px"> 申请类别： </td>
                <td class="td2" style="width: 320px" colspan="3"><select name="type" id="type">
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

            </tr>
            <tr>
                <td class="td1" style="width: 110px"> 出差起始日期： </td>
                <td class="td2" colspan="3">
                    自：<input id="outDate" name="outDate" value="<?= $outDate ?>" class="Wdate" onfocus="WdatePicker({maxDate: '#F{$dp.$D(\'backDate\')||\'2020-10-01\'}'})" type="text" isRequired="true" />
                    <span id="outDateMsg" class="MsgHide">出访日期不能为空！</span>
                    至<input id="backDate" name="backDate" value="<?= $backDate ?>" class="Wdate" onfocus="WdatePicker({minDate: '#F{$dp.$D(\'outDate\')}', maxDate: '2020-10-01'})" type="text" isRequired="true" onChange="dayNum()"/>
                    <span id="backDateMsg" class="MsgHide">访问截止日期不能为空！</span>
                    共<input name="days" type="days" id="days" value="<?= $days ?>" class="RegInput" size="5"  isRequired="true" validEnum="Int" />天
                    <span id="daysMsg" class="MsgHide">出差天数格式有误！</span>
                    <font color="red">*</font>
                </td>
            </tr>

            <tr>
                <td class="td1">出差人：</td>
                <td class="td2" colspan="3">
                    出差人及职务：<input name="name" type="text" id="name" value="<?= $name ?>" class="RegInput"  isRequired="true" />
                    <font color="red">*</font><span id="nameMsg" class="MsgHide">请填写出差人！</span> （可填写多个出差人，用逗号隔开），
                    共计：<input name="peopleNum" type="text" id="peopleNum" value="<?= $peopleNum ?>" class="RegInput"  isRequired="true" validEnum="Int" size="5"/>&nbsp;人
                    <font color="red">*</font><span id="peopleNumMsg" class="MsgHide">出差人数格式有误！</span></td>
            </tr>
            <tr>
                <td class="td1" style="width: 111px">出差事由：</td>
                <td colspan="3" class="td2"><textarea name="reason" cols="60" rows="3" id="reason"  isRequired="true"><?= $reason ?></textarea>
                    <font color="red">*</font><font color="blue"></font><span id="reasonMsg" class="MsgHide">出差事由不能为空！</span>      </td>
            </tr>
            <tr>
                <td class="td1">出差目的地：</td>
                <td class="td2" colspan="3"><input type="text" name="destination" isRequired="true" id="destination" value="<?= $destination ?>" size="40" />
                    <font color="red">*</font><span id="destinationMsg" class="MsgHide">出差目的地不能为空！</span>   
                </td>    
            </tr>
            <tr>
                <td class="td1">火车票：</td>
                <td class="td2">
                    <input type="text" name="trainMoneyNum" id="trainMoneyNum" value="<?= $trainMoneyNum ?>" class="RegInput"   validEnum="Int1" size="5"/>&nbsp;张,共
                    <span id="trainMoneyNumMsg" class="MsgHide"> 火车票张数格式有误！</span> 
                    <input type="text" name="trainMoney" id="trainMoney" value="<?= $trainMoney ?>"size="10"  class="RegInput"  validEnum="Double" />&nbsp;元。
                    <span id="trainMoneyMsg" class="MsgHide">火车票金额格式有误！</span>      
                </td>    

                <td class="td1">飞机票：</td>
                <td class="td2">
                    <input type="text" name="planeMoneyNum" id="planeMoneyNum" value="<?= $planeMoneyNum ?>" class="RegInput"  validEnum="Int1" size="5"/>&nbsp;张,共
                    <span id="planeMoneyNumMsg" class="MsgHide">飞机票张数格式有误！</span>
                    <input type="text" name="planeMoney" id="planeMoney" value="<?= $planeMoney ?>"size="10"  class="RegInput"  validEnum="Double1" />&nbsp;元。<font color="blue">（飞机票若为借款，金额请写零，并在备注处写出借机票的代码）</font>
                    <span id="planeMoneyMsg" class="MsgHide">飞机票金额格式有误！</span>
                </td>    
            </tr>
            <tr>
                <td class="td1">其它交通费用：</td>
                <td class="td2">
                    <input type="text" name="otherTravelMoneyNum" id="otherTravelMoneyNum" value="<?= $otherTravelMoneyNum ?>" class="RegInput"  validEnum="Int1" size="5"/>&nbsp;张,共
                    <span id="otherTravelMoneyNumMsg" class="MsgHide">其它交通张数格式有误！</span>
                    <input type="text" name="otherTravelMoney" id="otherTravelMoney" value="<?= $otherTravelMoney ?>"size="10"  class="RegInput"  validEnum="Double1" />&nbsp;元。
                    <span id="otherTravelMoneyMsg" class="MsgHide">其它交通费用格式有误！</span>
                </td>    
                <td class="td1">食宿费用费用：</td>
                <td class="td2">
                    <input type="text" name="accommodationNum" id="accommodationNum" value="<?= $accommodationNum ?>" class="RegInput"  validEnum="Int1" size="5"/>&nbsp;张,共
                    <span id="accommodationNumMsg" class="MsgHide">食宿费用发票张数格式有误！</span>
                    <input type="text" name="accommodation" id="accommodation" value="<?= $accommodation ?>"size="10"  class="RegInput"  validEnum="Double1" />&nbsp;元。
                    <span id="accommodationMsg" class="MsgHide">食宿费用格式有误！</span>
                </td>    
            </tr>
            <tr>
                <td class="td1">其它费用：</td>
                <td class="td2" colspan="3">
                    <input type="text" name="otherMoneyNum" id="otherMoneyNum" value="<?= $otherMoneyNum ?>" class="RegInput"  validEnum="Int1" size="5"/>&nbsp;张,共
                    <span id="otherMoneyNumMsg" class="MsgHide">其他费用发票张数格式有误！</span>
                    <input type="text" name="otherMoney" id="otherMoneym" value="<?= $otherMoney ?>"size="10"  class="RegInput"  validEnum="Double1" />&nbsp;元。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <span id="otherMoneyMsg" class="MsgHide">其他费用金额格式有误！</span>
                    详情：<input type="text" name="otherDetail" id="otherDetail" value="<?= $otherDetail ?>"size="50"  class="RegInput" />

                </td>    
            </tr>
            <tr>
                <td class="td1">申请补助：</td>
                <td class="td2" colspan="3">
                    食宿、交通补助共计：
                    <input type="text" name="subsidy" id="subsidy" value="<?= $subsidy ?>"size="10"  class="RegInput"  validEnum="Double1"isRequired="true" />&nbsp;元。&nbsp;&nbsp;

                    <font color="red">*</font><font color="blue">（食宿补助标准为最高每人每天180元）</font><span id="subsidyMsg" class="MsgHide">请申请食宿补助！</span></div></td>

                </td>    
            </tr>


            <tr>
                <td class="td1" style="width: 111px">差旅报销备注：</td>
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
                </td></tr>
            <script language="javascript">
                function my_submit() {
                    document.form1.submit();
                    document.form1.submit1.disabled = true;
                }
            </script>
            <tr>
                <td colspan="4" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保存" onclick="return check_base('form1');" id="btnAdd"class="input"  />
                    <input type="button" name="cancel" value="取 消" onclick="window.location.href = 'javascript:history.go(-1)';" id="btnSave"class="input"/> 
            </tr>
        </table>
    </form>
</div>