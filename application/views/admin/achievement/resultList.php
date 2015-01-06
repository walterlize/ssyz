<div style="margin-left:20px; margin-right:20px">
<br />
<h3>鉴定成果列表</h3>
<table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th scope="col">全选<input type="checkbox" /></th>
            <th scope="col">课题编号</th>
			<th scope="col">鉴定成果名称</th>
			<th scope="col">完成人</th>
            <th scope="col">鉴定日期</th>
            <th scope="col">完成单位</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
		</tr>
        <?php if(is_array($result)) foreach($result as $r):?>
        <tr class="RowStyle" align="center">
        	<td>
            	<input type="checkbox" /></td>
            <td><?=$r['subjectNum']?></td>
			<td><?=$r['resultName']?></td>
            <td><?=$r['author']?></td>
            <td><?=$r['time']?></td>
            <td><?=$r['workplace']?></td>
            <td><?=$r['state']?></td>
            <td>
           	  <a id="" href="<?=base_url()?>index.php/admin/result/resultDetail/<?=$r['resultId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
</table>
<div align="center"><?=$page?></div>
</div>