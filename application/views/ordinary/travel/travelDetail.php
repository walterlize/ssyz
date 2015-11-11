<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee">差旅报销单详情</div>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1"><div align="left">出差起始日期：</div></td>
            <td class="td3" colspan="3"><div align="left">&nbsp;自：<?= $travel->outDate ?>&nbsp;至&nbsp;<?= $travel->backDate ?>，共<?= $travel->days ?>&nbsp;天。</div>
            </td>
        </tr>
        <tr height="20px">
            <td class="td1"><div align="left">出差人：</div></td>
            <td class="td3" colspan="3"><div align="left">&nbsp;出差人及职务：<?= $travel->name ?>，共计&nbsp;<?= $travel->peopleNum ?>人。</div>
            </td>
        </tr>
        <tr>
            <td class="td1"><div align="left">出差事由：</div></td>
            <td class="td3" colspan="3"><div align="left">&nbsp;<?= $travel->reason ?></div>
            </td>
        </tr>
        <tr>
            <td class="td1"><div align="left">出差目的地：</div></td>
            <td class="td3" colspan="3"><div align="left">&nbsp;<?= $travel->destination ?></div>
            </td>
        </tr>
        <tr>
            <td class="td1"><div align="left">火车票：</div></td>
            <td class="td2">
                <div align="left">&nbsp;<?= $travel->trainMoneyNum ?>&nbsp;张,共
                <?= $travel->trainMoney ?>&nbsp;元。</div>
            </td>    

            <td class="td1"><div align="left">飞机票：</div></td>
            <td class="td2">
               <div align="left">&nbsp;<?= $travel->planeMoneyNum ?>&nbsp;张,共
                <?= $travel->planeMoney ?> &nbsp;元。</div>
            </td>    
        </tr>
        <tr>
            <td class="td1"><div align="left">其它交通费用：</div></td>
            <td class="td2">
                <div align="left">&nbsp;<?= $travel->otherTravelMoneyNum ?>&nbsp;张,共
                <?= $travel->otherTravelMoney ?> &nbsp;元。</div>
            </td>    
            <td class="td1"><div align="left">食宿费用费用：</div></td>
            <td class="td2">
               <div align="left">&nbsp;<?= $travel->accommodationNum ?>&nbsp;张,共
                <?= $travel->accommodation ?> &nbsp;元。</div>
            </td>    
        </tr>
        <tr>
            <td class="td1"><div align="left">其它费用：</div></td>
            <td class="td2" colspan="3">
                <?= $travel->otherMoneyNum ?>&nbsp;张,共
                <?= $travel->otherMoney ?> &nbsp;元。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                详情：<?= $travel->otherDetail ?> 
            </td>    
        </tr>
        <tr>
            <td class="td1"><div align="left">申请补助：</div></td>
            <td class="td3" colspan="3"><div align="left">食宿、交通补助共计<?= $travel->subsidy ?>&nbsp;元。</div>
            </td>
        </tr>
        <tr>
            <td class="td1"><div align="left">差旅报销备注：</div></td>
            <td colspan="3" class="td2"><?= $travel->description ?>
            </td>
        </tr>
           <tr>
            <td class="td1"><div align="left">共计（元）：</div></td>
            <td class="td3" colspan="3"><div align="left">&nbsp;<?= $travel->totalMoney ?>&nbsp;元。</div>
            </td>
        </tr>
        <tr style="<?=$show2?>">
            <td class="td1"><div align="left">审批信息：</div></td>
            <td class="td3"  colspan="3"><div align="left"><?= $travel->remark ?></div>
            </td>
        </tr>
        <tr>
            <td colspan="5" class="td3" align="center">
                <input style="<?= $show ?>"type="button" name="btnEdit" value="修改" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/travel/travelEdit/<?= $travel->t_id ?>';" id="btnSave" class="input" />
                <input style="<?= $show ?>" type="button" name="btnEdit" value="删除" onclick="javascript:if (confirm('您确定要删除?'))
                            window.location.href = '<?= base_url() ?>index.php/ordinary/travel/travelDelete/<?= $travel->t_id ?>';" id="btnSave" class="input" />

                <input style="<?= $show ?>" type="button" name="btnSave" value="提 交" onclick="javascript:if (confirm('提交将不能修改，有问题请联系管理员！'))
                            window.location.href = '<?= base_url() ?>index.php/ordinary/travel/submit/<?= $travel->t_id ?>';" id="btnSave" class="input" />
               <!-- <input type="button" name="btnReturn" value="继续新增" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/travel/travelNew';" id="btnReturn" class="input" />

                <input type="button" name="btnReturn" value="返回列表" onclick="window.location.href = '<?= base_url() ?>index.php/ordinary/travel/travelList';" id="btnReturn" class="input" />
           -->
                <input onclick="javascript:window.close()" type="button"value="关 闭" class="input">
            </td>
        </tr>
    </table>

</div>