<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee"> 劳务费/专家咨询费申请详情</div>
   
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
                <td class="td1"><div align="left">申请金额（元）：</div></td>
                <td class="td3" ><div align="left"><?= $laowu->money ?></div>
                </td>
                <td class="td1"><div align="left">其中缴税（元）：</div></td>
                <td class="td3" ><div align="left"><?= $laowu->tax ?></div>
                </td>
            </tr>

            <tr>
                <td class="td1"><div align="left">其他信息（可上传附件）：</div></td>
                <td class="td3"  colspan="3"><div align="left"><?= $laowu->description ?></div>
                </td>
            </tr>
            <tr>
                <td colspan="5" class="td3" align="center">
                    <input onclick="javascript:window.close()" type="button"value="关 闭" class="input">
                </td>
            </tr>
        </table>
 
</div>