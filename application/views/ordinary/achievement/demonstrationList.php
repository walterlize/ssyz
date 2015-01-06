<div style="margin-left:20px; margin-right:20px">
<br />
<h3>应用示范列表</h3>
<table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th scope="col">全选<input type="checkbox" /></th>
			<th scope="col">示范技术</th>
			<th scope="col">地点</th>
            <th scope="col">辐射区域</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
		</tr>
        <?php if(is_array($demonstration)) foreach($demonstration as $r):?>
        <tr class="RowStyle" align="center">
        	<td>
            	<input type="checkbox" /></td>
			<td><?=$r['technique']?></td>
            <td><?=$r['place']?></td>
            <td><?=$r['area']?></td>
            <td><?=$r['state']?></td>
            <td>
           	  <a id="" href="<?=base_url()?>index.php/manager/demonstration/demonstrationDetail/<?=$r['demonstrationId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
        <tr>
        	<td colspan="8" align="center">
           	  <input type="button" name="btnDelete" value="新 增" onclick="window.location.href='<?=base_url()?>index.php/manager/demonstration/demonstrationNew';" id="btnDelete" class="input" />
   	  		  <input type="button" name="btnReturn" value="删 除" onclick="window.location.href='<?=base_url()?>index.php/manager/demonstration/demonstrationDelete';" id="btnReturn" class="input"  style="display:none"/>
            </td>
        </tr>
</table>
<div align="center"><?=$page?></div>
</div>