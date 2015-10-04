<div style="margin-left:20px; margin-right:20px">
<br />
<h3 class="title_lee">应用示范列表</h3>
<table class="tablist2" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th class="td1">序号</th>
            <th class="td3">课题编号</th>
			<th class="td1">示范技术</th>
			<th class="td3">地点</th>
            <th class="td1">辐射区域</th>
            <th class="td3">状态</th>
            <th class="td1">操作</th>
		</tr>
        <?php if(is_array($demonstration)) foreach($demonstration as $key=>$r):?>
        <tr class="RowStyle" align="center">
        	<td class="td1">
            	<?=$key+1?></td>
			<td class="td3"><?=$r['subjectNum']?></td>
            <td class="td1"><?=$r['technique']?></td>
            <td class="td3"><?=$r['place']?></td>
            <td class="td1"><?=$r['area']?></td>
            <td class="td3"><?=$r['state']?></td>
            <td class="td1">
           	  <a id="" href="<?=base_url()?>index.php/admin/demonstration/demonstrationDetail/<?=$r['demonstrationId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
</table>
<div align="center"><?=$page?></div>
</div>