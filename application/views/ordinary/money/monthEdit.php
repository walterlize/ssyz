<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <h3>月度经费填写</h3>
    <form name="form1" method="post" action="<?= base_url() ?>index.php/ordinary/money/monthMoneySave" id="form1">
        <input type="hidden" name="monthMoneyId" id="monthMoneyId" value="<?= $monthMoney->monthMoneyId ?>" />
        <input type="hidden" name="subjectId" id="subjectId" value="<?= $monthMoney->subjectId ?>" />
          <input type="hidden" name="inherit" id="inherit" value="<?= $inherit ?>" />
        <input type="hidden" name="subjectUnit" id="subjectUnit" value="<?= $subjectUnit ?>" />
        <input type="hidden" name="state" id="state" value="1" />
     <input type="hidden" name="type" id="type" value="2" />
        <table cellpadding="0" cellspacing="1" class="tablist2">
            <tr>
                <td class="td2" colspan="5">
                    请选择年份：
                    <select id="year" name="year" onchange="changeYear('year', 'month', 'content', '<?= base_url() ?>index.php/ordinary/money/monthMoneyChange')">
                        <?php if (is_array($years)) foreach ($years as $r): ?>
                                <option value="<?= $r ?>"
                                <?php
                                if (isset($r) && $r == $year)
                                    echo 'selected';
                                else
                                    echo '';
                                ?>
                                        ><?= $r ?>年</option>
    <?php endforeach; ?>
                    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    请选择月份：
                    <select id="month" name="month">
                        <?php for ($i = 1; $i <= 12; $i++) { ?>
                            <option value="<?= $i ?>"
                            <?php
                            if (isset($monthMoney->month) && $i == $month)
                                echo 'selected';
                            else
                                echo '';
                            ?>
                                    ><?= $i ?>月</option>
<?php } ?>
                    </select></td>
            </tr>
            <tr>
                <td class="td1">类别</td>
                <td class="td1">年度经费总额</td>

                <td class="td1">已支出(万元)</td>
                <td class="td1">支出说明</td>
            </tr>
            <tr>
                <td class="td1"><div align="left">1.设备费</div></td>
                <td class="td3"><?php if (isset($yearMoney->equipment)) echo $yearMoney->equipment; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="equipment" id="equipment" value="<?= $monthMoney->equipment ?>" /></td>
                <td class="td3"><input name="equipmentCaption" type="text" id="equipmentCaption" value="<?= $monthMoney->equipmentCaption ?>" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" style="margin-left:20px">其中：购置设备费</div></td>
                <td class="td3"><?php if (isset($yearMoney->buyEquipment)) echo $yearMoney->buyEquipment; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="buyEquipment" id="buyEquipment" value="<?= $monthMoney->buyEquipment ?>" /></td>
                <td class="td3"><input name="buyEquipmentCaption" type="text" id="buyEquipmentCaption" value="<?= $monthMoney->buyEquipmentCaption ?>" /></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" style="margin-left:40px">试制设备费</div></td>
                <td class="td3"><?php if (isset($yearMoney->tryEquipment)) echo $yearMoney->tryEquipment; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="tryEquipment" id="tryEquipment" value="<?= $monthMoney->tryEquipment ?>" /></td>
                <td class="td3"><input name="tryEquipmentCaption" type="text" id="tryEquipmentCaption" value="<?= $monthMoney->tryEquipmentCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left" style="margin-left:40px">设备改造与租赁费</div></td>
                <td class="td3"><?php if (isset($yearMoney->alterEquipment)) echo $yearMoney->alterEquipment; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="alterEquipment" id="alterEquipment" value="<?= $monthMoney->alterEquipment ?>" /></td>
                <td class="td3"><input name="alterEquipmentCaption" type="text" id="alterEquipmentCaption" value="<?= $monthMoney->alterEquipmentCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">2.材料费</div></td>
                <td class="td3"><?php if (isset($yearMoney->material)) echo $yearMoney->material; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="material" id="material" value="<?= $monthMoney->material ?>" /></td>
                <td class="td3"><input type="text" name="materialCaption" id="materialCaption" value="<?= $monthMoney->materialCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">3.测试化验加工费</div></td>
                <td class="td3"><?php if (isset($yearMoney->experiment)) echo $yearMoney->experiment; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="experiment" id="experiment" value="<?= $monthMoney->experiment ?>" /></td>
                <td class="td3"><input type="text" name="experimentCaption" id="experimentCaption" value="<?= $monthMoney->experimentCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">4.燃料动力费</div></td>
                <td class="td3"><?php if (isset($yearMoney->fuel)) echo $yearMoney->fuel; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="fuel" id="fuel" value="<?= $monthMoney->fuel ?>" /></td>
                <td class="td3"><input type="text" name="fuelCaption" id="fuelCaption" value="<?= $monthMoney->fuelCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">5.差旅费</div></td>
                <td class="td3"><?php if (isset($yearMoney->travel)) echo $yearMoney->travel; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="travel" id="travel" value="<?= $monthMoney->travel ?>" /></td>
                <td class="td3"><input type="text" name="travelCaption" id="travelCaption" value="<?= $monthMoney->travelCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">6.会议费</div></td>
                <td class="td3"><?php if (isset($yearMoney->conference)) echo $yearMoney->conference; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="conference" id="conference" value="<?= $monthMoney->conference ?>" /></td>
                <td class="td3"><input type="text" name="conferenceCaption" id="conferenceCaption" value="<?= $monthMoney->conferenceCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">7.国际合作费</div></td>
                <td class="td3"><?php if (isset($yearMoney->international)) echo $yearMoney->international; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="international" id="international" value="<?= $monthMoney->international ?>" /></td>
                <td class="td3"><input type="text" name="internationalCaption" id="internationalCaption" value="<?= $monthMoney->internationalCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">8.出版/文献/信息传播/知识产权事务费</div></td>
                <td class="td3"><?php if (isset($yearMoney->information)) echo $yearMoney->information; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="information" id="information" value="<?= $monthMoney->information ?>" /></td>
                <td class="td3"><input type="text" name="informationCaption" id="informationCaption" value="<?= $monthMoney->informationCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">9.劳务费</div></td>
                <td class="td3"><?php if (isset($yearMoney->service)) echo $yearMoney->service; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="service" id="service" value="<?= $monthMoney->service ?>" /></td>
                <td class="td3"><input type="text" name="serviceCaption" id="serviceCaption" value="<?= $monthMoney->serviceCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">10.专家咨询费</div></td>
                <td class="td3"><?php if (isset($yearMoney->consultative)) echo $yearMoney->consultative; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="consultative" id="consultative" value="<?= $monthMoney->consultative ?>" /></td>
                <td class="td3"><input type="text" name="consultativeCaption" id="consultativeCaption" value="<?= $monthMoney->consultativeCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1"><div align="left">11.管理费</div></td>
                <td class="td3"><?php if (isset($yearMoney->management)) echo $yearMoney->management; ?>&nbsp;</td>

                <td class="td3"><input type="text" name="management" id="management" value="<?= $monthMoney->management ?>" /></td>
                <td class="td3"><input type="text" name="managementCaption" id="managementCaption" value="<?= $monthMoney->managementCaption ?>"/></td>
            </tr>
            <tr>
                <td class="td1">合计</td>
                <td class="td3"><?= $yearMoney->total ?>&nbsp;</td>

                <td class="td3"><?= $monthMoney->total ?>&nbsp;</td>
                <td class="td3">&nbsp;</td>
            </tr>
            <tr>
                <td colspan="5" class="td3" align="center"><input type="submit" name="btnSave" value="保 存" onclick="check('form1');" id="btnSave" class="input" />
                    <input type="button" name="btnReturn" value="取 消" onclick="window.location.href='<?= base_url() ?>index.php/ordinary/money/monthList/2';" id="btnReturn" class="input" />      </td>
            </tr>
        </table>
    </form>
</div>