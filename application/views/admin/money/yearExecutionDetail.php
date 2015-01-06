<div style="margin-left:20px; margin-right:20px">
<br />

  <h3>年度经费预算执行</h3>

  <table cellpadding="0" cellspacing="1" class="tablist2">
    <tr>
    	<td colspan="6" class="td2">
			<div align="center"><font size="+1"><?=$year->year?>年度&nbsp;课题<?=$year->subjectNum?>&nbsp;年度经费预算执行</font></div>        </td>
    </tr>
    <tr>
      <td class="td1">类别</td>
      <td class="td1">预算总数（万元）</td>
      <td class="td1">支出（万元）</td>
      <td class="td1">结余（万元）</td>
      <td class="td1">执行额度（%）</td>
      <td class="td1">支出明细</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">1.设备费</div></td>
      <td class="td3"><?php if(isset($year->equipment)) echo $year->equipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->equipment)) echo $month->equipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->equipment)) echo $last->equipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->equipment)) echo $rate->equipment;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->equipmentCaption)) echo $caption->equipmentCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:20px">其中：购置设备费</div></td>
      <td class="td3"><?php if(isset($year->buyEquipment)) echo $year->buyEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->buyEquipment)) echo $month->buyEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->buyEquipment)) echo $last->buyEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->buyEquipment)) echo $rate->buyEquipment;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->buyEquipmentCaption)) echo $caption->buyEquipmentCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:40px">试制设备费</div></td>
      <td class="td3"><?php if(isset($year->tryEquipment)) echo $year->tryEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->tryEquipment)) echo $month->tryEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->tryEquipment)) echo $last->tryEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->tryEquipment)) echo $rate->tryEquipment;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->tryEquipmentCaption)) echo $caption->tryEquipmentCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:40px">设备改造与租赁费</div></td>
      <td class="td3"><?php if(isset($year->alterEquipment)) echo $year->alterEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->alterEquipment)) echo $month->alterEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->alterEquipment)) echo $last->alterEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->alterEquipment)) echo $rate->alterEquipment;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->alterEquipmentCaption)) echo $caption->alterEquipmentCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">2.材料费</div></td>
      <td class="td3"><?php if(isset($year->material)) echo $year->material;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->material)) echo $month->material;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->material)) echo $last->material;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->material)) echo $rate->material;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->materialCaption)) echo $caption->materialCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">3.测试化验加工费</div></td>
      <td class="td3"><?php if(isset($year->experiment)) echo $year->experiment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->experiment)) echo $month->experiment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->experiment)) echo $last->experiment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->experiment)) echo $rate->experiment;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->experimentCaption)) echo $caption->experimentCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">4.燃料动力费</div></td>
      <td class="td3"><?php if(isset($year->fuel)) echo $year->fuel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->fuel)) echo $month->fuel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->fuel)) echo $last->fuel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->fuel)) echo $rate->fuel;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->fuelCaption)) echo $caption->fuelCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">5.差旅费</div></td>
      <td class="td3"><?php if(isset($year->travel)) echo $year->travel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->travel)) echo $month->travel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->travel)) echo $last->travel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->travel)) echo $rate->travel;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->travelCaption)) echo $caption->travelCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">6.会议费</div></td>
      <td class="td3"><?php if(isset($year->conference)) echo $year->conference;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->conference)) echo $month->conference;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->conference)) echo $last->conference;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->conference)) echo $rate->conference;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->conferenceCaption)) echo $caption->conferenceCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">7.国际合作费</div></td>
      <td class="td3"><?php if(isset($year->international)) echo $year->international;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->international)) echo $month->international;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->international)) echo $last->international;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->international)) echo $rate->international;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->internationalCaption)) echo $caption->internationalCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">8.出版/文献/信息传播/知识产权事务费</div></td>
      <td class="td3"><?php if(isset($year->information)) echo $year->information;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->information)) echo $month->information;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->information)) echo $last->information;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->information)) echo $rate->information;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->informationCaption)) echo $caption->informationCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">9.劳务费</div></td>
      <td class="td3"><?php if(isset($year->service)) echo $year->service;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->service)) echo $month->service;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->service)) echo $last->service;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->service)) echo $rate->service;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->serviceCaption)) echo $caption->serviceCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">10.专家咨询费</div></td>
      <td class="td3"><?php if(isset($year->consultative)) echo $year->consultative;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->consultative)) echo $month->consultative;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->consultative)) echo $last->consultative;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->consultative)) echo $rate->consultative;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->consultativeCaption)) echo $caption->consultativeCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">11.管理费</div></td>
      <td class="td3"><?php if(isset($year->management)) echo $year->management;?>&nbsp;</td>
      <td class="td3"><?php if(isset($month->management)) echo $month->management;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->management)) echo $last->management;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->management)) echo $rate->management;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->managementCaption)) echo $caption->managementCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1">合计</td>
      <td class="td3"><?=$year->total?>&nbsp;</td>
      <td class="td3"><?=$month->total?>&nbsp;</td>
      <td class="td3"><?=$last->total?>&nbsp;</td>
      <td class="td3"><?=$rate->total?>%&nbsp;</td>
      <td class="td3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6" class="td3" align="center">
      	<input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/money/yearExecutionList/1';" id="btnReturn" class="input" />      </td>
    </tr>
  </table>
 </div>