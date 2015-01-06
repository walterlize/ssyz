<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <div class="title_lee">报销单填写</div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/ordinary/money/monthMoneySave" id="form1">
        <input type="hidden" name="s_id" id="s_id" value="<?= $borrow->s_id ?>" />
        <table cellpadding="0" cellspacing="1" class="tablist2">

            <tr>
                <td class="td1">类别</td>
                <td class="td1">张数</td>
                <td class="td1">金额数</td>
                <td class="td1">报销人</td>
                <td class="td1">报销教工号/银行卡号</td>
            </tr>
         
            <tr>
                <td class="td1"><div align="left">1.设备费</div></td>
                <td class="td3"><input type="text" name="equipment" id="equipment" value="" size="10" />&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
          
            <tr>
                <td class="td1"><div align="left">2.材料费</div></td>
               <td class="td3"><input type="text" name="equipment" id="equipment" value="" size="10" />&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">3.测试化验加工费</div></td>
               <td class="td3"><input type="text" name="equipment" id="equipment" value=""  size="10"/>&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">4.燃料动力费</div></td>
                 <td class="td3"><input type="text" name="equipment" id="equipment" value="" size="10" />&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">5.差旅费</div></td>
                 <td class="td3"><input type="text" name="equipment" id="equipment" value="" size="10" />&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">6.会议费</div></td>
                 <td class="td3"><input type="text" name="equipment" id="equipment" value="" size="10" />&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            <tr>
                <td class="td1"><div align="left">7.国际合作费</div></td>
               <td class="td3"><input type="text" name="equipment" id="equipment" value=""  size="10"/>&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">8.出版/文献/信息传播/知识产权事务费</div></td>
              <td class="td3"><input type="text" name="equipment" id="equipment" value="" size="10" />&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">9.劳务费</div></td>
               <td class="td3"><input type="text" name="equipment" id="equipment" value="" size="10" />&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">10.专家咨询费</div></td>
               <td class="td3"><input type="text" name="equipment" id="equipment" value=""  size="10"/>&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">11.其他支出</div></td>
     <td class="td3"><input type="text" name="equipment" id="equipment" value=""size="10" />&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" >（二）间接费用</div></td>
               <td class="td3"><input type="text" name="equipment" id="equipment" value=""  size="10"/>&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">其中：绩效支出</div></td>
                <td class="td3"><input type="text" name="equipment" id="equipment" value=""  size="10"/>&nbsp;张</td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="10" />&nbsp;元</td>
                  <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
                     <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="" size="25" /></td>
            </tr>
            <tr>
                <td class="td1">合计</td>
                <td colspan="4" class="td3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5" class="td3" align="center"><input type="submit" name="btnSave" value="提 交" onclick="check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="取 消" onclick="window.location.href = '<?= base_url() ?>index.php/admin/money/totalList';" id="btnReturn" class="input" />      </td>
            </tr>
        </table>
    </form>
</div>