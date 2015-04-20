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
                <div align="left">&nbsp;<?= $travel->otherTravelMoney ?>&nbsp;张,共
                    <?= $travel->otherTravelMoneyNum ?> &nbsp;元。</div>
            </td>    
            <td class="td1"><div align="left">食宿费用费用：</div></td>
            <td class="td2">
                <div align="left">&nbsp;<?= $travel->accommodation ?>&nbsp;张,共
                    <?= $travel->accommodationNum ?> &nbsp;元。</div>
            </td>    
        </tr>
        <tr>
            <td class="td1"><div align="left">其它费用：</div></td>
            <td class="td2" colspan="3">
                <?= $travel->otherMoney ?>&nbsp;张,共
                <?= $travel->otherMoneyNum ?> &nbsp;元。&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

        <tr>
            <td colspan="5" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href = 'javascript:history.go(-1)';" id="btnReturn" class="input" />  
            </td>
        </tr>
    </table>

</div>