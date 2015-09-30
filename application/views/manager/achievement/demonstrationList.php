<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">应用示范列表</h3>
<table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th class="td1">序号</th>
			<th class="td3">示范技术</th>
			<th class="td1">地点</th>
            <th class="td3">辐射区域</th>
            <th class="td1">状态</th>
            <th class="td3">操作</th>
		</tr>
        <?php if(is_array($demonstration)) foreach($demonstration as $key=>$r):?>
        <tr class="RowStyle" align="center">
        	<td class="td1">
            	<?=$key+1?></td>
			<td class="td3"><?=$r['technique']?></td>
            <td class="td1"><?=$r['place']?></td>
            <td class="td3"><?=$r['area']?></td>
            <td class="td1"><?=$r['state']?></td>
            <td class="td3">
           	  <a id="" href="<?=base_url()?>index.php/manager/demonstration/demonstrationDetail/<?=$r['demonstrationId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
        <tr class="td3">
        	<td colspan="8" align="center">
           	  <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?=base_url()?>index.php/manager/demonstration/demonstrationNew';" id="btnDelete" class="input" />
   	  		  <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?=base_url()?>index.php/manager/demonstration/demonstrationDelete';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
</table>
<div align="center"><?=$page?></div>
</div>