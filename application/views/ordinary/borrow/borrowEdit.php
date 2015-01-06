<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee">汇款单填写</div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/ordinary/money/monthMoneySave" id="form1">
        <input type="hidden" name="s_id" id="s_id" value="<?= $borrow->s_id ?>" />
        <table class="tablist2" cellpadding="0" cellspacing="1">
            <tr> 
                <td class="td1" style="width: 110px">收款单位; </td>
                <td class="td2"style="width: 200px"><div style=""><input id="b_name" name="b_name" type="text" isRequired="true" class="RegInput"value="<?= $borrow->b_name ?>" /> 
                        <font color="red">*</font><span id="b_nameMsg" class="MsgHide">不能为空！</span></div></td>
                <td class="td1" style="width: 110px"> 开户行： </td>
                <td class="td2" style="width: 200px"><div style=""><input id="bank_name" name="bank_name"  type="text" isRequired="true"class="RegInput" value="<?= $borrow->bank_name ?>"/>
                        <font color="red">*</font><span id="bank_nameMsg" class="MsgHide">不能为空！</span></div></td>
                </td>
            </tr>
            <tr> 
                <td class="td1" style="width: 110px">银行账号： </td>
                <td class="td2" style="width: 320px"><input id="b_num" name="b_num" value="<?= $borrow->b_num ?>"class="RegInput" type="text" />
                    <font color="red">*</font><span id="b_nameMsg" class="MsgHide">不能为空！</span></div></td>
                <td class="td1" style="width: 110px">金额（万元）： </td>
                <td class="td2" style="width: 320px"><input id="money" name="money"class="RegInput" value="<?= $borrow->money ?>" type="text" />
                     <font color="red">*</font><span id="moneyMsg" class="MsgHide"> 不能为空！</span> </td>
            </tr>
             <tr>
                <td class="td1" style="width: 110px"> 经费类别： </td>
                <td class="td2" style="width: 320px"><select name="type" id="type">

                        <?php foreach ($borrow->type1 as $r): ?>                
                            <option value="<?= $r ?>"
                            <?php
                            if (isset($borrow->type) && $r == $borrow->type)
                                echo 'selected';
                            else
                                echo '';
                            ?>
                                    >
                                        <?= $r ?>
                            </option>
                        <?php endforeach; ?>
                    </select><font color="red">*</font><span id="typeMsg" class="MsgHide"> 不能为空！</span> </td>
                </td>
                <td class="td1" style="width: 110px"> 详细： </td>
                 <td class="td2" style="width: 320px"><input id="content" name="content"class="RegInput" value="<?= $borrow->content ?>" type="text" />
             
                </td>

            </tr>
            <tr> 
                <td class="td1" style="width: 110px">联系人： </td>
                <td class="td2" style="width: 320px"><input id="b_num" name="b_num" value="<?= $borrow->b_num ?>"class="RegInput" type="text" />
                    <font color="red">*</font><span id="b_nameMsg" class="MsgHide">不能为空！</span></div></td>
                <td class="td1" style="width: 110px">联系方式： </td>
                <td class="td2" style="width: 320px"><input id="money" name="money"class="RegInput" value="<?= $borrow->money ?>" type="text" />
                     <font color="red">*</font><span id="moneyMsg" class="MsgHide"> 不能为空！</span> </td>
            </tr>
          
            <tr >
                <td colspan="4" class="td3" align="center">
                    <input type="submit" name="btnSave" value="提 交" onclick="return check_base('form1') && confirm('确认并存为草稿?然后您可以通过申请表管理对申请表进行管理。');" id="btnAdd"class="input"  />
                    <input type="button" name="cancel" value="取 消" onclick="window.location.href = 'javascript:history.go(-1)';" id="btnSave"class="input"/> 
            </tr>
        </table>
    </form>
</div>