<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee"> 汇款/支票报销</div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/ordinary/borrow/submit" id="form1">

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1"><div align="left">申请类别：</div></td>
                <td class="td3" ><div align="left"><?= $borrow->type ?></div>
                </td>
                <td class="td1"><div align="left">收款单位：</div></td>
                <td class="td3" ><div align="left"><?= $borrow->b_name ?></div>
                </td>
            </tr>
            <tr>
                <td class="td1"><div align="left">开户行：</div></td>
                <td class="td3" ><div align="left"><?= $borrow->bank_name ?></div>
                </td>
                <td class="td1"><div align="left">银行账号：</div></td>
                <td class="td3" ><div align="left"><?= $borrow->b_num ?></div>
                </td>
            </tr>
            <tr>
                <td class="td1"><div align="left">经费类别：</div></td>
                <td class="td3" colspan="3"><div  align="left">
                        <?= $borrow->borrowType ?>&nbsp;&nbsp;&nbsp;&nbsp;详情：<?= $borrow->borrowDetail ?></div> 
                </td>
            </tr>   

            <tr>
                <td class="td1"><div align="left">其他信息（可上传附件）：</div></td>
                <td class="td3"  colspan="3"><div align="left"><?= $borrow->description ?></div>
                </td>
            </tr>
            <tr>
                <td class="td1"><div align="left">借款金额</td></div>
                <td class="td3"><div align="left"><font color="red" ><?= $borrow->money ?> 元</font>
                    </div>
                </td>
                <td class="td1"><div align="left">报销金额</td></div>
                <td class="td3"><div align="left"><font color="red"><?= $borrow->moneyOld ?> 元</font>
                    </div> 
                </td>
            </tr>
            <tr style="<?=$show2?>">
                <td class="td1"><div align="left">审批信息：</div></td>
                <td class="td3"  colspan="3"><div align="left"><?= $borrow->remark ?></div>
                </td>
            </tr>

            <tr>
                <td colspan="5" class="td3" align="center">
                    <input style="<?= $show ?>"type="button" name="btnEdit" value="修改" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/borrow/baoxiaoEdit/<?= $borrow->b_id ?>';" id="btnSave" class="input" />
                    <input style="<?= $show ?>" type="button" name="btnSave" value="提 交" onclick="javascript:if (confirm('提交将不能修改，有问题请联系管理员！'))
                                window.location.href = '<?= base_url() ?>index.php/ordinary/borrow/submitBaoxiao/<?= $borrow->b_id ?>';" id="btnSave" class="input" />

                   <!-- <input type="button" name="btnReturn" value="返回列表" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/borrow/baoxiaoList';" id="btnReturn" class="input" />
                -->
                    <input onclick="javascript:window.close()" type="button"value="关 闭" class="input">
                </td>
            </tr>
        </table>
    </form>
</div>