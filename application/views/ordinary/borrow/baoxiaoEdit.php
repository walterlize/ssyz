<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee"><?= $title ?></div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/ordinary/borrow/baoxiaoUpdate/<?= $b_id ?>" id="form1">
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
                <td class="td2" style="width: 320px"><?= $type ?> </td>
                <td class="td1" style="width: 110px">收款单位; </td>
                <td class="td2"style="width: 200px"><?= $b_name ?></td>
            </tr>
            <tr> 

                <td class="td1" style="width: 110px"> 开户行： </td>
                <td class="td2" style="width: 200px"><?= $bank_name ?></td>
                <td class="td1" style="width: 110px">银行账号： </td>
                <td class="td2" style="width: 320px"><?= $b_num ?></td>
                </td>
            </tr>
            <tr> 
                <td class="td1" style="width: 110px"> 经费类别： </td>
                <td class="td2" style="width: 320px"colspan="3"><?= $moneyType ?>
                    详情：<?= $borrowDetail ?></td>

            </tr>
            <tr>
                <td class="td1" style="width: 111px">其他信息（可上传附件）：</td>
                <td class="td2" colspan="3">
                    <?= $description ?>
                </td>
            </tr>
            <tr> 

                <td class="td1" style="width: 110px">借款金额（元）： </td>
                <td class="td2" style="width: 320px" colspan="3">
                    <?= $moneyOld ?>
                </td>

            </tr>
            <tr> 

             
                <td class="td1" style="width: 110px">报销金额： </td>
                <td class="td2" style="width: 320px">
                    <input id="money" name="money"class="RegInput" value="<?= $money ?>" isRequired="true"validEnum="Double" type="text" />
                    <font color="red">*</font><span id="moneyMsg" class="MsgHide"> 不能为空！</span> 
                </td>
                  <td class="td1" style="width: 110px">报销发票张数： </td>
                <td class="td2" style="width: 320px">
                    <input id="num" name="num"class="RegInput" value="<?= $num ?>" isRequired="true"validEnum="Double" type="text" />
                    <font color="red">*</font><span id="numMsg" class="MsgHide"> 不能为空！</span> 
                </td>
            </tr>

            <tr >
                <td colspan="4" class="td3" align="center">
                    <input type="submit" name="btnSave" value="保 存" onclick="return check_base('form1') && confirm('确认并存为草稿?然后您可以通过申请表管理对申请表进行管理。');" id="btnAdd"class="input"  />
                    <input type="button" name="cancel" value="取 消" onclick="window.location.href = 'javascript:history.go(-1)';" id="btnSave"class="input"/> 
            </tr>
        </table>
    </form>
</div>