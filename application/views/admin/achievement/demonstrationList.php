<div style="margin-left:20px; margin-right:20px">
<br />
<h3>应用示范列表</h3>
<table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th scope="col">全选<input type="checkbox" /></th>
            <th scope="col">课题编号</th>
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
			<td><?=$r['subjectNum']?></td>
            <td><?=$r['technique']?></td>
            <td><?=$r['place']?></td>
            <td><?=$r['area']?></td>
            <td><?=$r['state']?></td>
            <td>
           	  <a id="" href="<?=base_url()?>index.php/admin/demonstration/demonstrationDetail/<?=$r['demonstrationId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
</table>
<div align="center"><?=$page?></div>
</div>