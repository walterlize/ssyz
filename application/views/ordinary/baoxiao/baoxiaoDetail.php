<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee">报销单详情</div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/ordinary/baoxiao/submit" id="form1">

        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td1"><div align="left">类别类别：</div></td>
                <td class="td3" ><div align="left"><?= $baoxiao->type ?></div>
                </td>
                  <td class="td1"><div align="left">类别详情：</div></td>
                <td class="td3" ><div align="left"><?= $baoxiao->baoxiaoDetail ?></div></td>
            </tr>

            <tr>
                <td class="td1"><div align="left">发票张数：</div></td>
                <td class="td3"><div align="left"><?= $baoxiao->num ?>张
                    </div> </td>
                <td class="td1"><div align="left">发票总金额：</div></td>
                <td class="td3"><div align="left"><?= $baoxiao->money ?> 元
                    </div>
                </td>
            </tr>
            <tr>
                <td class="td1"><div align="left">报销人：</div></td>
                <td class="td3"  colspan="3"><div align="left"><?= $baoxiao->baoxiao_name ?></div>
                </td>
            </tr>
            <tr>
                <td class="td1"><div align="left">备注信息：</div></td>
                <td class="td3"  colspan="3"><div align="left"><?= $baoxiao->description ?></div>
                </td>
            </tr>
            <tr style="<?=$show2?>">
                <td class="td1"><div align="left">审批信息：</div></td>
                <td class="td3"  colspan="3"><div align="left"><?= $baoxiao->remark ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="td3" align="center">
                    <input style="<?= $show ?>"type="button" name="btnEdit" value="修改" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/baoxiao/baoxiaoEdit/<?= $baoxiao->bao_id ?>';" id="btnSave" class="input" />
                    <input style="<?= $show ?>" type="button" name="btnEdit" value="删除" onclick="javascript:if (confirm('您确定要删除?'))
                                   window.location.href = '<?= base_url() ?>index.php/ordinary/baoxiao/baoxiaoDelete/<?= $baoxiao->bao_id ?>';" id="btnSave" class="input" />

                    <input style="<?= $show ?>" type="button" name="btnSave" value="提 交" onclick="javascript:if (confirm('提交将不能修改，有问题请联系管理员！'))
                                   window.location.href = '<?= base_url() ?>index.php/ordinary/baoxiao/submit/<?= $baoxiao->bao_id ?>';" id="btnSave" class="input" />
                   <!-- <input type="button" name="btnReturn" value="继续新增" onclick="window.location.href = '<?=  base_url()?>index.php/ordinary/baoxiao/baoxiaoNew';" id="btnReturn" class="input" />
                    <input type="button" name="btnReturn" value="返回列表" onclick="window.location.href = '<?=  base_url()?>index.php/ordinary/baoxiao/baoxiaoList';" id="btnReturn" class="input" />
                    -->
                    <input onclick="javascript:window.close()" type="button"value="关 闭" class="input">
                </td>
            </tr>
        </table>
    </form>
</div>