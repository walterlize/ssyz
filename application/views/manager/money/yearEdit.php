<div style="margin-left:20px; margin-right:20px">
    <br />
    <div class="title_lee">年度经费预算表</div>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/manager/money/yearMoneySave" id="form1">
        <input type="hidden" name="yearMoneyId" id="yearMoneyId" value="<?= $money->yearMoneyId ?>" />
        <input type="hidden" name="type" id="type" value="2" />
        <input type="hidden" name="subjectId" id="subjectId" value="$subjectId" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td2" colspan="3">
                    请选择年份：
                    <select id="year" name="year">
                        <?php for ($i = 0; $i <= 2; $i++) { ?>
                            <option value="<?php
                            $year = 2014 + $i;
                            echo $year;
                            ?>"
                                    <?php
                                    if (isset($money->year) && $year == $money->year)
                                        echo 'selected';
                                    else
                                        echo '';
                                    ?>
                                    ><?= $year ?></option>

                        <?php } ?>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <?php endforeach; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        课题总经费：
                    </select>
                </td>
            </tr>
            <tr>
                <td class="td1">类别</td>
                <td class="td1">经费总额(万元)</td>
                <td class="td1">预算说明</td>
            </tr>
            <tr>
                <td class="td1"><div align="left">1.设备费</div></td>
                <td class="td3"><input type="text" name="equipment" id="equipment" value="<?= $money->equipment ?>" /></td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="<?= $money->equipmentCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" style="margin-left:20px">其中：购置设备费</div></td>
                <td class="td3"><input type="text" name="buyEquipment" id="buyEquipment" value="<?= $money->buyEquipment ?>" /></td>
                <td class="td3"><input name="buyEquipmentCaption" type="text" id="buyEquipmentCaption" value="<?= $money->buyEquipmentCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" style="margin-left:40px">试制设备费</div></td>
                <td class="td3"><input type="text" name="tryEquipment" id="tryEquipment" value="<?= $money->tryEquipment ?>" /></td>
                <td class="td3"><input name="tryEquipmentCaption" type="text" id="tryEquipmentCaption" value="<?= $money->tryEquipmentCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" style="margin-left:40px">设备改造与租赁费</div></td>
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
                <td class="td1"><div align="left">11.管理费</div></td>
                <td class="td3"><input type="text" name="management" id="management" value="<?= $money->management ?>" /></td>
                <td class="td3"><input type="text" name="managementCaption" id="managementCaption" value="<?= $money->managementCaption ?>" size="50" /></td>
            </tr>
            <tr>
                <td class="td1">合计</td>
                <td colspan="2" class="td3"><?= $money->total ?>&nbsp;</td>
            </tr>
            <tr>
                <td colspan="3" class="td3" align="center"><input type="submit" name="btnSave" value="保 存" onclick="check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="取 消" onclick="window.location.href = '<?= base_url() ?>index.php/manager/money/yearList/2';" id="btnReturn" class="input" />      </td>
            </tr>
        </table>
    </form>
</div>