<div style="margin-left:20px; margin-right:20px" id="content">
    <br />
    <h3>课题总经费执行统计</h3>

    <table cellpadding="0" cellspacing="1" class="tablist2">

        <tr>
            <td class="td1">类别</td>
            <td class="td1">预算总数（万元）</td>
            <td class="td1">支出（万元）</td>
            <td class="td1">结余（万元）</td>
            <td class="td1">执行额度（%）</td>
        </tr>
        <tr>
            <td class="td11"><div align="left">课题总计</td>
            <td class="td31"><?= $totalMoney->total ?>&nbsp;</td>
            <td class="td32"><?= $monthMoney->total ?>&nbsp;</td>
            <td class="td31"><?= $last->total ?>&nbsp;</td>
            <td class="td32"><?= $rate->total ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">1.设备费</div></td>
            <td class="td3"><?php if (isset($totalMoney->equipment)) echo $totalMoney->equipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->equipment)) echo $monthMoney->equipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->equipment)) echo $last->equipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->equipment)) echo $rate->equipment; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left" style="margin-left:20px">其中：购置设备费</div></td>
            <td class="td3"><?php if (isset($totalMoney->buyEquipment)) echo $totalMoney->buyEquipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->buyEquipment)) echo $monthMoney->buyEquipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->buyEquipment)) echo $last->buyEquipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->buyEquipment)) echo $rate->buyEquipment; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left" style="margin-left:40px">试制设备费</div></td>
            <td class="td3"><?php if (isset($totalMoney->tryEquipment)) echo $totalMoney->tryEquipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->tryEquipment)) echo $monthMoney->tryEquipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->tryEquipment)) echo $last->tryEquipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->tryEquipment)) echo $rate->tryEquipment; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left" style="margin-left:40px">设备改造与租赁费</div></td>
            <td class="td3"><?php if (isset($totalMoney->alterEquipment)) echo $totalMoney->alterEquipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->alterEquipment)) echo $monthMoney->alterEquipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->alterEquipment)) echo $last->alterEquipment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->alterEquipment)) echo $rate->alterEquipment; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">2.材料费</div></td>
            <td class="td3"><?php if (isset($totalMoney->material)) echo $totalMoney->material; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->material)) echo $monthMoney->material; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->material)) echo $last->material; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->material)) echo $rate->material; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">3.测试化验加工费</div></td>
            <td class="td3"><?php if (isset($totalMoney->experiment)) echo $totalMoney->experiment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->experiment)) echo $monthMoney->experiment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->experiment)) echo $last->experiment; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->experiment)) echo $rate->experiment; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">4.燃料动力费</div></td>
            <td class="td3"><?php if (isset($totalMoney->fuel)) echo $totalMoney->fuel; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->fuel)) echo $monthMoney->fuel; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->fuel)) echo $last->fuel; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->fuel)) echo $rate->fuel; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">5.差旅费</div></td>
            <td class="td3"><?php if (isset($totalMoney->travel)) echo $totalMoney->travel; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->travel)) echo $monthMoney->travel; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->travel)) echo $last->travel; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->travel)) echo $rate->travel; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">6.会议费</div></td>
            <td class="td3"><?php if (isset($totalMoney->conference)) echo $totalMoney->conference; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->conference)) echo $monthMoney->conference; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->conference)) echo $last->conference; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->conference)) echo $rate->conference; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">7.国际合作费</div></td>
            <td class="td3"><?php if (isset($totalMoney->international)) echo $totalMoney->international; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->international)) echo $monthMoney->international; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->international)) echo $last->international; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->international)) echo $rate->international; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">8.出版/文献/信息传播/知识产权事务费</div></td>
            <td class="td3"><?php if (isset($totalMoney->information)) echo $totalMoney->information; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->information)) echo $monthMoney->information; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->information)) echo $last->information; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->information)) echo $rate->information; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">9.劳务费</div></td>
            <td class="td3"><?php if (isset($totalMoney->service)) echo $totalMoney->service; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->service)) echo $monthMoney->service; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->service)) echo $last->service; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->service)) echo $rate->service; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">10.专家咨询费</div></td>
            <td class="td3"><?php if (isset($totalMoney->consultative)) echo $totalMoney->consultative; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->consultative)) echo $monthMoney->consultative; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->consultative)) echo $last->consultative; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->consultative)) echo $rate->consultative; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1"><div align="left">11.管理费</div></td>
            <td class="td3"><?php if (isset($totalMoney->management)) echo $totalMoney->management; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($monthMoney->management)) echo $monthMoney->management; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($last->management)) echo $last->management; ?>&nbsp;</td>
            <td class="td3"><?php if (isset($rate->management)) echo $rate->management; ?>%&nbsp;</td>
        </tr>
        <tr>
            <td class="td1">合计</td>
            <td class="td3"><?= $totalMoney->total ?>&nbsp;</td>
            <td class="td3"><?= $monthMoney->total ?>&nbsp;</td>
            <td class="td3"><?= $last->total ?>&nbsp;</td>
            <td class="td3"><?= $rate->total ?>%&nbsp;</td>
        </tr>

  
      <!--  <tr>
        
            <td class="td2" colspan="6"><font color="#3A6EA5" align="center">请填写并上传年度子课题经费支出情况（word版）</font></br>
                <form method="post" action="<?= base_url() ?>index.php/manager/upload_1/index/<?= $subjectId ?>" enctype="multipart/form-data" />
                <div style="margin:0 0 0.5em 0em;">
                    <input type="file" name="userfile" size="20" class="button" />
                 
                    <input type="submit" value=" 上传 " class="input" />
                </div>
                </form>
            </td>
        </tr>-->

    </table>

</div>