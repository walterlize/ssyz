<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee">报销单详情</div>
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
            <tr>
              
                     <td colspan="5" class="td3" align="center">
               
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href = 'javascript:history.go(-1)';" id="btnReturn" class="input" />  
            </td>
            </tr>
        </table>
   </div>