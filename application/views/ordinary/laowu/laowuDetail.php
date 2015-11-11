<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee"> 劳务费/专家咨询费申请详情</div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/ordinary/laowu/submit" id="form1">

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1"><div align="left">申请类别：</div></td>
                <td class="td3" ><div align="left"><?= $laowu->type ?></div>
                </td>

                <td class="td1"><div align="left">申请人数：</div></td>
                <td class="td3" ><div align="left"><?= $laowu->peopleNum ?></div>
                </td>
            </tr>
            <tr>
                <td class="td1"><div align="left">金额发放（元）：</div></td>
                <td class="td3" colspan="3"><div align="left">申请金额：<?= $laowu->money ?>元，其中缴税<?= $laowu->tax ?>元，实际发放金额<?=$money1?>元。</div>
                </td>

            </tr>
          
            <tr>
                <td class="td1"><div align="left">其他信息（可上传附件）：</div></td>
                <td class="td3"  colspan="3"><div align="left"><?= $laowu->description ?></div>
                </td>
            </tr>
            <tr style="<?=$show2?>">
                <td class="td1"><div align="left">审批信息：</div></td>
                <td class="td3"  colspan="3"><div align="left"><?= $laowu->remark ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="td3" align="center">
                    <input style="<?= $show ?>"type="button" name="btnEdit" value="修改" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/laowu/laowuEdit/<?= $laowu->laowu_id ?>';" id="btnSave" class="input" />
                    <input style="<?= $show ?>" type="button" name="btnEdit" value="删除" onclick="javascript:if (confirm('您确定要删除?'))
                                window.location.href = '<?= base_url() ?>index.php/ordinary/laowu/laowuDelete/<?= $laowu->laowu_id ?>';" id="btnSave" class="input" />

                    <input style="<?= $show ?>" type="button" name="btnSave" value="提 交" onclick="javascript:if (confirm('提交将不能修改，有问题请联系管理员！'))
                                window.location.href = '<?= base_url() ?>index.php/ordinary/laowu/submit/<?= $laowu->laowu_id ?>';" id="btnSave" class="input" />
                   <!-- <input type="button" name="btnReturn" value="继续新增" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/laowu/laowuNew';" id="btnReturn" class="input" />

                    <input type="button" name="btnReturn" value="返回列表" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/laowu/laowuList';" id="btnReturn" class="input" />
                -->
                    <input onclick="javascript:window.close()" type="button"value="关 闭" class="input">
                </td>
            </tr>
        </table>
    </form>
</div>