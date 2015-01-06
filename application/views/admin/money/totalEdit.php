<div style="margin-left:20px; margin-right:20px">
    <br />
    <h3 align="center"><font color="#003366" size="5px">课题总经费预算表</font></h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/admin/money/totalMoneySave" id="form1">
        <input type="hidden" name="totalMoneyId" id="totalMoneyId" value="<?= $money->totalMoneyId ?>" />
        <input type="hidden" name="total" id="total" value="<?= $money->total ?>" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                请选择课题：
            <select id="subjectId" name="subjectId">
                <?php foreach ($subject as $r): ?>
                    <option value="<?= $r->subjectId ?>" 
                    <?php
                    if (isset($money->subjectId) && $r->subjectId == $money->subjectId)
                        echo 'selected';
                    else
                        echo '';
                    ?>
                            >
                                <?= $r->subjectName ?>
                    </option>
                <?php endforeach; ?>
            </select><!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            课题起止年限：&nbsp;&nbsp;自
            <input name="startDate" type="text" id="startDate" value="<?= $money->startDate ?>" size="20" class="Wdate" onfocus="WdatePicker()" isRequired="true"  />
            <font color="red">*</font><span id="startDateMsg" class="MsgHide">课题开始时间不能为空！</span> 
            至&nbsp;<input name="endDate" type="text" id="endDate" value="<?= $money->endDate ?>" size="20" class="Wdate" onfocus="WdatePicker()" isRequired="true"  />
            <font color="red">*</font><span id="endDateMsg" class="MsgHide">课题开始时间不能为空！</span>-->


            </td>
            </tr>
            </br> <tr>
                <td class="td1">类别</td>
                <td class="td1">经费总额(万元)</td>
                <td class="td1">预算说明</td>
            </tr>
                <tr>
                <td class="td1"><div align="left" >（一）直接使用</div></td>
                <td class="td3"><input type="text" name="direct_cost" id="direct_cost" value="<?= $money->direct_cost ?>" /></td>
                <td class="td3"><input type="text" name="directCaption" id="directCaption" value="<?= $money->directCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">1.设备费</div></td>
                <td class="td3"><input type="text" name="equipment" id="equipment" value="<?= $money->equipment ?>" /></td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="<?= $money->equipmentCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" style="margin-left:40px">（1）购置设备费</div></td>
                <td class="td3"><input type="text" name="buyEquipment" id="buyEquipment" value="<?= $money->buyEquipment ?>" /></td>
                <td class="td3"><input name="buyEquipmentCaption" type="text" id="buyEquipmentCaption" value="<?= $money->buyEquipmentCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" style="margin-left:40px">（2）试制设备费</div></td>
                <td class="td3"><input type="text" name="tryEquipment" id="tryEquipment" value="<?= $money->tryEquipment ?>" /></td>
                <td class="td3"><input name="tryEquipmentCaption" type="text" id="tryEquipmentCaption" value="<?= $money->tryEquipmentCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" style="margin-left:40px">（3）设备改造与租赁费</div></td>
                <td class="td3"><input type="text" name="alterEquipment" id="alterEquipment" value="<?= $money->alterEquipment ?>" /></td>
                <td class="td3"><input name="alterEquipmentCaption" type="text" id="alterEquipmentCaption" value="<?= $money->alterEquipmentCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">2.材料费</div></td>
                <td class="td3"><input type="text" name="material" id="material" value="<?= $money->material ?>" /></td>
                <td class="td3"><input type="text" name="materialCaption" id="materialCaption" value="<?= $money->materialCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">3.测试化验加工费</div></td>
                <td class="td3"><input type="text" name="experiment" id="experiment" value="<?= $money->experiment ?>" /></td>
                <td class="td3"><input type="text" name="experimentCaption" id="experimentCaption" value="<?= $money->experimentCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">4.燃料动力费</div></td>
                <td class="td3"><input type="text" name="fuel" id="fuel" value="<?= $money->fuel ?>" /></td>
                <td class="td3"><input type="text" name="fuelCaption" id="fuelCaption" value="<?= $money->fuelCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">5.差旅费</div></td>
                <td class="td3"><input type="text" name="travel" id="travel" value="<?= $money->travel ?>" /></td>
                <td class="td3"><input type="text" name="travelCaption" id="travelCaption" value="<?= $money->travelCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">6.会议费</div></td>
                <td class="td3"><input type="text" name="conference" id="conference" value="<?= $money->conference ?>" /></td>
                <td class="td3"><input type="text" name="conferenceCaption" id="conferenceCaption" value="<?= $money->conferenceCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">7.国际合作费</div></td>
                <td class="td3"><input type="text" name="international" id="international" value="<?= $money->international ?>" /></td>
                <td class="td3"><input type="text" name="internationalCaption" id="internationalCaption" value="<?= $money->internationalCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">8.出版/文献/信息传播/知识产权事务费</div></td>
                <td class="td3"><input type="text" name="information" id="information" value="<?= $money->information ?>" /></td>
                <td class="td3"><input type="text" name="informationCaption" id="informationCaption" value="<?= $money->informationCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">9.劳务费</div></td>
                <td class="td3"><input type="text" name="service" id="service" value="<?= $money->service ?>" /></td>
                <td class="td3"><input type="text" name="serviceCaption" id="serviceCaption" value="<?= $money->serviceCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">10.专家咨询费</div></td>
                <td class="td3"><input type="text" name="consultative" id="consultative" value="<?= $money->consultative ?>" /></td>
                <td class="td3"><input type="text" name="consultativeCaption" id="consultativeCaption" value="<?= $money->consultativeCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">11.其他支出</div></td>
                <td class="td3"><input type="text" name="other" id="other" value="<?= $money->other ?>" /></td>
                <td class="td3"><input type="text" name="otherCaption" id="managementCaption" value="<?= $money->otherCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" >（二）间接费用</div></td>
                <td class="td3"><input type="text" name="indirect_cost" id="indirect_cost" value="<?= $money->indirect_cost ?>" /></td>
                <td class="td3"><input type="text" name="indirectCaption" id="indirectCaption" value="<?= $money->indirectCaption ?>" size="50" /></td>
            </tr>
             <tr>
                <td class="td1"><div align="left">其中：绩效支出</div></td>
                <td class="td3"><input type="text" name="ji_xiao" id="management" value="<?= $money->ji_xiao ?>" /></td>
                <td class="td3"><input type="text" name="ji_xiaoCaption" id="ji_xiaoCaption" value="<?= $money->ji_xiaoCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1">合计</td>
                <td colspan="2" class="td3"><?= $money->total ?>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3" class="td3" align="center"><input type="submit" name="btnSave" value="保 存" onclick="check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="取 消" onclick="window.location.href = '<?= base_url() ?>index.php/admin/money/totalList';" id="btnReturn" class="input" />      </td>
            </tr>
        </table>
    </form>
</div>