<div style="margin-left:20px; margin-right:20px">
<br />
<h3>年度经费预算表</h3>
  <table cellpadding="0" cellspacing="1" class="tablist2">
  	<tr>
    	<td colspan="3" class="td2">时间：<?=$money->year?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;课题：课题<?=$money->subjectNum?>&nbsp;&nbsp;&nbsp;&nbsp;<?=$money->subjectName?></td>
    </tr>
    <tr>
      <td class="td1">类别</td>
      <td class="td1">经费总额(万元)</td>
      <td class="td1">预算说明</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">1.设备费</div></td>
      <td class="td2"><?=$money->equipment?>&nbsp;</td>
      <td class="td2"><?=$money->equipmentCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:20px">其中：购置设备费</div></td>
      <td class="td2"><?=$money->buyEquipment?>&nbsp;</td>
      <td class="td2"><?=$money->buyEquipmentCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:40px">试制设备费</div></td>
      <td class="td2"><?=$money->tryEquipment?>&nbsp;</td>
      <td class="td2"><?=$money->tryEquipmentCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left" style="margin-left:40px">设备改造与租赁费</div></td>
      <td class="td2"><?=$money->alterEquipment?>&nbsp;</td>
      <td class="td2"><?=$money->alterEquipmentCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">2.材料费</div></td>
      <td class="td2"><?=$money->material?>&nbsp;</td>
      <td class="td2"><?=$money->materialCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">3.测试化验加工费</div></td>
      <td class="td2"><?=$money->experiment?>&nbsp;</td>
      <td class="td2"><?=$money->experimentCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">4.燃料动力费</div></td>
      <td class="td2"><?=$money->fuel?>&nbsp;</td>
      <td class="td2"><?=$money->fuelCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">5.差旅费</div></td>
      <td class="td2"><?=$money->travel?>&nbsp;</td>
      <td class="td2"><?=$money->travelCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">6.会议费</div></td>
      <td class="td2"><?=$money->conference?>&nbsp;</td>
      <td class="td2"><?=$money->conferenceCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">7.国际合作费</div></td>
      <td class="td2"><?=$money->international?>&nbsp;</td>
      <td class="td2"><?=$money->internationalCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">8.出版/文献/信息传播/知识产权事务费</div></td>
      <td class="td2"><?=$money->information?>&nbsp;</td>
      <td class="td2"><?=$money->informationCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">9.劳务费</div></td>
      <td class="td2"><?=$money->service?>&nbsp;</td>
      <td class="td2"><?=$money->serviceCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">10.专家咨询费</div></td>
      <td class="td2"><?=$money->consultative?>&nbsp;</td>
      <td class="td2"><?=$money->consultativeCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1"><div align="left">11.管理费</div></td>
      <td class="td2"><?=$money->management?>&nbsp;</td>
      <td class="td2"><?=$money->managementCaption?>&nbsp;</td>
    </tr>
    <tr>
      <td class="td1">合计</td>
      <td class="td2" colspan="2"><?=$money->total?>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3" class="td3" align="center"><input type="button" name="btnEdit" value="编 辑" onclick="window.location.href='<?=base_url()?>index.php/admin/money/yearMoneyEdit/<?=$money->yearMoneyId?>';" id="btnEdit" class="input" />
      	  <input type="button" name="btnDelete" value="删 除" onclick="deleteInfo('<?=base_url()?>index.php/admin/money/yearMoneyDelete/<?=$money->yearMoneyId?>')" id="btnDelete" class="input" />
          <input type="button" name="btnReturn" value="返 回" onclick="window.location.href='<?=base_url()?>index.php/admin/money/yearList/1';" id="btnReturn" class="input" />      </td>
    </tr>
  </table>
 </div>