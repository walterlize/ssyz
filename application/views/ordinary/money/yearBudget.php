<div style="margin-left:20px; margin-right:20px" id="content">
<br />
<h3>年度经费预算执行表</h3>

  <table cellpadding="0" cellspacing="1" class="tablist2">
  	<tr>
    	<td class="td2" colspan="6">
        	请选择年份：
			<select id="year" name="year" onchange="changeYear('year', 'year', 'content', '<?=base_url()?>index.php/ordinary/money/yearBudgetChange')">
            	 <?php if(is_array($years)) foreach($years as $r):?>
                <option value="<?=$r?>"
                	 <?php
				  	if(isset($r) && $r == $year)
						echo 'selected';
					else echo '';?>
                ><?=$r?>年</option>
                <?php endforeach; ?>
            </select></td>
  	</tr>
    <tr>
      <td class="td1">类别</td>
      <td class="td1">年预算总数（万元）</td>
      <td class="td1">支出（万元）</td>
      <td class="td1">结余（万元）</td>
      <td class="td1">执行额度（%）</td>
      <td class="td1">支出明细</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">1.设备费</div></td>
      <td class="td3"><?php if(isset($yearMoney->equipment)) echo $yearMoney->equipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->equipment)) echo $monthMoney->equipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->equipment)) echo $last->equipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->equipment)) echo $rate->equipment;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->equipmentCaption)) echo $caption->equipmentCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:20px">其中：购置设备费</div></td>
      <td class="td3"><?php if(isset($yearMoney->buyEquipment)) echo $yearMoney->buyEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->buyEquipment)) echo $monthMoney->buyEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->buyEquipment)) echo $last->buyEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->buyEquipment)) echo $rate->buyEquipment;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->buyEquipmentCaption)) echo $caption->buyEquipmentCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:40px">试制设备费</div></td>
      <td class="td3"><?php if(isset($yearMoney->tryEquipment)) echo $yearMoney->tryEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->tryEquipment)) echo $monthMoney->tryEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->tryEquipment)) echo $last->tryEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->tryEquipment)) echo $rate->tryEquipment;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->tryEquipmentCaption)) echo $caption->tryEquipmentCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:40px">设备改造与租赁费</div></td>
      <td class="td3"><?php if(isset($yearMoney->alterEquipment)) echo $yearMoney->alterEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->alterEquipment)) echo $monthMoney->alterEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->alterEquipment)) echo $last->alterEquipment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->alterEquipment)) echo $rate->alterEquipment;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->alterEquipmentCaption)) echo $caption->alterEquipmentCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">2.材料费</div></td>
      <td class="td3"><?php if(isset($yearMoney->material)) echo $yearMoney->material;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->material)) echo $monthMoney->material;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->material)) echo $last->material;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->material)) echo $rate->material;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->materialCaption)) echo $caption->materialCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">3.测试化验加工费</div></td>
      <td class="td3"><?php if(isset($yearMoney->experiment)) echo $yearMoney->experiment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->experiment)) echo $monthMoney->experiment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->experiment)) echo $last->experiment;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->experiment)) echo $rate->experiment;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->experimentCaption)) echo $caption->experimentCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">4.燃料动力费</div></td>
      <td class="td3"><?php if(isset($yearMoney->fuel)) echo $yearMoney->fuel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->fuel)) echo $monthMoney->fuel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->fuel)) echo $last->fuel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->fuel)) echo $rate->fuel;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->fuelCaption)) echo $caption->fuelCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">5.差旅费</div></td>
      <td class="td3"><?php if(isset($yearMoney->travel)) echo $yearMoney->travel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->travel)) echo $monthMoney->travel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->travel)) echo $last->travel;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->travel)) echo $rate->travel;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->travelCaption)) echo $caption->travelCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">6.会议费</div></td>
      <td class="td3"><?php if(isset($yearMoney->conference)) echo $yearMoney->conference;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->conference)) echo $monthMoney->conference;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->conference)) echo $last->conference;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->conference)) echo $rate->conference;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->conferenceCaption)) echo $caption->conferenceCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">7.国际合作费</div></td>
      <td class="td3"><?php if(isset($yearMoney->international)) echo $yearMoney->international;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->international)) echo $monthMoney->international;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->international)) echo $last->international;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->international)) echo $rate->international;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->internationalCaption)) echo $caption->internationalCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">8.出版/文献/信息传播/知识产权事务费</div></td>
      <td class="td3"><?php if(isset($yearMoney->information)) echo $yearMoney->information;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->information)) echo $monthMoney->information;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->information)) echo $last->information;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->information)) echo $rate->information;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->informationCaption)) echo $caption->informationCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">9.劳务费</div></td>
      <td class="td3"><?php if(isset($yearMoney->service)) echo $yearMoney->service;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->service)) echo $monthMoney->service;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->service)) echo $last->service;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->service)) echo $rate->service;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->serviceCaption)) echo $caption->serviceCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">10.专家咨询费</div></td>
      <td class="td3"><?php if(isset($yearMoney->consultative)) echo $yearMoney->consultative;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->consultative)) echo $monthMoney->consultative;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->consultative)) echo $last->consultative;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->consultative)) echo $rate->consultative;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->consultativeCaption)) echo $caption->consultativeCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">11.管理费</div></td>
      <td class="td3"><?php if(isset($yearMoney->management)) echo $yearMoney->management;?>&nbsp;</td>
      <td class="td3"><?php if(isset($monthMoney->management)) echo $monthMoney->management;?>&nbsp;</td>
      <td class="td3"><?php if(isset($last->management)) echo $last->management;?>&nbsp;</td>
      <td class="td3"><?php if(isset($rate->management)) echo $rate->management;?>%&nbsp;</td>
      <td class="td3"><?php if(isset($caption->managementCaption)) echo $caption->managementCaption;?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1">合计</td>
      <td class="td3"><?=$yearMoney->total?>&nbsp;</td>
      <td class="td3"><?=$monthMoney->total?>&nbsp;</td>
      <td class="td3"><?=$last->total?>&nbsp;</td>
      <td class="td3"><?=$rate->total?>%&nbsp;</td>
      <td class="td3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="6" class="td3" align="center">&nbsp;</td>
    </tr>
  </table>
 </div>