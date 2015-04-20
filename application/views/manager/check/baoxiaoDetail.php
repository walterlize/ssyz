<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee">普通报销审核</div>
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
                <td class="td1"><div align="left">备注信息：</div></td>
                <td class="td3"  colspan="3"><div align="left"><?= $baoxiao->description ?></div>
                </td>
            </tr>
         
        </table>
    </form>
</div>