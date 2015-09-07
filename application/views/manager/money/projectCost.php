<div id="search_result">

<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <!--<h3 class="title_lee"><?=$title?></h3>-->

    <table cellpadding="0" cellspacing="1" class="tablist2">
        <tr>
            <td class="td1">类别</td>
            <td class="td1">预算总数（万元）</td>
            <td class="td1">支出（万元）</td>
            <td class="td1">结余（万元）</td>
            <td class="td1">执行额度（%）</td>
        </tr>
        <tr>
            <td class="td11">合计</td>
            <td class="td31"><?=$money1->total_1?>&nbsp;</td>
            <td class="td32"><?=$money1->total_3?>&nbsp;</td>
            <td class="td31"><?=$money1->total_2?>&nbsp;</td>
            <td class="td32"><?=$money1->total_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">1.设备费</div></td>
            <td class="td3"><?=$money1->equipment_1?>&nbsp;</td>
            <td class="td3"><?=$money1->equipment_3?></td>
            <td class="td3"><?=$money1->equipment_2?>&nbsp;</td>
            <td class="td3"><?=$money1->equipment_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left" style="margin-left:20px">其中：购置设备费</div></td>
            <td class="td3"><?=$money1->buyEquipment?>&nbsp;</td>
            <td class="td3">&nbsp;</td>
            <td class="td3">&nbsp;</td>
            <td class="td3">&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left" style="margin-left:40px">试制设备费</div></td>
            <td class="td3"><?=$money1->tryEquipment?>&nbsp;</td>
            <td class="td3">&nbsp;</td>
            <td class="td3">&nbsp;</td>
            <td class="td3">&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left" style="margin-left:40px">设备改造与租赁费</div></td>
            <td class="td3"><?=$money1->alterEquipment?>&nbsp;</td>
            <td class="td3">&nbsp;</td>
            <td class="td3">&nbsp;</td>
            <td class="td3">&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">2.材料费</div></td>
            <td class="td3"><?=$money1->material_1?>&nbsp;</td>
            <td class="td3"><?=$money1->material_3?>&nbsp;</td>
            <td class="td3"><?=$money1->material_2?>&nbsp;</td>
            <td class="td3"><?=$money1->material_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">3.测试化验加工费</div></td>
            <td class="td3"><?=$money1->experiment_1?>&nbsp;</td>
            <td class="td3"><?=$money1->experiment_3?>&nbsp;</td>
            <td class="td3"><?=$money1->experiment_2?>&nbsp;</td>
            <td class="td3"><?=$money1->experiment_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">4.燃料动力费</div></td>
            <td class="td3"><?=$money1->fuel_1?>&nbsp;</td>
            <td class="td3"><?=$money1->fuel_3?>&nbsp;</td>
            <td class="td3"><?=$money1->fuel_2?>&nbsp;</td>
            <td class="td3"><?=$money1->fuel_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">5.差旅费</div></td>
            <td class="td3"><?=$money1->travel_1?>&nbsp;</td>
            <td class="td3"><?=$money1->travel_3?>&nbsp;</td>
            <td class="td3"><?=$money1->travel_2?>&nbsp;</td>
            <td class="td3"><?=$money1->travel_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">6.会议费</div></td>
            <td class="td3"><?=$money1->conference_1?>&nbsp;</td>
            <td class="td3"><?=$money1->conference_3?>&nbsp;</td>
            <td class="td3"><?=$money1->conference_2?>&nbsp;</td>
            <td class="td3"><?=$money1->conference_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">7.国际合作费</div></td>
            <td class="td3"><?=$money1->international_1?>&nbsp;</td>
            <td class="td3"><?=$money1->international_3?>&nbsp;</td>
            <td class="td3"><?=$money1->international_2?>&nbsp;</td>
            <td class="td3"><?=$money1->international_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">8.出版/文献/信息传播/知识产权事务费</div></td>
            <td class="td3"><?=$money1->information_1?>&nbsp;</td>
            <td class="td3"><?=$money1->information_3?>&nbsp;</td>
            <td class="td3"><?=$money1->information_2?>&nbsp;</td>
            <td class="td3"><?=$money1->information_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">9.劳务费</div></td>
            <td class="td3"><?=$money1->service_1?>&nbsp;</td>
            <td class="td3"><?=$money1->service_3?>&nbsp;</td>
            <td class="td3"><?=$money1->service_2?>&nbsp;</td>
            <td class="td3"><?=$money1->service_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">10.专家咨询费</div></td>
            <td class="td3"><?=$money1->consultative_1?>&nbsp;</td>
            <td class="td3"><?=$money1->consultative_3?>&nbsp;</td>
            <td class="td3"><?=$money1->consultative_2?>&nbsp;</td>
            <td class="td3"><?=$money1->consultative_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">11.其他支出</div></td>
            <td class="td3"><?=$money1->other_1?>&nbsp;</td>
            <td class="td3"><?=$money1->other_3?>&nbsp;</td>
            <td class="td3"><?=$money1->other_2?>&nbsp;</td>
            <td class="td3"><?=$money1->other_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">（二）间接费用</div></td>
            <td class="td3"><?=$money1->indirect_cost_1?>&nbsp;</td>
            <td class="td3"><?=$money1->indirect_cost_3?>&nbsp;</td>
            <td class="td3"><?=$money1->indirect_cost_2?>&nbsp;</td>
            <td class="td3"><?=$money1->indirect_cost_rate?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">其中绩效支出</div></td>
            <td class="td3"><?=$money1->ji_xiao_1?>&nbsp;</td>
            <td class="td3"><?=$money1->ji_xiao_3?>&nbsp;</td>
            <td class="td3"><?=$money1->ji_xiao_2?>&nbsp;</td>
            <td class="td3"><?=$money1->ji_xiao_rate?>%&nbsp;</td>
        </tr>

        <tr>
            <td colspan="5" class="td3" align="center">
                <input type="button" name="btnReturn" value="返 回" onclick="window.location.href = 'javascript:history.go(-1)';" id="btnReturn" class="input" />
                &nbsp;</td>
        </tr>
    </table>
</div>