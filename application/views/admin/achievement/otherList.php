<div style="margin-left:20px; margin-right:20px">
<br />
<h3>其他列表</h3>
<table class="tablist" cellpadding="0" cellspacing="1" style="width:100%;border-collapse:collapse;" border="1">
		<tr class="HeaderStyle">
			<th scope="col">全选<input type="checkbox" /></th>
            <th scope="col">课题编号</th>
			<th scope="col">名称</th>
			<th scope="col">内容</th>
            <th scope="col">状态</th>
            <th scope="col">操作</th>
		</tr>
        <?php if(is_array($other)) foreach($other as $r):?>
        <tr class="RowStyle" align="center">
        	<td>
            	<input type="checkbox" /></td>
			<td><?=$r['subjectNum']?></td>
            <td><?=$r['otherName']?></td>
            <td><?=$r['content']?></td>
            <td><?=$r['state']?></td>
            <td>
           	  <a id="" href="<?=base_url()?>index.php/admin/other/otherDetail/<?=$r['otherId']?>">详细</a>
            </td>
		</tr>
        <?php endforeach; ?>
</table>
<div align="center"><?=$page?></div>
</div>