<div style="margin-left:20px; margin-right:20px">
<br />
<h3>月度经费支出表</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
  	<tr>
    	<td colspan="5" class="td2">时间：<?=$monthMoney->year?>年<?=$monthMoney->month?>月</td>
    </tr>
    <tr>
      <td class="td1">类别</td>
      <td class="td1">年度经费总额</td>
     
      <td class="td1">已支出(万元)</td>
      <td class="td1">支出说明</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">1.设备费</div></td>
      <td class="td3"><?php if(isset($yearMoney->equipment)) echo $yearMoney->equipment;?>&nbsp;</td>
  
      <td class="td3"><?=$monthMoney->equipment?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->equipmentCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:20px">其中：购置设备费</div></td>
      <td class="td3"><?php if(isset($yearMoney->buyEquipment)) echo $yearMoney->buyEquipment;?>&nbsp;</td>
   
      <td class="td3"><?=$monthMoney->buyEquipment?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->buyEquipmentCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:40px">试制设备费</div></td>
      <td class="td3"><?php if(isset($yearMoney->tryEquipment)) echo $yearMoney->tryEquipment;?>&nbsp;</td>
     
      <td class="td3"><?=$monthMoney->tryEquipment?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->tryEquipmentCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:40px">设备改造与租赁费</div></td>
      <td class="td3"><?php if(isset($yearMoney->alterEquipment)) echo $yearMoney->alterEquipment;?>&nbsp;</td>
  
      <td class="td3"><?=$monthMoney->alterEquipment?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->alterEquipmentCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">2.材料费</div></td>
      <td class="td3"><?php if(isset($yearMoney->material)) echo $yearMoney->material;?>&nbsp;</td>
  
      <td class="td3"><?=$monthMoney->material?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->materialCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">3.测试化验加工费</div></td>
      <td class="td3"><?php if(isset($yearMoney->experiment)) echo $yearMoney->experiment;?>&nbsp;</td>
   
      <td class="td3"><?=$monthMoney->experiment?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->experimentCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">4.燃料动力费</div></td>
      <td class="td3"><?php if(isset($yearMoney->fuel)) echo $yearMoney->fuel;?>&nbsp;</td>
     
      <td class="td3"><?=$monthMoney->fuel?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->fuelCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">5.差旅费</div></td>
      <td class="td3"><?php if(isset($yearMoney->travel)) echo $yearMoney->travel;?>&nbsp;</td>
  
      <td class="td3"><?=$monthMoney->travel?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->travelCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">6.会议费</div></td>
      <td class="td3"><?php if(isset($yearMoney->conference)) echo $yearMoney->conference;?>&nbsp;</td>
     
      <td class="td3"><?=$monthMoney->conference?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->conferenceCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">7.国际合作费</div></td>
      <td class="td3"><?php if(isset($yearMoney->international)) echo $yearMoney->international;?>&nbsp;</td>
   
      <td class="td3"><?=$monthMoney->international?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->internationalCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">8.出版/文献/信息传播/知识产权事务费</div></td>
      <td class="td3"><?php if(isset($yearMoney->information)) echo $yearMoney->information;?>&nbsp;</td>
   
      <td class="td3"><?=$monthMoney->information?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->informationCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">9.劳务费</div></td>
      <td class="td3"><?php if(isset($yearMoney->service)) echo $yearMoney->service;?>&nbsp;</td>
    
      <td class="td3"><?=$monthMoney->service?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->serviceCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">10.专家咨询费</div></td>
      <td class="td3"><?php if(isset($yearMoney->consultative)) echo $yearMoney->consultative;?>&nbsp;</td>
  
      <td class="td3"><?=$monthMoney->consultative?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->consultativeCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">11.管理费</div></td>
      <td class="td3"><?php if(isset($yearMoney->management)) echo $yearMoney->management;?>&nbsp;</td>
  
      <td class="td3"><?=$monthMoney->management?>&nbsp;</td>
      <td class="td2"><?=$monthMoney->managementCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1">合计</td>
      <td class="td3"><?=$yearMoney->total?>&nbsp;</td>
     
      <td class="td3"><?=$monthMoney->total?>&nbsp;</td>
      <td class="td2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="5" class="td3" align="center">
      	<input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/ordinary/money/monthMoneyEdit/<?=$monthMoney->monthMoneyId?>';" id="btnEdit" class="input" style="<?=$show1?>" />
      	<input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/ordinary/money/monthMoneyDelete/<?=$monthMoney->monthMoneyId?>')" id="btnDelete" class="input" style="<?=$show1?>" />
        <input type="button" name="btnUpdate" value="请求修改" onclick="window.location.href='<?=base_url()?>index.php/ordinary/money/monthMoneyUpdate/<?=$monthMoney->monthMoneyId?>/0';" id="btnUpdate" class="input" style="<?=$show2?>" />
        <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/ordinary/money/monthList/2';" id="btnReturn" class="input" />      </td>
    </tr>
  </table>
 </div>