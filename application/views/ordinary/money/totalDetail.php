<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">课题经费预算表</div>
    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td colspan="3" class="td2">课题：课题<?= $money->subjectNum ?>&nbsp;&nbsp;&nbsp;&nbsp;<?= $money->subjectName ?></td>
        </tr>
        <tr>
            <td class="td1">类别</td>
            <td class="td1">经费总额(万元)</td>
            <td class="td1">预算说明</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">（一）直接使用</div></td>
            <td class="td2"><?= $money->direct_cost ?>&nbsp;</td>
            <td class="td2"><?= $money->directCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">1.设备费</div></td>
            <td class="td2"><?= $money->equipment ?>&nbsp;</td>
            <td class="td2"><?= $money->equipmentCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left" style="margin-left:20px">其中：购置设备费</div></td>
            <td class="td2"><?= $money->buyEquipment ?>&nbsp;</td>
            <td class="td2"><?= $money->buyEquipmentCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left" style="margin-left:40px">试制设备费</div></td>
            <td class="td2"><?= $money->tryEquipment ?>&nbsp;</td>
            <td class="td2"><?= $money->tryEquipmentCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left" style="margin-left:40px">设备改造与租赁费</div></td>
            <td class="td2"><?= $money->alterEquipment ?>&nbsp;</td>
            <td class="td2"><?= $money->alterEquipmentCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">2.材料费</div></td>
            <td class="td2"><?= $money->material ?>&nbsp;</td>
            <td class="td2"><?= $money->materialCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">3.测试化验加工费</div></td>
            <td class="td2"><?= $money->experiment ?>&nbsp;</td>
            <td class="td2"><?= $money->experimentCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">4.燃料动力费</div></td>
            <td class="td2"><?= $money->fuel ?>&nbsp;</td>
            <td class="td2"><?= $money->fuelCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">5.差旅费</div></td>
            <td class="td2"><?= $money->travel ?>&nbsp;</td>
            <td class="td2"><?= $money->travelCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">6.会议费</div></td>
            <td class="td2"><?= $money->conference ?>&nbsp;</td>
            <td class="td2"><?= $money->conferenceCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">7.国际合作费</div></td>
            <td class="td2"><?= $money->international ?>&nbsp;</td>
            <td class="td2"><?= $money->internationalCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">8.出版/文献/信息传播/知识产权事务费</div></td>
            <td class="td2"><?= $money->information ?>&nbsp;</td>
            <td class="td2"><?= $money->informationCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">9.劳务费</div></td>
            <td class="td2"><?= $money->service ?>&nbsp;</td>
            <td class="td2"><?= $money->serviceCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">10.专家咨询费</div></td>
            <td class="td2"><?= $money->consultative ?>&nbsp;</td>
            <td class="td2"><?= $money->consultativeCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">11.其他支出</div></td>
            <td class="td2"><?= $money->other ?>&nbsp;</td>
            <td class="td2"><?= $money->otherCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">（二）间接费用</div></td>
            <td class="td2"><?= $money->indirect_cost ?>&nbsp;</td>
            <td class="td2"><?= $money->indirectCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">其中：绩效支出</div></td>
            <td class="td2"><?= $money->ji_xiao ?>&nbsp;</td>
            <td class="td2"><?= $money->ji_xiaoCaption ?>&nbsp;</td>
        </tr>
        <tr>
            <td class="td1">合计</td>
            <td class="td2" colspan="2"><?= $money->total ?>&nbsp;</td>
        </tr>
        <tr>
            <td colspan="3" class="td3" align="center">
            
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href = 'javascript:history.go(-1)';" id="btnReturn" class="input" />      </td>
        </tr>
    </table>
</div>